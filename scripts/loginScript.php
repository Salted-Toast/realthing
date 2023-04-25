<?php
    // Connect to DB
    require 'connect.php';
    
    // Grab Login Inputs
    $username = $_POST['loginUser'];
    $password = $_POST['loginPass'];

    // Get Username and Corisponding Pass
    $sql = "SELECT * FROM users WHERE username = ?;";

    // Working on SQL Prep
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 's', $username);
    mysqli_stmt_execute($sqlPrep);
    $result = mysqli_stmt_get_result($sqlPrep);

    // Starts Verification Process
    if ($row = mysqli_fetch_assoc($result)){
        $storedPassword = $row['password']; 
        if (mysqli_num_rows($result) > 0) {
            if (password_verify($password, $storedPassword)) {
                $userID = $row['user_id'];
                session_start();
                $_SESSION['userID'] = $userID;
                $_SESSION['username'] = $username;
                $_SESSION['loggedin'] = true;
                // Flag login event in DB
                $sql = "INSERT INTO ";
                header('Location: ../userHub');
                };
            } else {
                session_start();
                $_SESSION['loginErrorMsg'] = 'Incorrect password or username';
                header('Location: ../login');
            };
    } else {
        session_start();
        $_SESSION['loginErrorMsg'] = 'Incorrect password or username';
        header('Location: ../login');
    };

    // Add login date and time to DB
    $sql = "INSERT INTO user_login (user_id, date, time) VALUES (?,?,?);";

    // Grab date and time
    $date = date('Y/m/d');
    $time = date('H:i:s');

    // Working on SQL Prep
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 'iss', $userID, $date, $time);
    mysqli_stmt_execute($sqlPrep);
?>