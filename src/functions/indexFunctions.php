<?PHP

require("functions/simple_html_dom.php");

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

function displayMarketNews()
{
  $html = file_get_html('https://finance.yahoo.com');

  //[0] = main story [1] = sub story 1 [1] = sub story 2 [2] = sub story 3
  $allStoryURL = array();

  $mainStoryTitle = $html->find('h2[class=Fz(22px)--md1100 Lh(25px)--md1100 Fw(b) Tsh($ntkTextShadow) Td(u):h Fz(25px) Lh(31px)]', 0);
  $mainStoryURL = $html->find('div[class="Pos(a) B(0) Start(0) End(0) Bg($ntkLeadGradient) Pstart(25px) Pstart(18px)--md1100 Pt(50px) Pend(45px) Pend(25px)--md1100 Bdrsbend(2px) Bdrsbstart(2px)"]', 0);
  $mainStoryPicture = $html->find('img[class=W(100%) Trs($ntkLeadImgFilterTrans) dustyImage:h_Op(0.9) dustyImage:h_Fill(ntkImgFilterHover) Fill(ntkLeadImgFilter) Bdrs(2px)]', 0);
  $mainStoryDescription = $html->find('p[class=Fz(12px) Fw(n) Lh(14px) LineClamp(3,42px) Pt(6px) Tov(e)]', 0);
  $mainStorySource = $html->find('p[class=Fz(12px) LineClamp(2,34px) Pt(6px) Pb(22px)]', 0);

  //echo $link1; This prints article title, picture, with hyperlink prob wont use this

  //This gets links for main story
  foreach ($mainStoryURL->find('a') as $element)
    $allStoryURL[0] = $element->href;


  //This gets links for all sub stories
  $j = 1;
  $subStoryURL = $html->find('div[class=Mstart(67%)]', 0);
  foreach ($subStoryURL->find('a') as $element) {
    $allStoryURL[$j++] = $element->href;
  }

?>
  <div style="column-count: 2;">
 

    <a style="text-decoration:line;" ; href=<?PHP echo $allStoryURL[0]; ?> target="_blank">

      <?PHP echo $mainStoryTitle->plaintext . "<br>"; ?>

      <div style="font-size: 10px;"> <?PHP echo $mainStoryDescription . $mainStorySource; ?> </div>
      <img src="<?PHP echo $mainStoryPicture->src; ?>" height="313px" width="561px">


      </html>

      <?PHP
      //This gets all article titles and pictures
      //echo "<br>";
      for ($i = 0; $i < 3; $i++) {
        $subStoryTitle = $html->find('h3[class=Fz(14px)--md1100 Lh(16px)--md1100 Fw(700) Fz(16px) Lh(18px) LineClamp(3,54px) Va(m) Tov(e)]', $i);
        $subStoryPicture = $html->find('img[class=W(33%) D(ib) Mend(16px) Mend(12px)--md1100 Fl(start) Bdrs(2px) Trs($ntkLeadImgFilterTrans) dustyImage:h_Op(0.9) dustyImage:h_Fill(ntkImgFilterHover) Fill(ntkLeadImgFilter)]', $i);
        $subStorySource = $html->find('p[class=Fz(11px) C($tertiaryColor) Mt(3px)]', $i);


      ?>
        <html>
        <a style="text-decoration:line;" ; href=<?PHP echo $allStoryURL[$i + 1]; ?> target="_blank">

          <?PHP echo "<br>" . $subStoryTitle->plaintext; ?>
          <div style="font-size: 10px;"> <?PHP echo $subStorySource; ?> </div>






        <?PHP

      }
        ?>
  </div>
<?PHP

  //echo $link2;  This prints article title, picture, with hyperlink. prob wont use this
}


?>