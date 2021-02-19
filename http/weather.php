<?php
/*
This script provides a nice web-based weather overlay for use in OBS as a browser source.
Requires an OpenWeatherMap API key, I personally use the free tier and it works fine.
*/

$location="Portland,Oregon";
$api_key="insert_key_here";
$weather=file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=$location&appid=$api_key");
$weather_object=json_decode($weather,true);
?>
<!doctype html>
<html lang="en">
<head>
    <title>Weather in <?=$location;?></title>
    <meta charset="utf-8">
    <meta http-equiv="Refresh" content="60">
</head>
<body>

<div style="font: bold 50px monospace; color: lightgray; display: inline-block; border-radius: 5px; padding: 2px 5px;background-color: rgba(0,0,0,0.5);">
    <?php
    echo round($weather_object["main"]["temp"]-273.15,2)."&deg;c (feels like ".round($weather_object["main"]["feels_like"]-273.15,2)."&deg;c), ".$weather_object["main"]["humidity"]."%RH";
    ?>
</div>

</body>
</html>
