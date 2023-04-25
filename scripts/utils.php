<?php
    // User Authentication Functions
    
    function loginCheck() {
        if (!isset($_SESSION['loginStatus'])) {
            return false;
        } elseif ($_SESSION['loginStatus']) {
            return true;
        }else {
            return false;
        };
    };

    function loginBoot() {
        if (!isset($_SESSION['loginStatus'])) {
            header('Location: index');
        };
    };

    // User Location Functions

    function userLocation($location) {
        // Check if $location exists
        if (!isset($location) || $location == null) {
            return null;
            exit();
        };
        
        // Have API key to allow requests
        $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';

        // Craft the Query
        $url = "https://api.openweathermap.org/geo/1.0/direct?q={$location}&appid={$apiKey}";

        // Grab Data
        $data = json_decode(file_get_contents($url), true);

        // If the data is empy assume bad query
        if ($data == null) {
            exit();
        } else {
            // Retreive Data
            $lat = $data[0]['lat'];
            $lon = $data[0]['lon'];
            return [$lat, $lon];
        };

        return null;
    };

    // Custom Health Advice
    
    function coldAdvice($temps) {
        // See how many temps < 6°C if more than 50% give cold weather advice
        $counter = 0;
        for ($i=0; $i<=(sizeof($temps)-1) ;$i++) {
            if ($temps[$i] < 6) {
                $counter++;
            };
        };
        if ((($counter/sizeof($temps))*100) > 50) {
            return true;
        } else {
            return false;
        };
    };
    function warmAdvice($temps) {
        // See how many temps > 26°C if more than 50% give hot weather advice
        $counter = 0;
        for ($i=0; $i<=(sizeof($temps)-1) ;$i++) {
            if ($temps[$i] > 26) {
                $counter++;
            };
        };
        if ((($counter/sizeof($temps))*100) > 50) {
            return true;
        } else {
            return false;
        };
    };

    function airAdvice($aqis) {
        // See how many AQIs > 2
        $counter = 0;
        for ($i=0; $i<=(sizeof($aqis)-1) ;$i++) {
            if ($aqis[$i] > 2) {
                $counter++;
            };
        };
        // If 60 percent of aqis are above 2 give advice for pollution
        if ((($counter/sizeof($aqis))*100) > 50) {
            return true;
        } else {
            return false;
        };
    };
?>