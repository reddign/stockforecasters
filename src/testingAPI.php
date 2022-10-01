<?PHP


$url = "https://query1.finance.yahoo.com/v8/finance/chart/AAPL?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d";
$stock_data = json_decode(file_get_contents($url), true);

echo $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
echo "<br>";
echo $stock_data['chart']['result'][0]['timestamp'][0];
echo "<br>";
echo $stock_data['chart']['result'][0]['indicators']['quote'][0]['open'][7];

?>