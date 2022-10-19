<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Beginner","");

?>


<html>
<form>
    <label for="Intstock">Enter Stock Symbol: </label>
    <input style="width:150px; border-width:3px border-style=solid; border-color:black;" type="text" id="Intstock" name="Intstock">
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
        window.open("https://query1.finance.yahoo.com/v8/finance/chart/nvda?region=US&lang=en-US&includePrePost=false&interval=1h&useYfid=true&range=1d");
    }
</script>

</html>

<html>

<h2>FAQ</h2>

<details>
  <summary>What is a stock?</summary>
  <p style="font-size:13px; font-style: italic;">- Answer</p>
</details>

<details>
  <summary>How do I know what the symbol is for each stock?</summary>
  <p style="font-size:13px; font-style: italic;"> - It's easy! Just use our stock search tool above. Just type in the name of a company and the ticker symbol will appear. You can then use the stock ticker in the intermediate and advanced sections to look up more information of the stock.</p>
</details>

<details>
  <summary>What is an ETF?</summary>
  <p style="font-size:13px; font-style: italic;">- Answer</p>
</details>

<details>
  <summary>What is the Dow Jones?</summary>
  <p style="font-size:13px; font-style: italic;">- Answer</p>
</details>

<details>
  <summary>How do I buy stocks?</summary>
  <p style="font-size:13px; font-style: italic;">- Answer</p>
</details>

<details>
  <summary>How do I know what stocks to buy?</summary>
  <p style="font-size:13px; font-style: italic;">- Answer</p>
</details>

<details>
  <summary>How much money do I need to but stocks?</summary> 
  <p style="font-size:13px; font-style: italic;">- Answer</p>
</details>  

<details>
  <summary>How long should I own a particular stock for?</summary> 
  <p style="font-size:13px; font-style: italic;">- Answer</p>
</details>

<details>
  <summary>What is an 401K and IRA?</summary>
  <p style="font-size:13px; font-style: italic;">- Answer</p>
</details>
  

</html>

<?PHP
require("includes/footer.php");
?>

