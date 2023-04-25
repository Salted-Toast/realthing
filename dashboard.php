<html lang="en">
<head>
    <!-- Head -->
    <?php require 'includes/head.php'; ?>
    <?php loginBoot(); ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/navbar.php'; ?>
    
    <!-- Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card m-4 p-4">
                    <?php 
                        // If the value is in post then set it if not set to null
                        $location = isset($_POST['location']) ? $_POST['location'] : null;
                        $coords = userLocation($location);
                        if ($coords != null) {
                            $lat = $coords[0];
                            $lon = $coords[1];
                        };
                    ?>
                    <!-- Outputs the users selected location -->
                    <?php
                        // Outputs invalid location to the screen
                        if ($coords != null) {
                            echo '<h1>Selected Location: ' . $location . '</h1>';
                        } else {
                            echo '<h1>Selected Location: Invalid </h1>';
                        };
                    ?>
                    <!-- Lets the users select their location -->       
                    <form name="" action="" class="form-group" method="post">
                        <div class="input-group">
                            <input class="form-control" type="text" name="location" placeholder="Type your location!"></input>
                            <button class="btn btn-primary" value="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-3">
                <div class="card m-4 p-4">
                    <h1 style="text-align:center;">Date</h1>
                    <?php echo '<h1 style="text-align:center;">' . date('d/m/Y') . '</h1>'?>
                </div>
            </div>
        <div class="row">
            <div class="col-5">
                <div class="card m-4 p-4">
                    <h1 style="text-align:center;">Pollution Pie Chart</h1>

                    <?php
                        // Checks if feild exists
                        if (isset($location) && $coords != null){
                            // Grab the users Location
                            $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';                            
                            // Craft the Query
                            $url = "https://api.openweathermap.org/data/2.5/air_pollution?lat={$lat}&lon={$lon}&appid={$apiKey}";
                            // Get the Results
                            $data = json_decode(file_get_contents($url), true);
                            // Check for empty response
                            if ($data == null) {
                                exit();
                            } else {
                                // Grab the values
                                $aqi = $data['list'][0]['main']['aqi'];
                                $co = $data['list'][0]['components']['co'];
                                $no = $data['list'][0]['components']['no'];
                                $no2 = $data['list'][0]['components']['no2'];
                                $o3 = $data['list'][0]['components']['o3'];
                                $so2 = $data['list'][0]['components']['so2'];
                                $pm2_5 = $data['list'][0]['components']['pm2_5'];
                                $pm10 = $data['list'][0]['components']['pm10'];
                            };
                        };
                    ?>
                    
                    <!-- Initialise Google Chart -->
                    <script src="https://www.gstatic.com/charts/loader.js"></script>
                    <script>
                        google.charts.load('current', {packages: ['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            // Make new data table
                            var data = new google.visualization.DataTable();
                            // Add Columns
                            data.addColumn('string', 'Pollution');
                            data.addColumn('number', 'Value');
                            // Add Rows
                            data.addRows([
                                ['CO', <?php echo $co; ?>],
                                ['NO', <?php echo $no; ?>],
                                ['NO2', <?php echo $no2; ?>],
                                ['O3', <?php echo $o3; ?>],
                                ['SO2', <?php echo $so2; ?>],
                                ['PM2_5', <?php echo $pm2_5; ?>],
                                ['PM10', <?php echo $pm10; ?>]
                            ]);

                            // Alter the graph with options
                            var options = {
                                'title': 'Percentage of Pollutants in the Air',
                                'height': 250,
                                backgroundColor: '#f8f9fa'
                            };
                            
                            // Pack the graph onto the screen
                            var chart = new google.visualization.PieChart(document.getElementById('pollution'));
                            chart.draw(data, options);
                        }
                    </script>
                    <!-- Pollution Div Tag -->
                    <div id="pollution"></div>
                    <!-- Pollutants / AQI Key -->
                    <!-- <table>
                        <thead>
                            <tr>
                                <th>Qualitative name</th>
                                <th>Index</th>
                                <th colspan="6">Pollutant concentation in μg/m^3</th>
                            </tr>     
                            <tr>
                                <td></td>
                                <td></td>
                                <td>SO2</td>
                                <td>NO2</td>
                                <td>PM10</td>
                                <td>PM2_5</td>
                                <td>O3</td>
                                <td>CO</td>
                            </tr>      
                        </thead>
                        <tbody>
                            <tr>
                                <td>Good</td>
                                <td>1</td>
                                <td>0-20</td>
                                <td>0-40</td>
                                <td>0-20</td>
                                <td>0-10</td>
                                <td>0-60</td>
                                <td>0-4400</td>
                            </tr>
                            <tr>
                                <td>Fair</td>
                                <td>2</td>
                                <td>20-80</td>
                                <td>40-70</td>
                                <td>20-50</td>
                                <td>10-25</td>
                                <td>60-100</td>
                                <td>4400-9400</td>
                            </tr>
                            <tr>
                                <td>Moderate</td>
                                <td>3</td>
                                <td>80-250</td>
                                <td>70-150</td>
                                <td>50-100</td>
                                <td>25-50</td>
                                <td>100-140</td>
                                <td>9400-12400</td>
                            </tr>
                            <tr>
                                <td>Poor</td>
                                <td>4</td>
                                <td>250-350</td>
                                <td>150-200</td>
                                <td>100-200</td>
                                <td>50-75</td>
                                <td>140-180</td>
                                <td>12400-15400</td>
                            </tr>
                            <tr>
                                <td>Very Poor</td>
                                <td>5</td>
                                <td>>350</td>
                                <td>>200</td>
                                <td>>200</td>
                                <td>>75</td>
                                <td>>180</td>
                                <td>>15400</td>
                            </tr>                         
                        </tbody>
                    </table> -->
                </div>
            </div>
            <div class="col">
                <div class="card m-4 p-4">
                    <h1 style="text-align:center;">Temperature</h1>
                        <?php
                            // Checks if feild exists
                            if (isset($location) && $coords != null){
                            // Grab the users Location
                            $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';
                            // Calls Function to get user coords
                            $coords = userLocation($location);
                            $lat = $coords[0];
                            $lon = $coords[1];
                            $units = 'metric';
                            // Craft the Query
                            $url = "https://api.openweathermap.org/data/2.5/forecast?lat={$lat}&lon={$lon}&units={$units}&cnt=5&appid={$apiKey}";
                            // Get the Results
                            $data = json_decode(file_get_contents($url), true);
                            // Check for empty response
                            if ($data == null) {
                                exit();
                            } else {
                                $temperature = [];
                                $temperatureMin = [];
                                $temperatureMax = [];
                                // Grab Values
                                foreach ($data['list'] as $item) {
                                    $temperature[] = $item['main']['temp'];
                                    $temperatureMin[] = $item['main']['temp_min'];
                                    $temperatureMax[] = $item['main']['temp_max'];
                                };

                                // Create Data Table
                                $dataTable = [['Time','Temperature','Temperature Max','Temperature Min']];
                                foreach ($data['list'] as $item ) {
                                    $dataTable[] = [$item['dt_txt'], $item['main']['temp'], $item['main']['temp_max'], $item['main']['temp_min']];
                                };

                                // Grab the values for smaller Boxes
                                $humidity = $data['list'][0]['main']['humidity'];
                                $feelsLike = $data['list'][0]['main']['feels_like'];
                                $temp = $data['list'][0]['main']['temp'];
                            };
                        };
                    ?>

                    <!-- Chart -->
                    <script src="https://www.gstatic.com/charts/loader.js"></script>
                    <script>
                        google.charts.load('current', {packages: ['corechart']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            // Make new data table
                            var data = new google.visualization.arrayToDataTable(<?php echo json_encode($dataTable); ?>);

                            // Alter the graph with options
                            var options = {
                                'title': 'Max Temp vs Min Temp',
                                'height': 250,
                                curveType: 'function',
                                backgroundColor: '#f8f9fa'
                            };
                            
                            // Pack the graph onto the screen
                            var chart = new google.visualization.LineChart(document.getElementById('temperature'));
                            chart.draw(data, options);
                        }
                    </script>
                    <!-- Pollution Div Tag -->
                    <div id="temperature"></div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col">
                <div class="card m-4 p-4">
                    <h1 style="text-align:center;">Air Quality Index</h1>
                    <?php if ($coords != null) {echo '<h1 style="text-align:center;">' . $aqi . '</h1>';}; ?>
                </div>
            </div>
            <div class="col">
                <div class="card m-4 p-4">
                    <h1 style="text-align:center;">Humidity</h1>
                    <?php if ($coords != null) {echo '<h1 style="text-align:center;">' . $humidity . '%</h1>';}; ?>
                </div>
            </div>
            <div class="col">
                <div class="card m-4 p-4">
                    <h1 style="text-align:center;">Feels like</h1>
                    <?php if ($coords != null) {echo '<h1 style="text-align:center;">' . $feelsLike . '°C</h1>';}; ?>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>