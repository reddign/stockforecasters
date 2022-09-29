<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Create Account","");
?>

<html>
    <h4> Crete an account to save stocks to a watchlist! <br> <br>
    <form> 
        <label for="username">Username: </label>
        <input style="width:250px; border-width:3px border-style:solid; border-color:black;" type="text" id="username" name="username"> <br> <br>
        <label for="lname">Password: </label>
        <input style="width:250px; border-width:3px border-style:solid; border-color:black;" type="password" id="password" name="password"> <br> <br>
    </form>

    <label for="level">Investor Level: </label>
    <select name="level" id="level">
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediate</option>
        <option value="Advanced">Advanced</option>
    </select> <br> <br>

    <button type="button"> Create </button> <br> <br> <br> <br>
    
    </h4>

</html>
 
<?PHP
require("includes/footer.php");
?>
