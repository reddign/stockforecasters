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
$myfile = fopen("testfile.txt", "w");

echo "start";
$ticker_array = array();
foreach (range('a', 'z') as $letter) {
    $stocksurl = "https://query1.finance.yahoo.com/v1/finance/lookup?formatted=true&lang=en-US&region=US&query=$letter*&type=equity&count=3000&start=0";
    $data = json_decode(file_get_contents($stocksurl), true);
    foreach ($data['finance']['result'][0]['documents'] as $ticker) {
        fwrite($myfile, $ticker['shortName'].",".$ticker['symbol'].",,,,,,,,"."<br>");

    }
}

foreach (range('a', 'z') as $letter) {
    $etfsurl = "https://query1.finance.yahoo.com/v1/finance/lookup?formatted=true&lang=en-US&region=US&query=$letter*&type=etf&count=3000&start=0";
    $data = json_decode(file_get_contents($etfsurl), true);
    foreach ($data['finance']['result'][0]['documents'] as $ticker) {
        fwrite($myfile, $ticker['shortName'].",".$ticker['symbol'].",,,,,,,,"."<br>");

    }
}
fclose($myfile);
echo "end"



?>


