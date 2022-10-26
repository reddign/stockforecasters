<?php
 function connect_to_db(){
    
    global $database,$databasehost,$databaseuser,$databasepassword;
    $dsn = "mysql:host=$databasehost;dbname=$database;charset=UTF8";
    
    try{
        $pdo = new PDO($dsn, $databaseuser, $databasepassword);
        echo "success";
        return $pdo;
    }
    catch(PDOException $e) {
        echo "Database error ".$e->getMessage();
        exit();
    }
        

    

    
 }
