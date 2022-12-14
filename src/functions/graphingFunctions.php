<?PHP
require("functions/simple_html_dom.php");

function displayGraph($stockName = "", $dates, $prices, $prevClose)
{

    displayName($stockName, $dates, $prices, $prevClose);
?>
    <html>

    <div>
        <canvas id="stockChart" height="100px"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($dates); ?>;

        const data = {
            labels: labels,
            datasets: [{
                label: "<?php echo $stockName; ?>",
                backgroundColor: 'rgb(0, 188, 212)',
                borderColor: 'rgb(0, 188, 212)',
                data: <?php echo json_encode($prices); ?>,
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
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };
        const myChart = new Chart(
            document.getElementById('stockChart'),
            config
        );
    </script>

    </html>

<?PHP

}

function displayGraphwSMA($stockName = "", $dates, $prices, $prevClose)
{

    displayName($stockName, $dates, $prices, $prevClose);

    $SMA = SMA50DAY($prices);
?>
    <html>

    <div>
        <canvas id="stockChart" height="100px"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($dates); ?>;

        const data = {
            labels: labels,
            datasets: [{
                    label: "<?php echo $stockName; ?>",
                    backgroundColor: 'rgb(0, 188, 212)',
                    borderColor: 'rgb(0, 188, 212)',
                    data: <?php echo json_encode($prices); ?>,
                },
                {
                    label: "50 Day SMA",
                    backgroundColor: 'rgb(160, 32, 240)',
                    borderColor: 'rgb(160, 32, 240)',
                    data: <?php echo json_encode($SMA); ?>,
                }
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };
        const myChart = new Chart(
            document.getElementById('stockChart'),
            config
        );
    </script>

    </html>

<?PHP

}

function timeInterval($stockName, $time)
{
    $url = array();

    switch ($time) {
        case "1d": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=5m&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "h:iA";
                break;
            }
        case "5d": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=30m&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "M j h:iA";
                break;
            }
        case "1mo": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "M j";
                break;
            }
        case "3mo": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "M j";
                break;
            }
        case "6mo": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "M j";
                break;
            }
        case "1y": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "M j";
                break;
            }
        case "2y": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "M j Y";
                break;
            }
        case "5y": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1wk&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "M j Y";
                break;
            }
        case "10y": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1wk&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "M j Y";
                break;
            }
        case "ytd": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "M j Y";
                break;
            }
        case "max": {
                $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1mo&useYfid=true&range=' . $time;
                $url[3] = json_decode(file_get_contents($url[0]), true);
                $url[1] = count($url[3]['chart']['result'][0]['indicators']['quote'][0]['close']);
                $url[2] = "M j Y";
                break;
            }
    }

    return $url;
}


function displayName($stockName = "", $dates, $prices, $prevClose)
{
    $indexInfo = array();

    #color code green=0 red=1 black=2
    $index_current = $prices[count($prices) - 1];
    $index_prevClose = $prevClose;
    $index_diff = $index_current - $index_prevClose;
    $index_diffPercent = (($index_current - $index_prevClose) / $index_prevClose) * 100;

    if ($index_diff > 0) {
        $index_color = 0;
    } else if ($index_diff < 0) {
        $index_color = 1;
    } else {
        $index_color = 2;
    }


    $indexInfo[0] = $index_color;
    $indexInfo[1] = number_format($index_current, 2);
    $indexInfo[2] = number_format($index_diff, 2);
    $indexInfo[3] = number_format($index_diffPercent, 2);

?>

    <html>
    <p style="text-align:center;">

        <?PHP
        if ($indexInfo[0] == 0) {
            echo $stockName . " " . $indexInfo[1] . "<span style='color:green'> +$indexInfo[2] ($indexInfo[3]%)</span>" . " Range: " . $dates[0] . " - " . $dates[count($dates) - 1] . str_repeat('&nbsp', 7);
        } elseif ($indexInfo[0] == 1) {
            echo $stockName . " " . $indexInfo[1] . "<span style='color:red'> $indexInfo[2] ($indexInfo[3]%)</span>" . " Range: " . $dates[0] . " - " . $dates[count($dates) - 1] . str_repeat('&nbsp', 7);
        } elseif ($indexInfo[0] == 2) {
            echo $stockName . " " . $indexInfo[1] . "<span style='color:black'> $indexInfo[2] ($indexInfo[3]%)</span>" . " Range: " . $dates[0] . " - " . $dates[count($dates) - 1] . str_repeat('&nbsp', 7);
        }
        ?>
    </p>

    </html>
<?PHP
}

function displayGraphmultiple($stockName = "", $dates, $prices, $prevClose, $stockName1 = "", $dates1, $prices1, $prevClose1)
{

    displayName($stockName, $dates, $prices, $prevClose);
    displayName($stockName1, $dates1, $prices1, $prevClose1);

?>



    <div style="height: 45%; width: 45%;display:inline-block;">
        <canvas id="stockChart"></canvas>
    </div>
    <div style="height: 10%; width: 45%;margin-left:5%;display:inline-block;">
        <canvas id="stockChart1"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($dates); ?>;
        const labels1 = <?php echo json_encode($dates1); ?>;

        const data = {
            labels: labels,
            datasets: [{
                label: "<?php echo $stockName; ?>",
                backgroundColor: 'rgb(0, 188, 212)',
                borderColor: 'rgb(0, 188, 212)',
                data: <?php echo json_encode($prices); ?>,
            }]
        };
        const data1 = {
            labels: labels1,
            datasets: [{
                label: "<?php echo $stockName1; ?>",
                backgroundColor: 'rgb(47, 82, 143)',
                borderColor: 'rgb(47, 82, 143)',
                data: <?php echo json_encode($prices1); ?>,
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
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };

        const config1 = {
            type: 'line',
            data: data1,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };

        const myChart = new Chart(
            document.getElementById('stockChart'),
            config
        );
        const myChart1 = new Chart(
            document.getElementById('stockChart1'),
            config1
        );
    </script>


<?PHP

}


function displayGraphmultiplewSMA($stockName = "", $dates, $prices, $prevClose, $stockName1 = "", $dates1, $prices1, $prevClose1)
{

    displayName($stockName, $dates, $prices, $prevClose);
    displayName($stockName1, $dates1, $prices1, $prevClose1);

    $SMA = SMA50DAY($prices);
    $SMA1 = SMA50DAY($prices1);

?>



    <div style="height: 45%; width: 45%;display:inline-block;">
        <canvas id="stockChart"></canvas>
    </div>
    <div style="height: 10%; width: 45%;margin-left:5%;display:inline-block;">
        <canvas id="stockChart1"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($dates); ?>;
        const labels1 = <?php echo json_encode($dates1); ?>;

        const data = {
            labels: labels,
            datasets: [{
                    label: "<?php echo $stockName; ?>",
                    backgroundColor: 'rgb(0, 188, 212)',
                    borderColor: 'rgb(0, 188, 212)',
                    data: <?php echo json_encode($prices); ?>,
                },
                {
                    label: "<?php echo $stockName . " 50 Day SMA"; ?>",
                    backgroundColor: 'rgb(160, 32, 240)',
                    borderColor: 'rgb(160, 32, 240)',
                    data: <?php echo json_encode($SMA); ?>,
                }
            ]
        };
        const data1 = {
            labels: labels1,
            datasets: [{
                    label: "<?php echo $stockName1; ?>",
                    backgroundColor: 'rgb(47, 82, 143)',
                    borderColor: 'rgb(47, 82, 143)',
                    data: <?php echo json_encode($prices1); ?>,
                },
                {
                    label: "<?php echo $stockName1 . " 50 Day SMA"; ?>",
                    backgroundColor: 'rgb(160, 32, 240)',
                    borderColor: 'rgb(160, 32, 240)',
                    data: <?php echo json_encode($SMA1); ?>,
                }
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };

        const config1 = {
            type: 'line',
            data: data1,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };

        const myChart = new Chart(
            document.getElementById('stockChart'),
            config
        );
        const myChart1 = new Chart(
            document.getElementById('stockChart1'),
            config1
        );
    </script>


<?PHP

}

function displayStockData($stockName)
{

    $html = file_get_html('https://finance.yahoo.com/quote/' . $stockName);

    //This gets rest of stock data like PE, do not print index 12 and 14
    for ($i = 0; $i < 16; $i++) {
        // if($i==12 || $i==14) continue;
        $stockDataList = $html->find('td[class="Ta(end) Fw(600) Lh(14px)"]', $i);
        $stockDataListName = $html->find('td[class="C($primaryColor) W(51%)"]', $i);
        echo $stockDataListName . ": " . $stockDataList . "<br>";
        if ($i == 7) echo "<br>";
    }
    echo "<br>";
}

function SMA50DAY($allClosePrices)
{
    $j = 0;
    $h = 0;
    $SMAtemp = array();
    $total = 0;

    for ($j = 0; $j < count($allClosePrices) - 50; $j++) {
        for ($h = 0; $h < 50; $h++) {
            $total = $total + $allClosePrices[$h + $j];
        }
        $total = $total / 50;
        $SMAtemp[$j] = $total;
        $total = 0;
    }

    $k = 0;
    $tempArray = array();
    for ($k = 0; $k < 50; $k++) {
        $tempArray[$k] = null;
    }

    $SMA = array_merge($tempArray, $SMAtemp);
    return $SMA;
}

function getPredictionPrices($stockName = "")
{

    //ONLY return array of 5 prices
    $url = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=5y';
    $decode = json_decode(file_get_contents($url), true);
    $numPrices = count($decode['chart']['result'][0]['indicators']['quote'][0]['close']);

    $dates = array();
    $prices = array();

    for ($i = 0; $i < $numPrices; $i++) {
        $dates[$i] = date("M j Y", $decode['chart']['result'][0]['timestamp'][$i]); #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 M/D/Y H:M:S FORMAT
        $prices[$i] =  $decode['chart']['result'][0]['indicators']['quote'][0]['close'][$i]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400
    }


    $all_predictions_prices = array();
    $single_prediction = array();

    for ($i = 0; $i < 5; $i++) {
        $single_prediction[0] = forecastHoltWinters($prices);
        $all_predictions_prices[$i] = $single_prediction[0];
        $prices = array_merge($prices, $single_prediction);
    }

    return $all_predictions_prices;
}

function getPredictionDates()
{

    //ONLY return array of 5 dates
    $all_prediction_dates = array();
    for ($i = 0; $i < 5; $i++) {
        $all_prediction_dates[$i] = date('M j Y', strtotime(' +' . $i . 'Weekday'));
    }
    return $all_prediction_dates;
}


function displayGraphwPrediction($stockName = "", $dates, $prices, $prevClose)
{

    $prediction_dates = getPredictionDates();
    $prediction_prices = getPredictionPrices($stockName);
    $allDates = array_merge($dates, $prediction_dates);

    $k = 0;
    $tempArray = array();
    for ($k = 0; $k < count($prices); $k++) {
        $tempArray[$k] = null;
    }

    $prediction_prices = array_merge($tempArray, $prediction_prices);

    displayName($stockName, $dates, $prices, $prevClose);

?>
    <html>

    <div>
        <canvas id="stockChart" height="100px"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($allDates); ?>;

        const data = {
            labels: labels,
            datasets: [{
                    label: "<?php echo $stockName; ?>",
                    backgroundColor: 'rgb(0, 188, 212)',
                    borderColor: 'rgb(0, 188, 212)',
                    data: <?php echo json_encode($prices); ?>,
                },
                {
                    label: "<?php echo $stockName; ?> 5 Day Prediction",
                    backgroundColor: 'rgb(245, 121, 5)',
                    borderColor: 'rgb(245, 121, 5)',
                    data: <?php echo json_encode($prediction_prices); ?>,
                }
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };
        const myChart = new Chart(
            document.getElementById('stockChart'),
            config
        );
    </script>

    </html>

<?PHP

}



function displayGraphmultiplewPredictions($stockName = "", $dates, $prices, $prevClose, $stockName1 = "", $dates1, $prices1, $prevClose1)
{

    //stock
    $prediction_dates = getPredictionDates();
    $prediction_prices = getPredictionPrices($stockName);

    $allDates = array_merge($dates, $prediction_dates);

    $k = 0;
    $tempArray = array();
    for ($k = 0; $k < count($prices); $k++) {
        $tempArray[$k] = null;
    }

    $prediction_prices = array_merge($tempArray, $prediction_prices);


    //stock 1
    $prediction_prices1 = getPredictionPrices($stockName1);
    $prediction_prices1 = array_merge($tempArray, $prediction_prices1);

    displayName($stockName, $dates, $prices, $prevClose);
    displayName($stockName1, $dates1, $prices1, $prevClose1);

?>



    <div style="height: 45%; width: 45%;display:inline-block;">
        <canvas id="stockChart"></canvas>
    </div>
    <div style="height: 10%; width: 45%;margin-left:5%;display:inline-block;">
        <canvas id="stockChart1"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($allDates); ?>;
        const labels1 = <?php echo json_encode($allDates); ?>;

        const data = {
            labels: labels,
            datasets: [{
                    label: "<?php echo $stockName; ?>",
                    backgroundColor: 'rgb(0, 188, 212)',
                    borderColor: 'rgb(0, 188, 212)',
                    data: <?php echo json_encode($prices); ?>,
                },
                {
                    label: "<?php echo $stockName; ?> 5 Day Prediction",
                    backgroundColor: 'rgb(245, 121, 5)',
                    borderColor: 'rgb(245, 121, 5)',
                    data: <?php echo json_encode($prediction_prices); ?>,
                }
            ]
        };
        const data1 = {
            labels: labels1,
            datasets: [{
                    label: "<?php echo $stockName1; ?>",
                    backgroundColor: 'rgb(47, 82, 143)',
                    borderColor: 'rgb(47, 82, 143)',
                    data: <?php echo json_encode($prices1); ?>,
                },
                {
                    label: "<?php echo $stockName1; ?> 5 Day Prediction",
                    backgroundColor: 'rgb(245, 121, 5)',
                    borderColor: 'rgb(245, 121, 5)',
                    data: <?php echo json_encode($prediction_prices1); ?>,
                }
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };

        const config1 = {
            type: 'line',
            data: data1,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };

        const myChart = new Chart(
            document.getElementById('stockChart'),
            config
        );
        const myChart1 = new Chart(
            document.getElementById('stockChart1'),
            config1
        );
    </script>


<?PHP

}

function displayGraphwSMA_Predictions($stockName = "", $dates, $prices, $prevClose)
{
    $prediction_dates = getPredictionDates();
    $prediction_prices = getPredictionPrices($stockName);
    $allDates = array_merge($dates, $prediction_dates);

    $k = 0;
    $tempArray = array();
    for ($k = 0; $k < count($prices); $k++) {
        $tempArray[$k] = null;
    }

    $prediction_prices = array_merge($tempArray, $prediction_prices);

    displayName($stockName, $dates, $prices, $prevClose);

    $SMA = SMA50DAY($prices);
?>
    <html>

    <div>
        <canvas id="stockChart" height="100px"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($allDates); ?>;

        const data = {
            labels: labels,
            datasets: [{
                    label: "<?php echo $stockName; ?>",
                    backgroundColor: 'rgb(0, 188, 212)',
                    borderColor: 'rgb(0, 188, 212)',
                    data: <?php echo json_encode($prices); ?>,
                },
                {
                    label: "50 Day SMA",
                    backgroundColor: 'rgb(160, 32, 240)',
                    borderColor: 'rgb(160, 32, 240)',
                    data: <?php echo json_encode($SMA); ?>,
                },
                {
                    label: "<?php echo $stockName; ?> 5 Day Prediction",
                    backgroundColor: 'rgb(245, 121, 5)',
                    borderColor: 'rgb(245, 121, 5)',
                    data: <?php echo json_encode($prediction_prices); ?>,
                }

            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };
        const myChart = new Chart(
            document.getElementById('stockChart'),
            config
        );
    </script>

    </html>

<?PHP

}
function displayGraphmultiplewSMA_Predictions($stockName = "", $dates, $prices, $prevClose, $stockName1 = "", $dates1, $prices1, $prevClose1)
{

    //stock
    $prediction_dates = getPredictionDates();
    $prediction_prices = getPredictionPrices($stockName);

    $allDates = array_merge($dates, $prediction_dates);

    $k = 0;
    $tempArray = array();
    for ($k = 0; $k < count($prices); $k++) {
        $tempArray[$k] = null;
    }

    $prediction_prices = array_merge($tempArray, $prediction_prices);


    //stock 1
    $prediction_prices1 = getPredictionPrices($stockName1);
    $prediction_prices1 = array_merge($tempArray, $prediction_prices1);

    displayName($stockName, $dates, $prices, $prevClose);
    displayName($stockName1, $dates1, $prices1, $prevClose1);

    $SMA = SMA50DAY($prices);
    $SMA1 = SMA50DAY($prices1);

?>



    <div style="height: 45%; width: 45%;display:inline-block;">
        <canvas id="stockChart"></canvas>
    </div>
    <div style="height: 10%; width: 45%;margin-left:5%;display:inline-block;">
        <canvas id="stockChart1"></canvas>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($allDates); ?>;
        const labels1 = <?php echo json_encode($allDates); ?>;

        const data = {
            labels: labels,
            datasets: [{
                    label: "<?php echo $stockName; ?>",
                    backgroundColor: 'rgb(0, 188, 212)',
                    borderColor: 'rgb(0, 188, 212)',
                    data: <?php echo json_encode($prices); ?>,
                },
                {
                    label: "50 Day SMA",
                    backgroundColor: 'rgb(160, 32, 240)',
                    borderColor: 'rgb(160, 32, 240)',
                    data: <?php echo json_encode($SMA); ?>,
                },
                {
                    label: "<?php echo $stockName; ?> 5 Day Prediction",
                    backgroundColor: 'rgb(245, 121, 5)',
                    borderColor: 'rgb(245, 121, 5)',
                    data: <?php echo json_encode($prediction_prices); ?>,
                }
            ]
        };
        const data1 = {
            labels: labels1,
            datasets: [{
                    label: "<?php echo $stockName1; ?>",
                    backgroundColor: 'rgb(0, 188, 212)',
                    borderColor: 'rgb(0, 188, 212)',
                    data: <?php echo json_encode($prices1); ?>,
                },
                {
                    label: "50 Day SMA",
                    backgroundColor: 'rgb(160, 32, 240)',
                    borderColor: 'rgb(160, 32, 240)',
                    data: <?php echo json_encode($SMA1); ?>,
                },
                {
                    label: "<?php echo $stockName; ?> 5 Day Prediction",
                    backgroundColor: 'rgb(245, 121, 5)',
                    borderColor: 'rgb(245, 121, 5)',
                    data: <?php echo json_encode($prediction_prices1); ?>,
                }
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };

        const config1 = {
            type: 'line',
            data: data1,
            options: {
                plugins: {
                    legend: {
                        display: true
                    }
                },
                elements: {
                    point: {
                        radius: 0
                    }
                },

                hover: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        ticks: {
                            display: false
                        },
                        grid: {
                            display: false
                        }
                    }
                }

            }
        };

        const myChart = new Chart(
            document.getElementById('stockChart'),
            config
        );
        const myChart1 = new Chart(
            document.getElementById('stockChart1'),
            config1
        );
    </script>


<?PHP

}
