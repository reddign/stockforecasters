<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Intermediate","");
?>


<html>
    <form>
    <label for="Intstock">Stock Search: </label>
        <input style="width:250px; border-width:3px border-style:solid; border-color:black;" type="text" id="Intstock" name="Intstock"> <br> <br>
    </form>
</html>

<?PHP
require("includes/footer.php");
?>