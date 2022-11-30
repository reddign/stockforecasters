<?PHP
require("functions/basic_html_functions.php");
require("functions/graphingFunctions.php");
require("functions/stockNews.php");
require("predictions/prediction_functions.php");


display_small_page_heading("Intermediate", "");
date_default_timezone_set('America/New_York');



?>

<html>



<?PHP



    $stockName = 'AAPL';
    //this returns the array "url" which has a bunch of information that is used in later function calls
    $url = timeInterval($stockName, '5y');
    $url[3] = json_decode(file_get_contents($url[0]), true);

    $dates = array();
    $prices = array();
    $predictions = array();

    for ($i = 0; $i < $url[1]-2; $i++) {
        $dates[$i] = date($url[2], $url[3]['chart']['result'][0]['timestamp'][$i]); #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 M/D/Y H:M:S FORMAT
        $prices[$i] =  $url[3]['chart']['result'][0]['indicators']['quote'][0]['close'][$i]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400
    }

    if ($url[2] == "h:iA") {
        $prevClose = $url[3]['chart']['result'][0]['meta']['chartPreviousClose'];
    } else {
        $prevClose = $url[3]['chart']['result'][0]['indicators']['quote'][0]['close'][0];
    }


    $tempArr = array();
    $predictions = forecastHoltWinters($prices);
    $tempArr[0] = $predictions;
    $predictions2 = forecastHoltWinters(array_merge($prices,$tempArr));
    
    echo "Pred value 1 = ".$predictions." pred value 2 = ".$predictions2;

    function recursion($prices) {
      $prices = array();
      $tempArr = array();
      $predictions = forecastHoltWinters($prices);
      echo $predictions." ";
      $tempArr[0] = $predictions;
      $predictions2 = forecastHoltWinters(array_merge($prices,$tempArr));
      recursion($predictions2);
      echo $predictions2." ";

    }


    //displayGraph($stockName, $dates, $prices, $prevClose);


?>


</html>

