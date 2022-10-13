<?PHP
//the below paths allow access to data from api
//this api is free to use with no request limits
//Valid intervals: 1m, 2m, 5m, 15m, 30m, 60m, 90m, 1h, 1d, 5d, 1wk, 1mo, 3mo
//Valid ranges: 1 day, 5 days, 1 month, 3 months, 6 months, 1 year, 2 years, 5 years, 10 years, YTD, Max
//6.5 hr trading day
/*Graph:    1 day use 5m   79
            5 days use 30 min   66 
            1 month use 1 day     21 use close price for prev points
            3 months use 1 day     61 use close price for prev points
            6 months use 1 day   121 use close price for prev points
            1 year use 1 day   241 use close price for prev points
            2 years use 1 day  481 use close price for prev points
            5 years use 1 week  use close price for prev points
            10 years use 1 week use close price for prev points
            YTD use 1 day use close price for prev points
            Max use 1 month use close price for prev points
            */

// echo $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
// echo "<br>";
// echo $stock_data['chart']['result'][0]['timestamp'][0];
// echo "<br>";
// echo $stock_data['chart']['result'][0]['indicators']['quote'][0]['open'][7];


   


    // echo $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
    // echo "<br>";
    // echo $stock_data['chart']['result'][0]['timestamp'][7]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 UNIX TIME FORMAT
    // echo "<br>";
    // echo date("m-d-y h:i:sA", $stock_data['chart']['result'][0]['timestamp'][7]); #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400 M/D/Y H:M:S FORMAT
    // echo "<br>";
    // echo $stock_data['chart']['result'][0]['indicators']['quote'][0]['open'][0]; #0=930 1=1030 2=1130 3=1230 4=130 5=230 6=330 7=400
    

?>