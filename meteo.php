<?php
/*
Plugin Name: Météo pourrie
Description: Fais moche t'façon
Author: Moi
*/
function meteo(){
  $curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "http://api.openweathermap.org/data/2.5/weather?q=mende&appid=c4fb8d6c7eccd32976c408b271183e63&lang=fr",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
  "cache-control: no-cache"
),
));

$response = curl_exec($curl);
$response = json_decode($response, true); //because of true, it's in an array
//var_dump($response);
$r=$response["weather"][0]["description"];
echo "Aujourd'hui à Prévenchères le temps est: $r";
}

add_action( 'wp_footer', 'meteo' );
?>