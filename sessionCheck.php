<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head -->
   <?php require 'includes/head.php'; ?>
</head>
<body>
    <!-- Navbar -->
    <?php require 'includes/nav.php'; ?>
    <!-- Connection -->
    <?php require 'scripts/connect.php'; ?>

    <h1>This the Session Checker</h1>

    <?php var_dump($_SESSION); ?>

    <br>

    <form action="scripts/logoutScript.php"><button class="btn-danger btn" style="margin-right:7px" type="submit">Molest Sessions</button></form>

    <!-- JS Bootstrap -->
    <?php require 'includes/bootstrapjs.php'; ?>
</body>
</html>