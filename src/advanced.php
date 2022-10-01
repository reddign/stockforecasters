<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Advanced","");
 
?>

<html>
    <body>
    <form>
    <label for="Intstock">Enter Stock Symbol: </label>
        <input style="width:150px; border-width:3px border-style:solid; border-color:black;" type="text" id="Intstock" name="Intstock"> <br><br>
        <label for="time-frame">Choose a time frame:</label>
        <select name="time-frame" id="time-frame">
        <option value="Day">1 Day</option>
        <option value="Week">5 Days</option>
        <option value="Month">1 Month</option>
        <option value="Month">3 Months</option>
        <option value="Month">6 Months</option>
        <option value="Year">1 Year</option>
        <option value="Year">2 Years</option>
        <option value="Year">5 Years</option>
        <option value="Year">10 Years</option>
        <option value="Year">Year to Date</option>
        <option value="Year">Max</option>
        </select> <br><br>
        <button onclick="search()"> Search </button> <br><br>
    </form>
    <script>   
        function search() {   
            window.open("https://query1.finance.yahoo.com/v8/finance/chart/nvda?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d");  
        }   
    </script>
    </body>
</html>

<?PHP
require("includes/footer.php");
?>