<?php
    require 'scripts/userDetails.php';
    // Set up OpenWeatherMap API and location information
    $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';
    $city = $location;
    $units = 'metric'; // Celsius

    // Make API request for current temperature
    $currentWeatherUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&units={$units}&appid={$apiKey}";
    $currentWeather = json_decode(file_get_contents($currentWeatherUrl));

    $currentTemp = $currentWeather->main->temp;

    // Make API request for next week's forecast
    $forecastUrl = "https://api.openweathermap.org/data/2.5/forecast?q={$city}&units={$units}&appid={$apiKey}";
    $forecast = json_decode(file_get_contents($forecastUrl));

    // Parse the forecast data and store in an array
    $forecastData = array();
    foreach ($forecast->list as $item) {
        $dateTime = new DateTime("@$item->dt");
        $forecastData[] = array(
            'date' => $dateTime->format('Y-m-d H:i:s'),
            'temp' => $item->main->temp
        );
    }

    // Use Google Charts to create a bar chart of the forecast
    $chartData = array();
    foreach ($forecastData as $item) {
        $chartData[] = array($item['date'], $item['temp']);
    }

    $chartDataJson = json_encode($chartData);
?>


<h1 class="text-center">Current temperature in <?php echo $city; ?>: <?php echo $currentTemp; ?> &deg;C</h1>

<!-- JS for Temperature Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Temperature');
        data.addRows(<?php echo $chartDataJson; ?>);

        var options = {
            title: 'Weather Forecast',
            hAxis: {
                title: 'Date'
            },
            vAxis: {
                title: 'Temperature (Celsius)'
            }
        };

        // Set chart options
        var options = {
        'title': 'Weather Forecast',
        'width': 900,
        'height': 500,
        backgroundColor : '#f8f9fa',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('forecast'));

        chart.draw(data, options);
    }
</script>

<div id="forecast"></div>