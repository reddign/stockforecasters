<?php
function connect_to_db()
{
    //Need to figure out how to hide this in config.php
    $databasehost = "156.67.74.51";
    $database = "u413142534_stocks";
    $databaseuser = "u413142534_forecaster";
    $databasepassword = "BullzNB3ars";

    $dsn = "mysql:host=$databasehost;dbname=$database;charset=UTF8";

    try {
        $pdo = new PDO($dsn, $databaseuser, $databasepassword);
        return $pdo;
    } catch (PDOException $e) {
        echo "Database error " . $e->getMessage();
        exit();
    }
}

function name2symbol($name = "")
{
    $pdo = connect_to_db();
    $data = $pdo->query("SELECT * FROM allStocks WHERE stockname LIKE '%$name%';")->fetchAll();

    foreach ($data as $row) {
        echo $row['stockticker'] . " " . $row['stockname'] . "<br>";
    }
}
