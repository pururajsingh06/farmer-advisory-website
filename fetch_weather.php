<?php
$api_key = "YOUR_OPENWEATHERMAP_API_KEY"; // Replace with your API key
$city = $_GET["city"];
$url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$api_key&units=metric";

$response = file_get_contents($url);
echo $response;
?>
