<?php

$url = 'https://query1.finance.yahoo.com/v8/finance/chart/aapl?period1=345479400&period2=1666970299&interval=1d';
$json = json_decode(file_get_contents($url), true);
$numcloses = count($json['chart']['result'][0]['indicators']['quote'][0]['close']);

$i = 0;
$j = 0;
$allClosePrices = array();
$allDates = array();

//All close prices and dates are indexed
for ($i = 0; $i < $numcloses; $i++) {
    $allClosePrices[$i] = $json['chart']['result'][0]['indicators']['quote'][0]['close'][$i]; //if trading day is open the last value in this array is the CURRENT price, do -2 to get most recent closing price
    $allDates[$i] = date($json['chart']['result'][0]['timestamp'][$i]); //if trading day is open the last value in this array is the CURRENT date, do -2 to get previous date    
}

$SMA_50DAY = array();
$tempAvg = 0;
$SMA_50DAY_INDEX = 0;

for($e=0;$e<50;$e++){
    $SMA_50DAY[$e]=0;
}


$tempTotal = 0;



for ($j = 0; $j < $numcloses-49; $j++) {
    //This will sum and average the first 50 prices 
    for ($i = 0; $i < 50; $i++) {
        $tempTotal = $tempTotal +  $allClosePrices[$i + $j];
    }
    $tempAvg = $tempTotal / 50;
    $SMA_50DAY[$j+50] = $tempAvg ;
    $tempTotal = 0;
    
}
?>

<div>
        <canvas id="stockChart" height="100px"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = <?php echo json_encode($allDates); ?>;

        const data = {
            labels: labels,
            datasets: [{
                label: "50 DAY SMA",
                backgroundColor: 'rgb(0, 188, 212)',
                borderColor: 'rgb(0, 188, 212)',
                data: <?php echo json_encode($SMA_50DAY); ?>,
            },
            {
                label: "AAPL",
                backgroundColor: 'rgb(0, 0, 212)',
                borderColor: 'rgb(0, 0, 212)',
                data: <?php echo json_encode($allClosePrices); ?>,
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