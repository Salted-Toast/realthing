<?php
    // Grab users location from form
    $location = $_POST['location'];

    // Have API key to allow requests
    $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';

    // Craft the Query
    $url = "https://api.openweathermap.org/geo/1.0/direct?q={$location}&appid={$apiKey}";

    // Grab Data
    $data = json_decode(file_get_contents($url), true);

    // If the data is empy assume bad query
    if ($data == null) {
        echo 'Dead Result';
    } else {
        // Retreive Data
        $lat = $data[0]['lat'];
        $lon = $data[0]['lon'];
        // echo 'Lat: ' . $lat . ' Lon: ' . $lon;
        header('Location: ../dashboard');
    };
?>