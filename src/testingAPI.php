<?PHP
require("functions/basic_html_functions.php");
require("functions/graphingFunctions.php");
require("functions/stockNews.php");
require("functions/prediction_functions.php");
date_default_timezone_set('America/New_York');



    $stockName = 'AAPL';


    //this returns the array "url" which has a bunch of information that is used in later function calls
    $url = 'https://query1.finance.yahoo.com/v8/finance/chart/' . $stockName . '?region=US&lang=en-US&includePrePost=false&interval=1d&useYfid=true&range=5y';
    $decode = json_decode(file_get_contents($url), true);
    $numPrices = count($decode['chart']['result'][0]['indicators']['quote'][0]['close']);

    $dates = array();
    $prices = array();

    for ($i = 0; $i < $numPrices; $i++) {
        $dates[$i] = date("M j Y", $decode['chart']['result'][0]['timestamp'][$i]); #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 M/D/Y H:M:S FORMAT
        $prices[$i] =  $decode['chart']['result'][0]['indicators']['quote'][0]['close'][$i]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400
    }

    $single_prediction = array();
    $all_predictions_prices = array();
    $all_prediction_dates = array();

    $alldates = array();
    $alldates = array_merge($dates,$all_prediction_dates);

    $ogPrices = array();
    $ogPrices = $prices;


    //predicting next 5 days
    for($i=0;$i<5;$i++) {
        $single_prediction[0] = forecastHoltWinters($prices);
        $all_predictions_prices[$i] = $single_prediction[0];
        $all_prediction_dates[$i] = date('M j Y', strtotime($dates[$numPrices-1].' +'.$i.'Weekday'));

        $prices = array_merge($prices,$single_prediction);
        
        echo $all_predictions_prices[$i].' '.$all_prediction_dates[$i].'<br>';

    }    

    $alldates = array_merge($dates,$all_prediction_dates);

    $predprices = array();
    $predprices = array_merge($prices,$all_predictions_prices);

?>





    <div>
        <canvas id="stockChart" height="100px"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($alldates); ?>;

        const data = {
            labels: labels,
            datasets: [{
                label: "<?php echo $stockName; ?>",
                backgroundColor: 'rgb(0, 188, 212)',
                borderColor: 'rgb(0, 188, 212)',
                data: <?php echo json_encode($ogPrices); ?>,
            },
            {
                label: "pred",
                backgroundColor: 'rgb(160, 32, 240)',
                borderColor: 'rgb(160, 32, 240)',
                data: <?php echo json_encode($predprices); ?>,
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
