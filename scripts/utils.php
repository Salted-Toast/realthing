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

    // User Coords Functions
    function userCoords($location) {
        $api_key = '9ec72fafc67f2ebbe14095e1c5426123';
        $url = "https://api.openweathermap.org/geo/1.0/direct?q={$location}&appid={$api_key}";

        // Decode Data into an array (true makes it assoc)
        $data = json_decode(file_get_contents($url), true);

        if (!empty($data)){
            // Extract Relevant Data
            $lat = $data[0]['lat'];
            $lon = $data[0]['lon'];

            // Return Coords
            return [$lat, $lon];
        };

        return null;
    };

?>