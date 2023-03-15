<?php
    // Grab coords from AJAX request
    $lat = $_GET['lat'];
    $lon = $_GET['lon'];
    // API Key
    $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';

    // Craft the URL
    $url = 'https://api.openweathermap.org/geo/1.0/reverse?lat=' . $lat . '&lon=' . $lon . '&appid=' . $apiKey;
    
    // Get Resopnse and Read it
    $locationData = json_decode(file_get_contents($url), true);
    // Grab the Value
    $location = $locationData[0]['name'];
?>