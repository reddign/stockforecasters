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



/* Example of data
0. Previous Close	142.41
1. Open	145.49
2. Bid	144.94 x 900
3. Ask	145.20 x 800
4. Day's Range	140.62 - 146.70
5. 52 Week Range	129.04 - 182.94
6. Volume	99,136,610
7. Avg. Volume	81,340,645
8. Market Cap	2.31T
9. Beta (5Y Monthly)	1.25
10. PE Ratio (TTM)	23.76
11. EPS (TTM)	6.05
12. Earnings Date	Oct 26, 2022
13. Forward Dividend & Yield	0.92 (0.65%)
14. Ex-Dividend Date	Aug 05, 2022
15. 1y Target Est	183.69
*/



// $title = $html->find('title', 0);
// $title1 = $html->find("#quote-summary tbody", 1);

// //$image = $html->find('img', 0);

// echo $title->plaintext."<br>\n";
// echo $title1->plaintext."<br>\n";
// echo $image->src;

$html = file_get_html('https://www.google.com/search?q=stock+market+news&tbm=nws&source=univ&tbo=u&sa=X&ved=2ahUKEwiyxfrMiu_6AhXaEFkFHU85CcwQt8YBegQIDxAL&biw=1200&bih=823&dpr=2');
$stockDataList = $html->find('div[class="GyAeWb"]',0);
echo $stockDataList;




?>

