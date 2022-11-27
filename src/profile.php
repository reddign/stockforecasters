<?PHP
require("../config.php");
//require("../../stocks_config.php");

require("functions/basic_html_functions.php");
require("includes/header.php");
require("functions/simple_html_dom.php");
require("functions/databaseFunctions.php");
display_small_page_heading("Watchlist", "");

?>

<h5> Add a stock to your watchlist <br> <br>
  <form method="get">
    <input style="width:150px; border-width:3px border-style=solid; border-color:black;" type="text" id="stock" name="stock" placeholder="Stock Symbol">
    <input type="submit" name="Add" id="Add" value="Add" />
  </form>
  <br> <br>

  View your watchlist

  <!-- SQL query to get all stocks from users list
  print all the stocks, if no stocks are added print "No stocks in your watchlist" -->
  
</h5>

<?PHP
if (isset($_GET['Add'])) {
  // php query to add stock to watchlist
}
?>



<?PHP
require("includes/footer.php");
?>