<?PHP
//the below paths allow access to data from api
//this api is free to use with no request limits
//Valid intervals: 1m, 2m, 5m, 15m, 30m, 60m, 90m, 1h, 1d, 5d, 1wk, 1mo, 3mo
//Valid ranges: 1 day, 5 days, 1 month, 3 months, 6 months, 1 year, 2 years, 5 years, 10 years, YTD, Max
/*Graph:    1 day use 5m
            5 days use 30 min
            1 month use 1 day
            3 months use 1 day
            6 months use 1 day
            1 year use 1 day
            2 years use 1 day
            5 years use 1 week
            10 years use 1 week
            YTD use 1 day
            Max use 1 month
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