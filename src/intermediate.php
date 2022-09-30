<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Intermediate","");
?>


<html>
    <form>
    <label for="Intstock">Enter Stock Symbol: </label>
        <input style="width:250px; border-width:3px border-style:solid; border-color:black;" type="text" id="Intstock" name="Intstock"> 
        <label for="time-frame">Choose a time frame:</label>
        <select name="time-frame" id="time-frame">
        <option value="1 Day">day</option>
        <option value="1 Week">week</option>
        <option value="1 Month">month</option>
        <option value="1 Year">year</option>
        </select>
    </form>
</html>

<?PHP
require("includes/footer.php");
?>