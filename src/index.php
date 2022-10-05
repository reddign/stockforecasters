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
if($DJI_diff > 0) {


  
  $DJI_output = $DJI_current." +".$DJI_diff." (".$DJI_diffPercent."%)";
  //$DJI_color = 0;
} else if($DJI_diff < 0) {
  #<img width="20px" src="images/redArrow.png">
  $DJI_output = $DJI_current." ".$DJI_diff." (".$DJI_diffPercent."%)";
  //$DJI_color = 1;
} else {
  $DJI_output = $DJI_current." ".$DJI_diff." (".$DJI_diffPercent."%)";
  //$DJI_color = 2;
}

$NASDAQ_url = 'https://query1.finance.yahoo.com/v8/finance/chart/^IXIC?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d';
$NASDAQ_stock_data = json_decode(file_get_contents($NASDAQ_url), true);
$NASDAQ_current = $NASDAQ_stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
$NASDAQ_prevClose = $NASDAQ_stock_data['chart']['result'][0]['meta']['previousClose'];
$NASDAQ_diff = number_format($NASDAQ_current - $NASDAQ_prevClose, 2);
$NASDAQ_diffPercent = number_format((($NASDAQ_current - $NASDAQ_prevClose) / $NASDAQ_prevClose) * 100, 2);
if($NASDAQ_diff > 0) {
  $NASDAQ_output = $NASDAQ_current." +".$NASDAQ_diff." (".$NASDAQ_diffPercent."%)";
  //$NASDAQ_color = 0;
} else if($NASDAQ_diff < 0) {
  #<img width="20px" src="images/redArrow.png">
  $NASDAQ_output = $NASDAQ_current." ".$NASDAQ_diff." (".$NASDAQ_diffPercent."%)";
  //$NASDAQ_color = 1;
} else {
  $NASDAQ_output = $NASDAQ_current." ".$NASDAQ_diff." (".$NASDAQ_diffPercent."%)";
  //$NASDAQ_color = 2;
}
?>

  <html>
    <h4 style="text-align:center">
      <b>

      <script>function display_ct7() {
        var x = new Date()
        var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
        hours = x.getHours( ) % 12;
        hours = hours ? hours : 12;
        hours=hours.toString().length==1? 0+hours.toString() : hours;

        var minutes=x.getMinutes().toString()
        minutes=minutes.length==1 ? 0+minutes : minutes;

        var seconds=x.getSeconds().toString()
        seconds=seconds.length==1 ? 0+seconds : seconds;

        var month=(x.getMonth() +1).toString();
        month=month.length==1 ? 0+month : month;

        var dt=x.getDate().toString();
        dt=dt.length==1 ? 0+dt : dt;

        var x1=month + "/" + dt + "/" + x.getFullYear(); 
        x1 = x1 + " " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
        document.getElementById('ct7').innerHTML = x1;
        display_c7();
        }
        function display_c7(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct7()',refresh)
        }
        display_c7()
      </script>
      <span id='ct7'></span>

      </b>
      <br><br> Welcome to the main page of the EC Stock Forecasters <br> <br>
      </h4>


      
 
    <marquee style="font-size:35pt;" behavior="scroll" direction="left" scrollamount="7"> Dow <?php echo $DJI_current."<span style='color:green;'> +$DJI_diff ($DJI_diffPercent%)</span>"; ?> Nasdaq <?php echo $NASDAQ_output;?> S&P500 Russell 2000 </marquee>

    <h2> News </h2>

  </html>
  

<?PHP
require("includes/footer.php");

?>


