<?php
    session_start();
    session_destroy();
    unset($_SESSION['loggedin']);
    unset($_SESSION['username']);
    unset($_SESSION['loginErrorMsg']);
    header('Location: ../index');
?>