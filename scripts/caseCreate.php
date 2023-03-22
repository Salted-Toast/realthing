<?php
    // Give me access to functions
    require 'utils.php';
    require 'connect.php';

    // Grab Form Details
    $location = $_POST['location'];
    $userComment = $_POST['userComment'];
    $coords = userCoords($location);
    if ($coords != null) {
        $lat = $coords[0];
        $lon = $coords[1];
    }else {
        $location = null;
    };

    // Grab user ID
    session_start();
    $userID = $_SESSION['userID'];
    $temperature = 12.6;
    $aqi = 3;
    $date = date('Y/m/d');
    $time = date('H:i:s');

    // Craft the SQL to submit the case
    $sql = "INSERT INTO cases (user_id, user_comment, temperature, aqi, location, date, time) VALUES(?,?,?,?,?,?,?)";

    // Working on SQL Prep
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 'isdisss', $userID, $userComment, $temperature, $aqi, $location, $date, $time);
    mysqli_stmt_execute($sqlPrep);
    $result = mysqli_stmt_get_result($sqlPrep);
?>