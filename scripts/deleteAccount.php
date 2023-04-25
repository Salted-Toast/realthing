<?php
    // Connect to the DB
    require 'connect.php';

    // Craft SQL
    $sql = "DELETE FROM users WHERE user_id = ?;";

    // Grab User ID
    session_start();
    $userID = $_SESSION['userID'];
    
    // Prepare the SQL for execution
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 'i', $userID);
    mysqli_stmt_execute($sqlPrep);

    // Craft SQL
    $sql = "DELETE FROM user_profile WHERE user_id = ?;";

    // Prepare the SQL for execution
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 'i', $userID);
    mysqli_stmt_execute($sqlPrep);

    // Craft SQL
    $sql = "DELETE FROM cases WHERE user_id = ?;";

    // Prepare the SQL for execution
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 'i', $userID);
    mysqli_stmt_execute($sqlPrep);

    // Craft SQL
    $sql = "DELETE FROM user_login WHERE user_id = ?;";

    // Prepare the SQL for execution
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 'i', $userID);
    mysqli_stmt_execute($sqlPrep);


    // Log User Out
    require 'logout.php';

    header('Location: ../index');
?>