<?php
    // Starts a new session
    session_start();
    // Destroys session
    session_destroy();
    // Redirect
    header('Location: ../index');
?>