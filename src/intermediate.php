<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
require("functions/graphingFunctions.php");
require("functions/stockNews.php");


display_small_page_heading("Intermediate", "");
date_default_timezone_set('America/New_York');
?>

<html>

<body>
    <form method="get">
        <!-- <label for="Intstock">Stock Symbol: </label> -->
        <input style="width:115px; border-width:3px border-style=solid; border-color:black;" type="text" id="Intstock" name="Intstock" placeholder="Stock Name">
        <input style="width:275px; border-width:3px border-style=solid; border-color:black;" type="text" id="Intstock1" name="Intstock1" placeholder="Optional: Second Stock Name">
        <select name="timeframe" id="timeframe">
            <option value="1d" selected hidden>1 Day</option>
            <option value="5d">5 Days</option>
            <option value="1mo">1 Month</option>
            <option value="3mo">3 Months</option>
            <option value="6mo">6 Months</option>
            <option value="1y">1 Year</option>
            <option value="2y">2 Years</option>
            <option value="5y">5 Years</option>
            <option value="10y">10 Years</option>
            <option value="ytd">Year to Date</option>
            <option value="max">Max</option>
        </select>
        <input type="submit" name="Search" id="Search" value="Search" />
    </form>

    <details>
        <summary>Read me!</summary>
        <div style="font-style: italic; font-size: 13px">
            - You can display the graph of up to two stocks. Leave the second text box exmpty if you only want to display one stock <br>
            - The 50 day SMA will be graphed by default. If you want to hide it simply click on it in the graph legend. <br>
        </div>
    </details>




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
        // displayGraph($stockName, $dates, $prices, $prevClose);
        if (strcmp($_GET['timeframe'],"1d")==0 || strcmp($_GET['timeframe'],"5d")==0 || strcmp($_GET['timeframe'],"1mo")==0 || strcmp($_GET['timeframe'],"3mo")==0){
            displayGraph($stockName, $dates, $prices, $prevClose);
        } else {
            displayGraphwSMA($stockName, $dates, $prices, $prevClose);
        }

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

        if (strcmp($_GET['timeframe'],"1d")==0 || strcmp($_GET['timeframe'],"5d")==0 || strcmp($_GET['timeframe'],"1mo")==0 || strcmp($_GET['timeframe'],"3mo")==0){
            displayGraphmultiple($stockName, $dates, $prices, $prevClose, $stockName1, $dates1, $prices1, $prevClose1);
        } else {
            displayGraphmultiplewSMA($stockName, $dates, $prices, $prevClose, $stockName1, $dates1, $prices1, $prevClose1);
        }

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

require("includes/footer.php");
?>

</html>