<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Create Account","");
?>

<html>
    <h4> Crete an account to save stocks to a watchlist! <br> <br>
    <form> 
        <label for="username">Username: </label>
        <input type="text" id="username" name="username"> <br> <br>
        <label for="lname">Password: </label>
        <input type="text" id="password" name="password"> <br> <br>
    </form>
    <button type="button"> Create </button> <br> <br> <br> <br>
    
    </h4>

</html>
 
<?PHP
require("includes/footer.php");
?>