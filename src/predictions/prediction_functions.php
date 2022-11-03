<?PHP
require("functions/simple_html_dom.php");

function displaySMA($stockName = "", $dates, $prices, $prevClose)
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

function ComputeSMA($data, $window_size)
{
?>
    <script>
        data = <?PHP echo $data ?>
        window_size = <?PHP echo $window_size ?>
        let r_avgs = [],
            avg_prev = 0;
        for (let i = 0; i <= data.length - window_size; i++) {
            let curr_avg = 0.00,
                t = i + window_size;
            for (let k = i; k < t && k <= data.length; k++) {
                curr_avg += data[k]['price'] / window_size;
            }
            r_avgs.push({
                set: data.slice(i, i + window_size),
                avg: curr_avg
            });
            avg_prev = curr_avg;
        }
        return r_avgs;
    </script>
<?PHP
}
