<?php
    // User Verification Functions

    function loginCheck() {
        if (!isset($_SESSION['loggedin'])) {
            return false;
        } elseif ($_SESSION['loggedin']) {
            return true;
        } else {
            return false;
        };
    };
    
    // Kelvin to Celcius
    function kelvin_to_celcius($kelvin) {
        $celcuis = $kelvin - 273.15;
        return $celcuis;
    };
?>