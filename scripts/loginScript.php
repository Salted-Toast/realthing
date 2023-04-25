<?php
    // Connect to DB
    require 'connect.php';
    
    // Grab users inputs
    $username = $_POST['logUname'];
    $password = $_POST['logPword'];

    // Craft the SQL
    $sql = "SELECT * FROM users WHERE username = ?;";
    
    // Prepare the SQL for execution
    $sqlPrep = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($sqlPrep, 's', $username);
    mysqli_stmt_execute($sqlPrep);
    $result = mysqli_stmt_get_result($sqlPrep);

    // If query is succesfull store assoc array as row
    if ($row = mysqli_fetch_assoc($result)) {
        // Grab Password from DB
        $storedPassword = $row['password'];
        // If 1 result comes back
        if (mysqli_num_rows($result) === 1) {
            // Verify Password (Its Hashed)
            if (password_verify($password, $storedPassword)) {
                $userID = $row['user_id'];
                // Log user in using sessions
                session_start();
                $_SESSION['userID'] = $userID;
                $_SESSION['username'] = $username;
                $_SESSION['loginStatus'] = true;
                header('Location: ../userHub');
            }else {
                // Inform user details were wrong
                session_start();
                $_SESSION['loginErrorMsg'] = 'Incorect password or username';
                header('Location: ../login');
            };
        }else {
            // Inform user details were wrong
            session_start();
            $_SESSION['loginErrorMsg'] = 'Incorect password or username';
            header('Location: ../login');
        };

        // Add login date and time to login table
        $sql = "INSERT INTO user_login (user_id, date, time) VALUES (?,?,?);";

        // Grab Date and Time
        $date = date('Y/m/d'); // Using the DATE datatype format
        $time = date('H:i:s');

        // Prepare the SQL for execution
        $sqlPrep = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($sqlPrep, 'iss', $userID, $date, $time);
        mysqli_stmt_execute($sqlPrep);
    };
?>