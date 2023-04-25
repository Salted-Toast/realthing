<?php
    // Connect to the DB
    require 'connect.php';
    require 'utils.php';

    // Grab user Comment and Location Inputs
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['userComment']) {
            session_start();
            
        };
        $userComment = $_POST['userComment'];
        $location = $_POST['location'];
    };

    // Checks user Location and returns coords
    $coords = userLocation($location);
    if ($coords != null) {
        $lat = $coords[0];
        $lon = $coords[1];
    } else {
        $location = null;
    };

    // Grab UserID
    session_start();
    $userID = $_SESSION['userID'];

    // API request to get temp
    if (isset($location) && $coords != null) {
        // API Key
        $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';
        // Define Units
        $units = 'metric'; 
        // Craft the requests
        $tempUrl = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&units={$units}&appid={$apiKey}";
        $aqiUrl = "https://api.openweathermap.org/data/2.5/air_pollution?lat={$lat}&lon={$lon}&appid={$apiKey}";
        // Extract Data
        $tempData = json_decode(file_get_contents($tempUrl), true);
        $aqiData = json_decode(file_get_contents($aqiUrl), true);

        if ($tempData == null || $aqiData == null) {
            exit();
        } else {
            // Grab Temperature 
            $temp = $tempData['main']['temp'];
            $aqi = $aqiData['list'][0]['main']['aqi'];
        };
    };

    // Get Date and Time
    $date = date('Y/m/d'); // Using the DATE datatype format
    $time = date('H:i:s');
    

    // Craft SQL query
    $sql = "INSERT INTO cases (user_id, user_comment, aqi, temperature, date, time, location) VALUES (?,?,?,?,?,?,?);";

    // Prepare and execute query
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 'isdisss', $userID, $userComment, $aqi, $temp, $date, $time, $location);
    mysqli_stmt_execute($sqlPrep);
    // Redirect
    header('Location: ../healthTool');
?>