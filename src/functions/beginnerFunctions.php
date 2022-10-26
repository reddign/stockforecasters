<?PHP
require("functions/database_functions.php");

function name2symbol($name = " ")
{
    try {
        $database = connect_to_db();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    $data = $database->query("SELECT * FROM u413142534_stocks.allStocks;");

    foreach($data as $row) {
        echo $row['stockticker'].$row['stockname'];
    }
    $database = null;
}