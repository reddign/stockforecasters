<?PHP

function displayGraph($stockName = "", $dates, $prices)
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


?>