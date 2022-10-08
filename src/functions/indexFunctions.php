<?PHP

function indexPrice($indexName, $indexPrice_url)
{

  $indexInfo = array();

  #color code green=0 red=1 black=2
  $index_stock_data = json_decode(file_get_contents($indexPrice_url), true);
  $index_current = $index_stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
  $index_prevClose = $index_stock_data['chart']['result'][0]['meta']['previousClose'];
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
    echo $indexName . " " . $indexInfo[1] . "<span style='color:green'> +$indexInfo[2] (+$indexInfo[3]%)</span>" . str_repeat('&nbsp', 7);
  } elseif ($indexInfo[0] == 1) {
    echo $indexName . " " . $indexInfo[1] . "<span style='color:red'> $indexInfo[2] ($indexInfo[3]%)</span>" . str_repeat('&nbsp', 7);
  } elseif ($indexInfo[0] == 2) {
    echo $indexName . " " . $indexInfo[1] . "<span style='color:black'> $indexInfo[2] ($indexInfo[3]%)</span>" . str_repeat('&nbsp', 7);
  }
}

function displayTime()
{

?>
  <script>
    function display_ct7() {
      var x = new Date()
      var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
      hours = x.getHours() % 12;
      hours = hours ? hours : 12;
      hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

      var minutes = x.getMinutes().toString()
      minutes = minutes.length == 1 ? 0 + minutes : minutes;

      var seconds = x.getSeconds().toString()
      seconds = seconds.length == 1 ? 0 + seconds : seconds;

      var month = (x.getMonth() + 1).toString();
      month = month.length == 1 ? 0 + month : month;

      var dt = x.getDate().toString();
      dt = dt.length == 1 ? 0 + dt : dt;

      var x1 = month + "/" + dt + "/" + x.getFullYear();
      x1 = x1 + " " + hours + ":" + minutes + ":" + seconds + " " + ampm;
      document.getElementById('ct7').innerHTML = x1;
      display_c7();
    }

    function display_c7() {
      var refresh = 1000; // Refresh rate in milli seconds
      mytime = setTimeout('display_ct7()', refresh)
    }
    display_c7()
  </script>
  <span id='ct7'></span>

<?PHP
}

?>