<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Login","");
?>

<html>
    <h4> Login to your account <br> <br>
    <form> 
        <label for="username">Username: </label>
        <input type="text" id="username" name="username"> <br> <br>
        <label for="lname">Password: </label>
        <input type="text" id="password" name="password"> <br> <br>
    </form>
    <button type="button"> Login </button> <br> <br> <br> <br>

    Don't have an account yet? <br> <br>

    <a href="createAccount.php"> <button type="button"> Create one here! </button> </a>

    

    </h4>


</html>
 
<?PHP
require("includes/footer.php");
?>