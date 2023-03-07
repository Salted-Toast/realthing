<?php
    // User Verification Functions

    function loginCheck() {
        if (!isset($_SESSION['loggedin'])) {
            header('location: login');
        } elseif ($_SESSION['loggedin']===1) {
            return true;
        } else {
            header('Location: login');
        };
    };

    function adminCheck() {
        if ($_SESSION['adminCheck'] === 1) {
            echo 'Hello Admin';
        } elseif ($_SESSION['adminCheck'] === 0) {
            header('Location: index');
        } else {
            header('Location: index');
        };
    };
    
    // Kelvin to Celcius
    function kelvin_to_celcius($kelvin) {
        $celcuis = $kelvin - 273.15;
        return $celcuis;
    };
?>