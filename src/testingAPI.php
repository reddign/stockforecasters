
<?php
$url = 'https://query1.finance.yahoo.com/v8/finance/chart/aapl?period1=345479400&period2=1666970299&interval=1d';
//$url = 'https://query1.finance.yahoo.com/v8/finance/chart/aapl?period1=1667443178&period2=1668033609&interval=1d';

$json = json_decode(file_get_contents($url), true);
$numcloses = count($json['chart']['result'][0]['indicators']['quote'][0]['close']);

$i = 0;
$allClosePrices = array();
$allDates = array();

//All close prices and dates are indexed
for ($i = 0; $i < $numcloses; $i++) {
    $allClosePrices[$i] = $json['chart']['result'][0]['indicators']['quote'][0]['close'][$i]; //if trading day is open the last value in this array is the CURRENT price, do -2 to get most recent closing price
    $allDates[$i] = date( "M j Y",$json['chart']['result'][0]['timestamp'][$i]); //if trading day is open the last value in this array is the CURRENT date, do -2 to get previous date    
}

$j = 0;
$h = 0;
$SMAtemp = array();
$total = 0;

for($j=0;$j<count($allClosePrices)-50;$j++){

    for($h=0;$h<50;$h++) {
        $total = $total + $allClosePrices[$h+$j];
    }
    $total = $total/50;
    $SMAtemp[$j] = $total;
    $total = 0;
    

}

$k = 0;
$tempArray = array();
for($k=0;$k<50;$k++) {
    $tempArray[$k] = null;
}
$SMA = array_merge($tempArray, $SMAtemp);
//We want past 1 month of data (30 days)
$days = 25;

$p=0;
$dates2graph = array();
$sma2graph = array();
$prices2graph = array();

$count=0;

for($p=0;$p<$days;$p++) {
    $dates2graph[$p] = $allDates[$p+($numcloses-$days)];
    $sma2graph[$p] = $SMA[$p+($numcloses-$days)];
    $prices2graph[$p] = $allClosePrices[$p+($numcloses-$days)];

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
        datasets: [
        {
            label: "sma",
            backgroundColor: 'rgb(0, 0, 44)',
            borderColor: 'rgb(0, 0, 44)',
            data: <?php echo json_encode($SMA); ?>,
        },
        {
            label: "aapl",
            backgroundColor: 'rgb(0, 255, 0)',
            borderColor: 'rgb(0, 255, 0)',
            data: <?php echo json_encode($allClosePrices); ?>,
        },
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
