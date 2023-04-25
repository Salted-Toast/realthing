<?php
    // Connect to db
    require 'connect.php';

    // Grab Register Input
    $email = $_POST['regEmail'];
    $firstname = $_POST['regFirstname'];
    $surname = $_POST['regSurname'];
    $username = $_POST['regUsername'];
    $password = $_POST['regPassword'];

    // Hash Password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
 
    // Check if Username is allready in use
    $sql1 = "SELECT * FROM users WHERE username = ?;";
        
    // Prepare the SQL for execution
    $sqlPrep1 = mysqli_prepare($conn, $sql1);
    mysqli_stmt_bind_param($sqlPrep1, 's', $username);
    mysqli_stmt_execute($sqlPrep1);
    $result = mysqli_stmt_get_result($sqlPrep1);

    // If username exists inform user
    if (mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION['registerUsernameError'] = 'Username is taken';
        header('Location: ../register');
        exit();

    } else {
        // Make Query and insert values into tables
        $sql2 = "INSERT INTO users (username, password) VALUES (?,?);";
        
        // Prepare the SQL for execution
        $sqlPrep2 = mysqli_prepare($conn, $sql2);
        mysqli_stmt_bind_param($sqlPrep2, 'ss', $username , $hashedPassword);
        mysqli_stmt_execute($sqlPrep2);

        // Gets user ID to allow table to be relational
        $userID = mysqli_insert_id($conn);

        // Insert the rest of the data
        $sql3 = "INSERT INTO user_profile (user_id, firstname, surname, email) VALUES (?,?,?,?);";
        $sqlPrep3 = mysqli_prepare($conn, $sql3);
        mysqli_stmt_bind_param($sqlPrep3, 'isss', $userID, $firstname, $surname, $email);
        mysqli_stmt_execute($sqlPrep3);

        // Log the user in for a better experience
        session_start();
        $_SESSION['userID'] = $userID;
        $_SESSION['username'] = $username;
        $_SESSION['loginStatus'] = true;
        header('Location: ../userHub');
    };
?>