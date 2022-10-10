<?PHP

function displayGraph($stockName = "", $dates, $prices,$prevClose)
{

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
displayName($stockName, $dates, $prices,$prevClose);
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


function displayName($stockName = "", $dates, $prices,$prevClose)
{


    
    $indexInfo = array();

    #color code green=0 red=1 black=2
    $index_current = $prices[count($prices)-1];
    $index_prevClose = $prevClose;
    $index_diff = number_format($index_current - $index_prevClose, 2);
    $index_diffPercent = number_format((($index_current - $index_prevClose) / $index_prevClose) * 100, 2);
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
  
    if ($indexInfo[0] == 0) {
      echo $stockName . " " . $indexInfo[1] . "<span style='color:green'> +$indexInfo[2] (+$indexInfo[3]%)</span>" . str_repeat('&nbsp', 7);
    } elseif ($indexInfo[0] == 1) {
      echo $stockName . " " . $indexInfo[1] . "<span style='color:red'> $indexInfo[2] ($indexInfo[3]%)</span>" . str_repeat('&nbsp', 7);
    } elseif ($indexInfo[0] == 2) {
      echo $stockName . " " . $indexInfo[1] . "<span style='color:black'> $indexInfo[2] ($indexInfo[3]%)</span>" . str_repeat('&nbsp', 7);
    }





}


?>