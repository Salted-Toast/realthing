<?php
    // Require connection file
    require 'connect.php';
    // Craft SQL query
    $username = $_SESSION['username'];
    $getItemsSQL = "SELECT * FROM users WHERE users.username = '$username'";
    $result = mysqli_query($conn, $getItemsSQL);
?>