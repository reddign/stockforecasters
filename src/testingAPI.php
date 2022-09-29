<?PHP

//This file is just for testing a free api that will let us pull data from yahoo finance

$url = "https://query1.finance.yahoo.com/v8/finance/chart/AAPL?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
$stock_data = json_decode(file_get_contents($url), true);
$stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
echo $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];

?>
<script>function display() {
const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"];

var x = new Date()
var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
hours = x.getHours( ) % 12;
hours = hours ? hours : 12;
var x1=x.monthNames[x.getMonth()] + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
document.getElementById('ct6').innerHTML = x1;
display();
 }
function display(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display()',refresh)
}
display()
</script>
<span id='ct6'></span>