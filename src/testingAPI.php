<!-- 
<form method="get">
    <input type="submit" name="Search1" id="Search1" value="1" />
    <input type="submit" name="Search2" id="Search2" value="2" />
    <input type="submit" name="Search3" id="Search3" value="3" />
<form>

        <?PHP

        if (isset($_GET['Search1'])) {
            echo "ONE";
        }
        if (isset($_GET['Search2'])) {
            echo "TWO";
        }
        if (isset($_GET['Search3'])) {
            echo "THREE";
        }


        ?> -->
<?PHP
$ticker_array = array();
foreach (range('a', 'z') as $letter) {
    $urlStocks = "https://query1.finance.yahoo.com/v1/finance/lookup?formatted=true&lang=en-US&region=US&query='.$letter.'*&type=equity&count=3000&start=0";

    $stocksdata = json_decode(file_get_contents($urlStocks), true);
    foreach ($data['finance']['result'][0]['documents'] as $ticker) {
        $ticker_array[] = $ticker['symbol'];
        echo $i . $ticker['shortName']." - ".$ticker['symbol']."<br>";
    }



}

foreach (range('a', 'z') as $letter) {
    $urlETFS = "https://query1.finance.yahoo.com/v1/finance/lookup?formatted=true&lang=en-US&region=US&query='.$letter.'&type=etf&count=3000&start=0";

    $etfsdata = json_decode(file_get_contents($urlETFS), true);
    foreach ($data['finance']['result'][0]['documents'] as $ticker) {
        $ticker_array[] = $ticker['symbol'];
        echo $i . $ticker['shortName']." - ".$ticker['symbol']."<br>";
    }



}



?>