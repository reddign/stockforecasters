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
        <button onclick="search()"> Search </button>
    </form>
    <script>   
        function search() {   
            window.open("https://query1.finance.yahoo.com/v8/finance/chart/{Intstock}?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range={time-frame}");  
        }   
</script>
</html>







<?PHP
require("includes/footer.php");
?>