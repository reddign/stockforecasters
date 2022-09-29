<?PHP

//This file is just for testing a free api that will let us pull data from yahoo finance

$url = "https://query1.finance.yahoo.com/v8/finance/chart/AAPL?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
$stock_data = json_decode(file_get_contents($url), true);
$stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
echo $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];

?>


<html>
<head>
<title>(Type a title for your page here)</title>
<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var x = new Date()
document.getElementById('ct').innerHTML = x;
display_c();
 }
</script>
</head>

<body onload=display_ct();>
<span id='ct' ></span>

</body>
</html>