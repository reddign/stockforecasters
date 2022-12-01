<?PHP
// require("../config.php");
require("../../stocks_config.php");

require("functions/basic_html_functions.php");
require("includes/header.php");
require("functions/simple_html_dom.php");
require("functions/databaseFunctions.php");
display_small_page_heading("Profile", "");

if($_SESSION["loggedIn"]!=1)
    echo "You must log in to access this page";
else {

session_start();
?>

<h2> <?PHP echo $_SESSION["usersUid"];?></h2>

<h5> Add a stock to your watchlist <br> <br>
  <form method="get">
    <input style="width:150px; border-width:3px border-style=solid; border-color:black;" type="text" id="stockAdd" name="stockAdd" placeholder="Stock Symbol">
    <input type="submit" name="Add" id="Add" value="Add" />
  </form>

  <br>
  <h5> Delete a stock from your watchlist <br> <br>
    <form method="get">
      <input style="width:150px; border-width:3px border-style=solid; border-color:black;" type="text" id="stockDel" name="stockDel" placeholder="Stock Symbol">
      <input type="submit" name="Delete" id="Delete" value="Delete" /> <br><br><br>
      <input type="submit" name="View" id="View" value="View your watchlist" /> <br><br>

    </form>

    <?PHP
    
    $pdo = connect_to_db();
    $username = $_SESSION["usersUid"];

    if (isset($_GET['Add'])) {
      $stockToAdd = $_GET['stockAdd'];
      $username = $_SESSION["usersUid"];

      $pdo = connect_to_db();
      $data = $pdo->query("SELECT * FROM allStocks WHERE stockticker LIKE '$stockToAdd';")->fetchAll();


      if ($data == NULL) {
        //stock does not exist so we wont add it to list
        echo "The stock " . $stockToAdd . " does not exist. It will not be added to your watchlist.";
      } else {
        $data = $pdo->prepare("INSERT INTO $username (stockTicker) VALUES (:stockTicker);");
        $data->execute(['stockTicker' => $stockToAdd]);
      }
    }

    if (isset($_GET['Delete'])) {
      $stockToDelete = $_GET['stockDel'];

      $data = $pdo->query("SELECT * FROM $username;")->fetchAll();
      if ($data == NULL) {
        echo "No stocks in your watchlist";
      }

      $data = $pdo->query("SELECT * FROM $username WHERE stockTicker LIKE '$stockToDelete';")->fetchAll();
      if ($data == NULL) {
        echo "<br>The stock " . $stockToDelete . " is not in your watchlist.";
      }
      else {
        $data = $pdo->prepare("DELETE FROM $username WHERE stockTicker=:stockTicker;");
        $result = $data->execute(['stockTicker' => $stockToDelete]);
        if($result==TRUE) {
          echo $stockToDelete . " was deleted.";
        }
      }
    }

    if (isset($_GET['View'])) {
      $data = $pdo->query("SELECT * FROM $username;")->fetchAll();
      if ($data == NULL) {
        echo "No stocks in your watchlist";
      }
      foreach ($data as $row) {
        echo $row['stockTicker'] . "<br>";
      }
    }

    ?>

  </h5>

  <?PHP
  require("includes/footer.php");
  }
  ?>
