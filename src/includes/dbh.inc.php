<?php

$databasehost = "156.67.74.51";
$databaseuser = "u413142534_forecaster";
$databasepassword = "BullzNB3ars";
$database = "u413142534_stocks";

// //Need to figure out how to hide this in config.php
global $database, $databasehost, $databaseuser, $databasepassword;


$conn = mysqli_connect($databasehost, $databaseuser, $databasepassword, $database);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}





// $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

// if(!$conn){
//     die("Connection Failed: " . mysqli_connect_error());
// }
