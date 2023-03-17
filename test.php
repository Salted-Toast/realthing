<?php
    // Store all relevent info to be used in requests
    $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';
    $units = 'metric'; // Celsius
    $lat = '51.5072178'; // latitude Coord
    $lon = '-0.1275862'; // Longitude Coord
    $days = '7'; // Days of data

    // Craft the request
    $apiUrl = "https://api.openweathermap.org/data/2.5/forecast/daily?lat={$lat}&lon={$lon}&cnt={$days}&units={$units}&appid={$apiKey}"; 

    $requestFile = file_get_contents($apiUrl);

    $weatherData = json_decode($requestFile, true);

    echo $weatherData;
?>