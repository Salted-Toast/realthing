<?php
    // Connect to DB
    require 'connect.php';

    // Grab Form Inputs
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the Password
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

    //Check if username is already in use
    $sql = "SELECT * FROM users WHERE username = ?;";
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 's', $username);
    mysqli_stmt_execute($sqlPrep);
    $result = mysqli_stmt_get_result($sqlPrep);

    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['registerUnameError'] = 'Username is taken';
        header('Location: ../account');
        exit();
    } else {
        // Make Query and Execute
        $sql1 = "INSERT INTO users (username, password) VALUES(?,?);";
        $sqlPrep1 = mysqli_prepare($conn, $sql1);
        mysqli_stmt_bind_param($sqlPrep1, 'ss', $username, $hashedPass);
        mysqli_stmt_execute($sqlPrep1);

        // Gets user id so it can insert other content into diff table
        $userID = mysqli_insert_id($conn);

        // Insert the rest of the data 
        $sql2 = "INSERT INTO user_profile (email) VALUES (?);";
        $sqlPrep2 = mysqli_prepare($conn, $sql2);
        mysqli_stmt_bind_param($sqlPrep2, 's', $email);
        mysqli_stmt_execute($sqlPrep2);

        // Update login values
        session_start();
        $_SESSION['username'] = $username;
        header('Location: ../account');
    };
?>
