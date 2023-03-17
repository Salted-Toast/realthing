<?php
    session_start();
    unset($_SESSION['loggedin']);
    unset($_SESSION['username']);
    unset($_SESSION['loginErrorMsg']);
    session_destroy();
    header('Location: ../index');
?>