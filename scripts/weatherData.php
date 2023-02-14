<?php
    include 'utils.php';
    // Grab the inputs
    $location = $_POST['location'];

    // Create URL for API request
    $api_key = '49c0bad2c7458f1c76bec9654081a661';
    $url="http://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$api_key}";

    // Decode Data into an array (true makes it assoc)
    $weather_data = json_decode(file_get_contents($url), true);

    // Extract Relevant Data
    $kelvin_temperature = $weather_data['main']['temp'];
    $temperature = kelvin_to_celcius($kelvin_temperature);

    if ($temperature == -273.15) {
        session_start();
        $_SESSION['temp_error'] = '<p>That was an invalid location</p>';
    } elseif ($temperature > -273.15) {
        session_start();
        $_SESSION['temp'] = '<p>The Temperature in ' . $location . ' is: ' . $temperature . ' degrees celcius</p>';
    };

    // Redirect
    header('Location: ../weather');
?>