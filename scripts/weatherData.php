<?php
    include 'utils.php';
    // Grab the inputs
    $location = $_POST['location'];

    // Create URL for API request
    $api_key = '9ec72fafc67f2ebbe14095e1c5426123';
    $url="http://api.openweathermap.org/geo/1.0/direct?q={$location}&appid={$api_key}";
    

    // Decode Data into an array (true makes it assoc)
    $weather_data = json_decode(file_get_contents($url), true);
    
    // Extract Relevant Data
    $lat = $data[0]['lat'];
    $lon = $data[0]['lon'];

    // header('Location: ../weather')
?>