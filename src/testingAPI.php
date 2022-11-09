<script type="text/javascript"></script>

<?php

$url = 'https://query1.finance.yahoo.com/v8/finance/chart/aapl?period1=345479400&period2=1666970299&interval=1d';
//$url = 'https://query1.finance.yahoo.com/v8/finance/chart/aapl?period1=1636402976&period2=1666970299&interval=1d';

$json = json_decode(file_get_contents($url), true);
$numcloses = count($json['chart']['result'][0]['indicators']['quote'][0]['close']);

$i = 0;
$allClosePrices = array();
$allDates = array();

//All close prices and dates are indexed
for ($i = 0; $i < $numcloses; $i++) {
    $allClosePrices[$i] = $json['chart']['result'][0]['indicators']['quote'][0]['close'][$i]; //if trading day is open the last value in this array is the CURRENT price, do -2 to get most recent closing price
    $allDates[$i] = date($json['chart']['result'][0]['timestamp'][$i]); //if trading day is open the last value in this array is the CURRENT date, do -2 to get previous date    
}

$j = 0;
$h = 0;
$SMA = array();
$total = 0;

for($j=0;$j<count($allClosePrices)-50;$j++){

    for($h=0;$h<50;$h++) {
        $total = $total + $allClosePrices[$h];
    }
    $total = $total/50;
    echo $total. "<br>";
    $SMA[$j] = $total;
    $total = 0;

}







// $returnArray = array();
// $returnArray = ComputeSMA($allClosePrices,50);
// echo $returnArray[0];

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
            label: "average",
            backgroundColor: 'rgb(0, 0, 44)',
            borderColor: 'rgb(0, 0, 44)',
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



// function ComputeSMA($data, $window_size)
// {
 
// ?>
//     <script>
//         data = <?PHP echo $data; ?>
//         window_size = <?PHP echo $window_size; ?>

//         let r_avgs = [],
//             avg_prev = 0;
//         for (let i = 0; i <= data.length - window_size; i++) {
//             let curr_avg = 0.00,
//                 t = i + window_size;
//             for (let k = i; k < t && k <= data.length; k++) {
//                 curr_avg += data[k]['price'] / window_size;
//             }
//             r_avgs.push({
//                 set: data.slice(i, i + window_size),
//                 avg: curr_avg
//             });
//             avg_prev = curr_avg;
//         }
//         return r_avgs;
//     </script>
// <?PHP
// }
?>