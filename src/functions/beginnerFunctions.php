<?PHP

require("database_functions.php");

// function name2symbol()
// {
    $pdo = connect_to_db();
    $data = $pdo->query("SELECT * FROM allStocks;")->fetchAll();
    
    foreach($data as $row) {
        echo $row['stockticker']." ".$row['stockname']."<br>";
    }
//}