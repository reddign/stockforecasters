<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Advanced", "");
date_default_timezone_set('America/New_York');
?>

<html>

<body>
    <form method="get">
        <label for="Intstock">Stock Symbol: </label>
        <input style="width:150px; border-width:3px border-style=solid; border-color:black;" type="text" id="Intstock" name="Intstock"> <br><br>
        <label for="timeframe">Time frame:</label>
        <select name="timeframe" id="timeframe">
            <option value="1d">1 Day</option>
            <option value="5d">5 Days</option>
            <option value="1m">1 Month</option>
            <option value="3m">3 Months</option>
            <option value="6m">6 Months</option>
            <option value="1y">1 Year</option>
            <option value="2y">2 Years</option>
            <option value="5y">5 Years</option>
            <option value="10y">10 Years</option>
            <option value="ytd">Year to Date</option>
            <option value="max">Max</option>
        </select> <br><br>
        <input type="submit" name="Search" id="Search" value="Search" /> <br><br>
    </form>
</body>



<?PHP

if (isset($_GET['Search'])) {
    $stockName = strtoupper($_GET['Intstock']);
    echo $stockName;
    echo "<br>";
    $url = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $_GET['Intstock'] . '?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=' . $_GET['timeframe'];
    $stock_data = json_decode(file_get_contents($url), true);
    // echo $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
    // echo "<br>";
    // echo $stock_data['chart']['result'][0]['timestamp'][7]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 UNIX TIME FORMAT
    // echo "<br>";
    // echo date("m-d-y h:i:sA", $stock_data['chart']['result'][0]['timestamp'][7]); #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 M/D/Y H:M:S FORMAT
    // echo "<br>";
    // echo $stock_data['chart']['result'][0]['indicators']['quote'][0]['open'][0]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400

    $i = 0;
    $days = 1;

    $dates = array();
    $prices = array();

    for ($i = 0; $i < 8; $i++) {
        $dates[$i] = date("h:iA", $stock_data['chart']['result'][0]['timestamp'][$i]); #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 M/D/Y H:M:S FORMAT
        //echo date("F d, Y h:i:sA", $stock_data['chart']['result'][0]['timestamp'][$i]); #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 M/D/Y H:M:S FORMAT
        //echo " $";
        $prices[$i] =  $stock_data['chart']['result'][0]['indicators']['quote'][0]['open'][$i]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400
        //echo $stock_data['chart']['result'][0]['indicators']['quote'][0]['open'][$i]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400
        //echo "<br>";
    }

    displayGraph($stockName, $dates, $prices);
?>

    <!-- <html>

    <div>
        <canvas id="stockChart" height="100px"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($dates);?>;

        const data = {
            labels: labels,
            datasets: [{
                label: "<?php echo $stockName;?>",
                backgroundColor: 'rgb(0, 188, 212)',
                borderColor: 'rgb(0, 188, 212)',
                data: <?php echo json_encode($prices);?>,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                }, elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                }

            }
        };
        const myChart = new Chart(
            document.getElementById('stockChart'),
            config
        );
    </script>



    </html> -->

<?PHP
}


require("includes/footer.php");
?>