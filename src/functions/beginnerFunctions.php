<?PHP
require("functions/database_functions.php");

function name2symbol($name = " ")
{
    echo "Works";
    $database = connect_to_db();
    $data = $database->query("SELECT * FROM allStocks");
    $f =  $data->fetchAll(PDO::FETCH_ASSOC);
    echo $f['stockname'];

}