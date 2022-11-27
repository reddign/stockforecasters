<?php
require("../../config.php");

$conn = mysqli_connect($databasehost, $databaseuser, $databasepassword, $database);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}





// $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

// if(!$conn){
//     die("Connection Failed: " . mysqli_connect_error());
// }
