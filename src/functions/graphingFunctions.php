<?PHP

function displayGraph($stockName="", $dates, $prices)
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

function timeInterval($stockName,$time) {
    $url = array();

    switch($time) {
        case "1d": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=5m&useYfid=true&range=' .$time;
            $url[1] = 79;
            break;
        }
        case "5d": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=30m&useYfid=true&range=' .$time;
            $url[1] = 66;
            break;
        }
        case "1mo": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' .$time;
            $url[1] = 21;
            break;
        }
        case "3mo": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' .$time;
            $url[1] = 61;
            break;
        }
        case "6mo": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' .$time;
            $url[1] = 121;
            break;
        }
        case "1y": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' .$time;
            $url[1] = 241;
            break;
        }
        case "2y": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' .$time;
            $url[1] = 481;
            break;
        }
        case "5y": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=1wk&useYfid=true&range=' .$time;
            $url[1] = 261;
            break;
        }
        case "10y": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=1wk&useYfid=true&range=' .$time;
            $url[1] = 521;
            break;
        }
        case "ytd": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=' .$time;
            $url[1] = 66; //these both depend on the current date
            break;
        }
        case "max": {
            $url[0] = 'https://query1.finance.yahoo.com/v8/finance/chart/' .$stockName. '?region=US&lang=en-US&includePrePost=false&interval=1mo&useYfid=true&range=' .$time;
            $url[1] = 66; //these both depend on the current date
            break;
        }
    }

    return $url;
}


?>