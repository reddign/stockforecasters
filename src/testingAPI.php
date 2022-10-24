<?PHP
require("functions/simple_html_dom.php");

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


$html = file_get_html('https://finance.yahoo.com');

//[0] = main story [1] = sub story 1 [1] = sub story 2 [2] = sub story 3
$allStoryURL = array();

$mainStoryTitle = $html->find('h2[class=Fz(22px)--md1100 Lh(25px)--md1100 Fw(b) Tsh($ntkTextShadow) Td(u):h Fz(25px) Lh(31px)]', 0);
$mainStoryURL = $html->find('div[class="Pos(a) B(0) Start(0) End(0) Bg($ntkLeadGradient) Pstart(25px) Pstart(18px)--md1100 Pt(50px) Pend(45px) Pend(25px)--md1100 Bdrsbend(2px) Bdrsbstart(2px)"]', 0);
$mainStoryPicture = $html->find('img[class=W(100%) Trs($ntkLeadImgFilterTrans) dustyImage:h_Op(0.9) dustyImage:h_Fill(ntkImgFilterHover) Fill(ntkLeadImgFilter) Bdrs(2px)]', 0);

//echo $link1; This prints article title, picture, with hyperlink prob wont use this

//This gets links for main stor
foreach ($mainStoryURL->find('a') as $element)
        $allStoryURL[0] = $element->href;


//This gets links for all sub stories
$j = 1;
$subStoryURL = $html->find('div[class=Mstart(67%)]', 0);
foreach ($subStoryURL->find('a') as $element) {
        $allStoryURL[$j++] = $element->href;
}

?>

<html>
<table>
        <a style="text-decoration:none;" ; href=<?PHP echo $allStoryURL[0]; ?>>

                <tr>
                        <td>
                                <?PHP echo $mainStoryTitle->plaintext;
                                echo "<br>";
                                ?>
                                <img src="<?PHP echo $mainStoryPicture->src; ?>" height="320px" width="570px">
                                <?PHP echo "<br>"; ?>
                        </td>

</html>

<?PHP
//This gets all article titles and pictures
echo "<br>";

$subStoryTitle = $html->find('h3[class=Fz(14px)--md1100 Lh(16px)--md1100 Fw(700) Fz(16px) Lh(18px) LineClamp(3,54px) Va(m) Tov(e)]', 0);
$subStoryPicture = $html->find('img[class=W(33%) D(ib) Mend(16px) Mend(12px)--md1100 Fl(start) Bdrs(2px) Trs($ntkLeadImgFilterTrans) dustyImage:h_Op(0.9) dustyImage:h_Fill(ntkImgFilterHover) Fill(ntkLeadImgFilter)]', 0);

$subStoryTitle = $html->find('h3[class=Fz(14px)--md1100 Lh(16px)--md1100 Fw(700) Fz(16px) Lh(18px) LineClamp(3,54px) Va(m) Tov(e)]', 1);
$subStoryPicture = $html->find('img[class=W(33%) D(ib) Mend(16px) Mend(12px)--md1100 Fl(start) Bdrs(2px) Trs($ntkLeadImgFilterTrans) dustyImage:h_Op(0.9) dustyImage:h_Fill(ntkImgFilterHover) Fill(ntkLeadImgFilter)]', 1);

$subStoryTitle = $html->find('h3[class=Fz(14px)--md1100 Lh(16px)--md1100 Fw(700) Fz(16px) Lh(18px) LineClamp(3,54px) Va(m) Tov(e)]', 2);
$subStoryPicture = $html->find('img[class=W(33%) D(ib) Mend(16px) Mend(12px)--md1100 Fl(start) Bdrs(2px) Trs($ntkLeadImgFilterTrans) dustyImage:h_Op(0.9) dustyImage:h_Fill(ntkImgFilterHover) Fill(ntkLeadImgFilter)]', 2);

$subStoryTitle = $html->find('h3[class=Fz(14px)--md1100 Lh(16px)--md1100 Fw(700) Fz(16px) Lh(18px) LineClamp(3,54px) Va(m) Tov(e)]', 3);
$subStoryPicture = $html->find('img[class=W(33%) D(ib) Mend(16px) Mend(12px)--md1100 Fl(start) Bdrs(2px) Trs($ntkLeadImgFilterTrans) dustyImage:h_Op(0.9) dustyImage:h_Fill(ntkImgFilterHover) Fill(ntkLeadImgFilter)]', 3);


?>


<html>
<td>
        <a style="text-decoration:none;" ; href=<?PHP echo $allStoryURL[1]; ?>>

                <?PHP echo $subStoryTitle->plaintext;
                echo "<br>";
                ?>
                <img src="<?PHP echo $subStoryPicture->src; ?>" height="150px" width="150px">
                <?PHP echo "<br>"; ?>
</td>
</tr>

<tr>
        <html>
        <td> </td>
        <td>
                <a style="text-decoration:none;" ; href=<?PHP echo $allStoryURL[2]; ?>>

                        <?PHP echo $subStoryTitle->plaintext;
                        echo "<br>";
                        ?>
                        <img src="<?PHP echo $subStoryPicture->src; ?>" height="150px" width="150px">
                        <?PHP echo "<br>"; ?>
        </td>

        <td> </td>
        <td>
                <html>
                <a style="text-decoration:none;" ; href=<?PHP echo $allStoryURL[3]; ?>>

                        <?PHP echo $subStoryTitle->plaintext;
                        echo "<br>";
                        ?>
                        <img src="<?PHP echo $subStoryPicture->src; ?>" height="150px" width="150px">
                        <?PHP echo "<br>"; ?>
        </td>
<tr>
        </table>

</html>

<?PHP



//echo $link2;  This prints article title, picture, with hyperlink. prob wont use this















?>
<table>
        <tr>
                <td>Name</td>
                <td> 17</td>
        </tr>
        <tr>
                <td></td>
                <td> 17</td>
        </tr>
        <tr>
                <td></td>
                <td> 17</td>
        </tr>
</table>