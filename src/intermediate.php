<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Intermediate","");
?>


<html>
    <form>
    <label for="Intstock">Enter Stock Symbol: </label>
        <input style="width:150px; border-width:3px border-style:solid; border-color:black;" type="text" id="Intstock" name="Intstock"> 
        <label for="time-frame">Choose a time frame:</label>
        <select name="time-frame" id="time-frame">
        <option value="Day">1 Day</option>
        <option value="Week">1 Week</option>
        <option value="Month">1 Month</option>
        <option value="Year">1 Year</option>
        </select>
    </form>
</html>
<?PHP

$url = "https://query1.finance.yahoo.com/v8/finance/chart/{Intstock}?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range={time-frame}";
$stock_data = json_decode(file_get_contents($url), true);
$stock_data['chart']['result'][0]['meta']['regularMarketPrice'];
echo $stock_data['chart']['result'][0]['meta']['regularMarketPrice'];

?>

<?PHP
require("includes/footer.php");
?>