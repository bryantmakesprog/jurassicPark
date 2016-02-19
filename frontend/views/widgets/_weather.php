<?php

/* 
 * Displays the current weather in Costa Rica. Utilizes the openweathermap api.
 */

$city="Liberia";
$country="CR"; //Two digit country code
$appid = "18c62ddb550bfa63a012e18a0f15d67d";
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&units=metric&cnt=7&lang=en&appid=$appid";

$json=file_get_contents($url);
$data=json_decode($json,true);
echo "<div>";
    echo "<div class='row-fluid'>";
        echo "<img src='http://openweathermap.org/img/w/" . $data['weather'][0]['icon'] . ".png' class='center-block'/>";
    echo "</div>";
    echo "<div class='row-fluid' class='center-block'>";
        echo "<div class='col-md-12 text-center'>";
            echo $data['weather'][0]['main'] . "<br/>";
            //Get current Temperature in Celsius
            echo round((($data['main']['temp'] * 1.8) + 32),0) . "&#8457" . "<br>";
        echo "</div>";
    echo "</div>";
echo "</div>";

