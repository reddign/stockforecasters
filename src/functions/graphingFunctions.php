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
                label: "<?php echo $stockName1;?>",
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
                label: "<?php echo $stockName." 50 Day SMA"; ?>",
                backgroundColor: 'rgb(160, 32, 240)',
                borderColor: 'rgb(160, 32, 240)',
                data: <?php echo json_encode($SMA); ?>,
            }]
        };
        const data1 = {
            labels: labels1,
            datasets: [{
                label: "<?php echo $stockName1;?>",
                backgroundColor: 'rgb(47, 82, 143)',
                borderColor: 'rgb(47, 82, 143)',
                data: <?php echo json_encode($prices1); ?>,
            },
            {
                label: "<?php echo $stockName1." 50 Day SMA"; ?>",
                backgroundColor: 'rgb(160, 32, 240)',
                borderColor: 'rgb(160, 32, 240)',
                data: <?php echo json_encode($SMA1); ?>,
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

function displayStockData($stockName)
{

    $html = file_get_html('https://finance.yahoo.com/quote/' . $stockName);

    //This gets rest of stock data like PE
    for ($i = 0; $i < 16; $i++) {
        $stockDataList = $html->find('td[class="Ta(end) Fw(600) Lh(14px)"]', $i);
        $stockDataListName = $html->find('td[class="C($primaryColor) W(51%)"]', $i);
        echo $stockDataListName . ": " . $stockDataList . "<br>";
        if ($i == 7) echo "<br>";
        // if($i==11) $i=13;
    }
    echo "<br>";
}

function SMA50DAY($allClosePrices)
{
    // $url = 'https://query1.finance.yahoo.com/v8/finance/chart/aapl?period1=345479400&period2=1666970299&interval=1d';
    // $json = json_decode(file_get_contents($url), true);
    // $numcloses = count($json['chart']['result'][0]['indicators']['quote'][0]['close']);

    // $i = 0;
    // $allClosePrices = array();
    // $allDates = array();

    // //All close prices and dates are indexed
    // for ($i = 0; $i < $numcloses; $i++) {
    //     $allClosePrices[$i] = $json['chart']['result'][0]['indicators']['quote'][0]['close'][$i]; //if trading day is open the last value in this array is the CURRENT price, do -2 to get most recent closing price
    //     $allDates[$i] = date("M j Y", $json['chart']['result'][0]['timestamp'][$i]); //if trading day is open the last value in this array is the CURRENT date, do -2 to get previous date    
    // }

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

?>