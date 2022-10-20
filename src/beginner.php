<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
require("functions/simple_html_dom.php");
display_small_page_heading("Beginner", "");

?>

<!-- Here we will add the code to look up stock ticker -->
<h2>Stock Ticker Search Tool</h2>




<form method="get">
  <label for="companylookup">Company Name: </label>
  <input style="width:140px; border-width:3px border-style=solid; border-color:black;" type="text" id="companyName" name="companyName" placeholder="Type Here">
  <input type="submit" name="Search" id="Search" value="Search" />
</form>

<?PHP
if (isset($_GET['Search'])) {
  echo "Stock Ticker: ";
}
?>

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