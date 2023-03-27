<?php
    // Give me access to functions
    require 'utils.php';
    require 'connect.php';

    // Grab Form Details
    $location = $_POST['location'];
    $userComment = $_POST['userComment'];

    // Grab user ID
    session_start();
    $userID = $_SESSION['userID'];

    // Grab AQI and Temperature
    $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';
    $coords = userCoords($location);
    if ($coords != null) {
        $lat = $coords[0];
        $lon = $coords[1];
    }else {
        $location = null;
    };
    $units = 'metric';
    $tempUrl = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&units={$units}&appid={$apiKey}";
    $aqiUrl = "https://api.openweathermap.org/data/2.5/air_pollution?lat={$lat}&lon={$lon}&appid={$apiKey}";

    $temperature = json_decode(file_get_contents($tempUrl), true)['main']['temp'];
    $aqi = json_decode(file_get_contents($aqiUrl), true)['list'][0]['main']['aqi'];

    // Grab Date and Time
    $date = date('Y/m/d');
    $time = date('H:i:s');

    // Craft the SQL to submit the case
    $sql = "INSERT INTO cases (user_id, user_comment, temperature, aqi, location, date, time) VALUES(?,?,?,?,?,?,?)";

    // Working on SQL Prep
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 'isdisss', $userID, $userComment, $temperature, $aqi, $location, $date, $time);
    mysqli_stmt_execute($sqlPrep);
    $result = mysqli_stmt_get_result($sqlPrep);

    // Redirect
    header("Location: ../healthTracker.php");
?>