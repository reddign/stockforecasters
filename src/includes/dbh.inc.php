<?php

$serverName = "156.67.74.51";
$dBUsername = "u413142534_forecaster";
$dBPassword = "BullzNB3ars";
$dBName = "u413142534_stocks";


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
