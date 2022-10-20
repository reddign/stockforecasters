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
  $html = file_get_html('https://www.cnbc.com/search/?query='.$_GET['companyName']);
  $companyName = $html->find('span[class="SearchGroup-itemIdentifier"]', 0);

  echo "Stock Ticker: ".$companyName->plaintext;
}
?>

<html>
<h2>FAQ</h2>

<details>
  <summary>What is a stock?</summary>
  <p style="font-size:13px; font-style: italic;">- A stock is a type of investment that represents a share of ownership in a company. Investors buy stocks in the hopes that they company stock price will rise, making a profit in the long term. </p>
</details>

<details>
  <summary>How do I know what the symbol is for each stock?</summary>
  <p style="font-size:13px; font-style: italic;"> - It's easy! Just use our stock search tool above. Just type in the name of a company and the ticker symbol will appear. You can then use the stock ticker in the intermediate and advanced sections to look up more information of the stock.</p>
</details>

<details>
  <summary>What is an ETF?</summary>
  <p style="font-size:13px; font-style: italic;">- ETF, or Exchange-Traded Fund, An exchange-traded fund (ETF) is an investment instrument that comprises a basket of securities, such as stocks, bonds, derivative products, and more recently, Bitcoin futures, which can be purchased or sold in a single trade on a stock exchange.</p>
</details>

<details>
  <summary>What is the Dow Jones?</summary>
  <p style="font-size:13px; font-style: italic;">- Dow Jones is stock index and major source of financial news. Dow Jones groups 30 of the most traded stocks on the New York Stock Exchange. It is an index that helps investors determine the overall direction of stock prices. </p>
</details>

<details>
  <summary>How do I buy stocks?</summary>
  <p style="font-size:13px; font-style: italic;">- The easiest way to purchase stocks is through an online stockbroker. Open and fund an account, and then start buying!</p>
</details>

<details>
  <summary>How do I know what stocks to buy?</summary>
  <p style="font-size:13px; font-style: italic;">- Answer</p>
</details>

<details>
  <summary>How much money do I need to but stocks?</summary> 
  <p style="font-size:13px; font-style: italic;">- Very little is needed to start buying stocks! An investment of 50$ can get you started, but to see any substantial profit more money is needed.</p>
</details>  

<details>
  <summary>How long should I own a particular stock for?</summary> 
  <p style="font-size:13px; font-style: italic;">- Every stock is different, and the stock market is ever-changing. Any particular stock can go up 50$ one day, and then drop 100$ the next day. There is no set time to keep a stock, but it is recommended to sell it when a suitable profit has been achieved.</p>
</details>

<details>
  <summary>What is an 401K and IRA?</summary>
  <p style="font-size:13px; font-style: italic;">- A 401K is a retirement saving plan that has tax advantages. A percentage of each paycheck is invested directly into the account, and the employer may match part or all of the contribution. IRA's are also retirement plans, but not limited to employed people. There are many different kinds of IRA, like the popular Roth IRA. </p>
</details>


</html>

<?PHP
require("includes/footer.php");
?>