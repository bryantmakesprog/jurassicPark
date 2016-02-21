<?php

/* 
 * Displays the current weather in Costa Rica. Utilizes the openweathermap api.
 */

use yii\helpers\Html;

$city="Liberia";
$country="CR"; //Two digit country code
$appid = "18c62ddb550bfa63a012e18a0f15d67d";
$url="http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&units=metric&cnt=7&lang=en&appid=$appid";

$json=file_get_contents($url);
$data=json_decode($json,true);

//Get weather image.
$weatherImage = "http://i.imgur.com/B2x3TTy.jpg";
switch($data['weather'][0]['icon'])
{
    case "01d":
        $weatherImage = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456071663/weather/01d.png";
        break;
    case "01n":
        $weatherImage = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456071663/weather/01n.png";
        break;
    case "02d":
        $weatherImage = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456071663/weather/02d.png";
        break;
    case "02n":
        $weatherImage = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456071663/weather/02n.png";
        break;
    case "03d":
    case "03n":
    case "04d":
    case "04n":
        $weatherImage = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456071664/weather/03d.png";
        break;
    case "09d":
    case "09n":
    case "10d":
    case "10n":
        $weatherImage = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456071663/weather/09d.png";
        break;
    case "11d":
    case "11n":
        $weatherImage = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456071664/weather/11d.png";
        break;
    case "13d":
    case "13n":
        $weatherImage = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456071664/weather/13d.png";
        break;
    case "50d":
        $weatherImage = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456071663/weather/50d.png";
        break;
    case "50n":
        $weatherImage = "http://res.cloudinary.com/dxqmggd5a/image/upload/e_negate/v1456071664/weather/50n.png";
        break;
}

$weatherURL = $weatherImage;
echo "<div class='col-md-3 col-sm-4 col-xs-6'>";
    echo "<div class='dummy'></div>";
    echo Html::a("<h2>" . $data['weather'][0]['main'] . "</h2>", ['#'], ['class' => 'thumbnail', 'style' => "background:$tileColor"]);
    echo Html::a("", ['#'], ['class' => 'thumbnail thumbnail-hover', 'style' => "background:$tileColor url('$weatherImage') no-repeat center;"]);
echo "</div>";

