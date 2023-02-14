<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
   <?php require 'includes/head.php'; ?>
   <!-- JS -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(<?php echo $chartDataJson; ?>);

            var options = {
                title: 'Air Pollution Composition'
            };

            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>
    <!-- Connection -->
    <?php require 'scripts/connect.php'; ?>

    <!-- Content -->
    <?php
        // Set up OpenWeatherMap API and location information
        $apiKey = "49c0bad2c7458f1c76bec9654081a661";
        $city = "London";
        $countryCode = "uk";

        // Make API request for air pollution data
        $pollutionUrl = "http://api.openweathermap.org/data/2.5/air_pollution?lat={$weatherData->coord->lat}&lon={$weatherData->coord->lon}&appid={$apiKey}";
        $pollutionData = json_decode(file_get_contents($pollutionUrl));

        // Parse the air pollution data and store in an array
        $pollutantData = array(
            'CO' => $pollutionData->list[0]->components->co,
            'NO' => $pollutionData->list[0]->components->no,
            'NO2' => $pollutionData->list[0]->components->no2,
            'O3' => $pollutionData->list[0]->components->o3,
            'SO2' => $pollutionData->list[0]->components->so2
        );

        // Use Google Charts to create a pie chart of the pollutant data
        $chartData = array(
            array('Pollutant', 'Concentration')
        );
        foreach ($pollutantData as $pollutant => $concentration) {
            $chartData[] = array($pollutant, $concentration);
        }

        $chartDataJson = json_encode($chartData);

        var_dump($chartDataJson);
    ?>

    <!-- Punt Chart out -->
    <h1>Air Pollution Composition</h1>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>