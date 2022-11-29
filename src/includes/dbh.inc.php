<?php
//require("../../config.php");
require("../../../stocks_config.php");


$conn = mysqli_connect($databasehost, $databaseuser, $databasepassword, $database);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

