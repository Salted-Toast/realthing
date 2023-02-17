<?php
    // $ip = $_SERVER['REMOTE_ADDR'];
    $ip = '192.168.201.20';
    $api_key = '32c52cdc84e94be0b7349fe6f345ef68';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.ipgeolocation.io/ipgeo?apiKey={$api_key}&ip={$ip}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    curl_close($ch);

    $location = json_decode($result,true);
    var_dump($location);
?>