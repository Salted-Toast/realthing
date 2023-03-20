<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require 'scripts/utils.php'; ?>
</head>
<body>
    <?php
        // Grab Values
        $location = 'London';

        // Get user Coords
        $coords = userCoords($location);
        if ($coords != null) {
            $lat = $coords[0];
            $lon = $coords[1];
        };
    ?>
    <?php
        if (!isset($lat, $lon)) {
            exit();
        };

        // Create API Requests
        $apiKey = '9ec72fafc67f2ebbe14095e1c5426123';

        // API request for polutants
        $url = "https://api.openweathermap.org/data/2.5/forecast?lat={$lat}&lon={$lon}&unit=metric&appid={$apiKey}";
        // Make Request and Decode into a JSON (True means assoc)
        $polutionData = json_decode(file_get_contents($url),true);
        echo (json_encode($polutionData));
        // Extact Values From JSON
    ?>
</body>
</html>