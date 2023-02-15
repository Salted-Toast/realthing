<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
   <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>
    <!-- Connection -->
    <?php require 'scripts/connect.php'; ?>

    <!-- Content -->
    <?php
        // Create API Requests
        $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';
        $city = 'London';

        // Geocoding for qoords
        $url = "http://api.openweathermap.org/geo/1.0/direct?q={$city}&appid={$apiKey}";

        // Make Request and Decode into a JSON (True means assoc)
        $locationData = json_decode(file_get_contents($url),true);

        // Extract latitude and longitude from $polutionData array
        $lat = $locationData[0]['lat'];
        $lon = $locationData[0]['lon'];

        // API request for polutants
        $url = "http://api.openweathermap.org/data/2.5/air_pollution?lat={$lat}&lon={$lon}&appid={$apiKey}";
        // Make Request and Decode into a JSON (True means assoc)
        $polutionData = json_decode(file_get_contents($url),true);
        print_r($polutionData);
        
        // Extact Values From JSON
        $aqi = $polutionData[0]['aqi'];

    ?>

    <!-- Footer -->
    <?php require 'includes/footer.php'; ?>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>