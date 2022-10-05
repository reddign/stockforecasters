<?PHP
$path = '';
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("EC Stock Forecasters");

#color code green=0 red=1 black=2
$DJI_url = 'https://query1.finance.yahoo.com/v8/finance/chart/^DJI?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d';
$DJI_stock_data = json_decode(file_get_contents($DJI_url), true);
$DJI_current = $DJI_stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
$DJI_prevClose = $DJI_stock_data['chart']['result'][0]['meta']['previousClose'];
$DJI_diff = number_format($DJI_current - $DJI_prevClose, 2);
$DJI_diffPercent = number_format((($DJI_current - $DJI_prevClose) / $DJI_prevClose) * 100, 2);
if ($DJI_diff > 0) {
  $DJI_color = 0;
} else if ($DJI_diff < 0) {
  $DJI_color = 1;
} else {
  $DJI_color = 2;
}

$NASDAQ_url = 'https://query1.finance.yahoo.com/v8/finance/chart/^IXIC?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d';
$NASDAQ_stock_data = json_decode(file_get_contents($NASDAQ_url), true);
$NASDAQ_current = $NASDAQ_stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
$NASDAQ_prevClose = $NASDAQ_stock_data['chart']['result'][0]['meta']['previousClose'];
$NASDAQ_diff = number_format($NASDAQ_current - $NASDAQ_prevClose, 2);
$NASDAQ_diffPercent = number_format((($NASDAQ_current - $NASDAQ_prevClose) / $NASDAQ_prevClose) * 100, 2);
if ($NASDAQ_diff > 0) {
  $NASDAQ_color = 0;
} else if ($NASDAQ_diff < 0) {
  $NASDAQ_color = 1;
} else {
  $NASDAQ_color = 2;
}

#color code green=0 red=1 black=2
$SP_url = 'https://query1.finance.yahoo.com/v8/finance/chart/^GSPC?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d';
$SP_stock_data = json_decode(file_get_contents($SP_url), true);
$SP_current = $SP_stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
$SP_prevClose = $SP_stock_data['chart']['result'][0]['meta']['previousClose'];
$SP_diff = number_format($SP_current - $SP_prevClose, 2);
$SP_diffPercent = number_format((($SP_current - $SP_prevClose) / $SP_prevClose) * 100, 2);
if ($SP_diff > 0) {
  $SP_color = 0;
} else if ($SP_diff < 0) {
  $SP_color = 1;
} else {
  $SP_color = 2;
}

#color code green=0 red=1 black=2
$R_url = 'https://query1.finance.yahoo.com/v8/finance/chart/^RUT?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d';
$R_stock_data = json_decode(file_get_contents($R_url), true);
$R_current = $R_stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
$R_prevClose = $R_stock_data['chart']['result'][0]['meta']['previousClose'];
$R_diff = number_format($R_current - $R_prevClose, 2);
$R_diffPercent = number_format((($R_current - $R_prevClose) / $R_prevClose) * 100, 2);
if ($R_diff > 0) {
  $R_color = 0;
} else if ($R_diff < 0) {
  $R_color = 1;
} else {
  $R_color = 2;
}

?>

<html>
<h4 style="text-align:center">
  <b>

    <script>
      function display_ct7() {
        var x = new Date()
        var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
        hours = x.getHours() % 12;
        hours = hours ? hours : 12;
        hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

        var minutes = x.getMinutes().toString()
        minutes = minutes.length == 1 ? 0 + minutes : minutes;

        var seconds = x.getSeconds().toString()
        seconds = seconds.length == 1 ? 0 + seconds : seconds;

        var month = (x.getMonth() + 1).toString();
        month = month.length == 1 ? 0 + month : month;

        var dt = x.getDate().toString();
        dt = dt.length == 1 ? 0 + dt : dt;

        var x1 = month + "/" + dt + "/" + x.getFullYear();
        x1 = x1 + " " + hours + ":" + minutes + ":" + seconds + " " + ampm;
        document.getElementById('ct7').innerHTML = x1;
        display_c7();
      }
      function display_c7() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct7()', refresh)
      }
      display_c7()
    </script>
    <span id='ct7'></span>

  </b>
  <br><br> Welcome to the main page of the EC Stock Forecasters <br> <br>
</h4>

<div id="scroll-text">
  <?php if ($DJI_color == 0) : ?>
    Dow <?php echo $DJI_current . "<span style='color:green;'> +$DJI_diff (+$DJI_diffPercent%)</span>"; ?>
  <?php elseif ($DJI_color == 1) : ?>
    Dow <?php echo $DJI_current . "<span style='color:red;'> $DJI_diff ($DJI_diffPercent%)</span>"; ?>
  <?php elseif ($DJI_color == 2) : ?>
    Dow <?php echo $DJI_current . "<span style='color:black;'> $DJI_diff ($DJI_diffPercent%)</span>"; ?>
  <?php endif; ?>

  <?php if ($NASDAQ_color == 0) : ?>
    Nasdaq <?php echo $NASDAQ_current . "<span style='color:green;'> +$NASDAQ_diff (+$NASDAQ_diffPercent%)</span>"; ?>
  <?php elseif ($NASDAQ_color == 1) : ?>
    Nasdaq <?php echo $NASDAQ_current . "<span style='color:red;'> $NASDAQ_diff ($NASDAQ_diffPercent%)</span>"; ?>
  <?php elseif ($NASDAQ_color == 2) : ?>
    Nasdaq <?php echo $NASDAQ_current . "<span style='color:black;'> $NASDAQ_diff ($NASDAQ_diffPercent%)</span>"; ?>
  <?php endif; ?>

  <?php if ($SP_color == 0) : ?>
    S&P 500 <?php echo $SP_current . "<span style='color:green;'> +$SP_diff (+$SP_diffPercent%)</span>"; ?>
  <?php elseif ($SP_color == 1) : ?>
    S&P 500 <?php echo $SP_current . "<span style='color:red;'> $SP_diff ($SP_diffPercent%)</span>"; ?>
  <?php elseif ($SP_color == 2) : ?>
    S&P 500 <?php echo $SP_current . "<span style='color:black;'> $SP_diff ($SP_diffPercent%)</span>"; ?>
  <?php endif; ?>

  <?php if ($R_color == 0) : ?>
    Russell 2000 <?php echo $R_current . "<span style='color:green;'> +$R_diff (+$R_diffPercent%)</span>"; ?>
  <?php elseif ($R_color == 1) : ?>
    Russell 2000 <?php echo $R_current . "<span style='color:red;'> $R_diff ($R_diffPercent%)</span>"; ?>
  <?php elseif ($R_color == 2) : ?>
    Russell 2000 <?php echo $R_current . "<span style='color:black;'> $R_diff ($R_diffPercent%)</span>"; ?>
  <?php endif; ?>
</div>

<h2> News </h2>


<style>
#scroll-text {
  /* animation properties */
  -moz-transform: translateX(100%);
  -webkit-transform: translateX(100%);
  transform: translateX(100%);
  
  -moz-animation: my-animation 20s linear infinite;
  -webkit-animation: my-animation 20s linear infinite;
  animation: my-animation 20s linear infinite;
}

/* for Firefox */
@-moz-keyframes my-animation {
  from { -moz-transform: translateX(100%); }
  to { -moz-transform: translateX(-100%); }
}

/* for Chrome */
@-webkit-keyframes my-animation {
  from { -webkit-transform: translateX(100%); }
  to { -webkit-transform: translateX(-100%); }
}

@keyframes my-animation {
  from {
    -moz-transform: translateX(100%);
    -webkit-transform: translateX(100%);
    transform: translateX(100%);
  }
  to {
    -moz-transform: translateX(-100%);
    -webkit-transform: translateX(-100%);
    transform: translateX(-100%);
  }
}

</style>

</html>

<?PHP
require("includes/footer.php");
?>



