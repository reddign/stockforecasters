<?PHP
$path = '';
require("functions/indexFunctions.php");
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("EC Stock Forecasters");

?>

<html>
<h4 style="text-align:center">
  <b>
    <?PHP displayTime(); ?>
  </b>
  <br><br> Welcome to the main page of the EC Stock Forecasters <br> <br>
</h4>

<h3 style="text-align:center" ;>

  <?PHP
  indexPrice('Dow', 'https://query1.finance.yahoo.com/v8/finance/chart/^DJI?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d');
  indexPrice('Nasdaq', 'https://query1.finance.yahoo.com/v8/finance/chart/^IXIC?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d');
  echo "<br>";
  indexPrice('S&P 500', 'https://query1.finance.yahoo.com/v8/finance/chart/^GSPC?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d');
  indexPrice('Russell 2000', 'https://query1.finance.yahoo.com/v8/finance/chart/^RUT?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d');
  ?>

</h3>

<h2> News </h2>

</html>

<?PHP
require("includes/footer.php");
?>