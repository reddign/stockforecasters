<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
require("functions/graphingFunctions.php");
display_small_page_heading("Advanced", "");
date_default_timezone_set('America/New_York');
?>

<html>

<body>
    <form method="get">
        <label for="Intstock">Stock Symbol: </label>
        <input style="width:115px; border-width:3px border-style=solid; border-color:black;" type="text" id="Intstock" name="Intstock" placeholder="Stock Name">
        <input style="width:455px; border-width:3px border-style=solid; border-color:black;" type="text" id="Intstock1" name="Intstock1" placeholder="Optional: Stock Name, Indicator, or Prediction Line">
        <input type="submit" name="Search" id="Search" value="Search" />
        <label for="timeframe">Time frame:</label>
        <select name="timeframe" id="timeframe">
            <option value="1d"selected>1 Day</option>

        </select>
    </form>

    <details>
        <summary>Read me!</summary>
        <div style="font-style: italic; font-size: 13px">
            - You can display the graph of up to two stocks. Leave the second text box exmpty if you only want to display one stock <br>
            - If you want to graph a stock and indicator enter the indicator code in the second text box. <br>
            - Indicator codes: SMA, (more codes coming soon...) <br>
            - If you want to graph future predictions of a stock enter the future predictior code in the second text box. <br>
            - Future predictor codes: codes coming soon... <br>
            - Note: If you want to display an indicator or predicion line you can only select one stock to view
        </div>
    </details>

    <form method="get">
    <input type="submit" name="time" id="1d" value="1d" />
    <input type="submit" name="time" id="5d" value="5d" />
    <input type="submit" name="time" id="1mo" value="1mo" />
    <input type="submit" name="time" id="3mo" value="3mo" />
    <input type="submit" name="time" id="6mo" value="6mo" />
    <input type="submit" name="time" id="1y" value="1y" />
    <input type="submit" name="time" id="2y" value="2y" />
    <input type="submit" name="time" id="5y" value="5y" />
    <input type="submit" name="time" id="10y" value="10y" />
    <input type="submit" name="time" id="ytd" value="ytd" />
    <input type="submit" name="time" id="max" value="max" />
    </form>



</body>

<?PHP

if (isset($_GET['Search'])) {

    $stockName = strtoupper($_GET['Intstock']);
    //this returns the array "url" which has a bunch of information that is used in later function calls
    $url = timeInterval($_GET['Intstock'], $_GET['timeframe']);
    $url[3] = json_decode(file_get_contents($url[0]), true);

    $dates = array();
    $prices = array();

    for ($i = 0; $i < $url[1]; $i++) {
        $dates[$i] = date($url[2], $url[3]['chart']['result'][0]['timestamp'][$i]); #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 M/D/Y H:M:S FORMAT
        $prices[$i] =  $url[3]['chart']['result'][0]['indicators']['quote'][0]['close'][$i]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400
    }

    if ($url[2] == "h:iA") {
        $prevClose = $url[3]['chart']['result'][0]['meta']['chartPreviousClose'];
    } else {
        $prevClose = $url[3]['chart']['result'][0]['indicators']['quote'][0]['close'][0];
    }


    if (empty($_GET['Intstock1'])) {
        //this means there is only one stock
        displayGraph($stockName, $dates, $prices, $prevClose);
?>

        <div style="column-count: 2;">
            <?PHP displayStockData($stockName); ?>
        </div>

    <?PHP

    } else {
        //need to get data for second stock
        $stockName1 = strtoupper($_GET['Intstock1']);
        //this returns the array "url" which has a bunch of information that is used in later function calls
        $url1 = timeInterval($_GET['Intstock1'], $_GET['timeframe']);
        $url1[3] = json_decode(file_get_contents($url1[0]), true);

        $dates1 = array();
        $prices1 = array();

        for ($i = 0; $i < $url1[1]; $i++) {
            $dates1[$i] = date($url1[2], $url1[3]['chart']['result'][0]['timestamp'][$i]); #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 M/D/Y H:M:S FORMAT
            $prices1[$i] =  $url1[3]['chart']['result'][0]['indicators']['quote'][0]['close'][$i]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400
        }

        if ($url1[2] == "h:iA") {
            $prevClose1 = $url1[3]['chart']['result'][0]['meta']['chartPreviousClose'];
        } else {
            $prevClose1 = $url1[3]['chart']['result'][0]['indicators']['quote'][0]['close'][0];
        }
        //displayGraph($stockName, $dates, $prices, $prevClose);
        //displayGraph($stockName1, $dates1, $prices1, $prevClose1);
        displayGraphmultiple($stockName, $dates, $prices, $prevClose, $stockName1, $dates1, $prices1, $prevClose1);

    ?>

        <div style="column-count: 4; font-size:13px;">
            <?PHP displayStockData($stockName); ?>
            <?PHP displayStockData($stockName1); ?>
        </div>
    <?PHP

    }

    ?>

<?PHP
}

if (isset($_GET['time'])){
    echo $_GET[""]
}


require("includes/footer.php");
?>

</html>