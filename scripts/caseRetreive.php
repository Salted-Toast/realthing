<?php
    // Connect to the database
    require 'connect.php';

    // Grab Cases
    $sql = "SELECT * FROM cases WHERE user_id = ?";

    // Grab the user ID
    session_start();
    $userID = $_SESSION['userID'];

    // Prepare the statement
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 'i', $userID);
    mysqli_stmt_execute($sqlPrep);
    $result = mysqli_stmt_get_result($sqlPrep);

    // Check if there are any cases
    if (mysqli_fetch_row($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            
        };
    } else {
        echo 'No Cases';
    };
?>