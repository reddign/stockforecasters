<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Login","");
?>

<html>
    <h5> Login to your account <br> <br>
    <form action = "includes/login.inc.php" method = "post"> 
        <input style="width:250px; border-width:3px border-style=solid; border-color:black;" type="text" id="username" name="username" placeholder="Username/Email..."> <br> <br>
        <input style="width:250px; border-width:3px border-style=solid; border-color:black;"  type="password" id="password" name="password" placeholder = "Password..."> <br> <br>
        <button type="submit" name="submit"> Login </button>
    </form>
    <br> <br>




    <a href="createAccount.php"> <button type="button"> Don't have an account yet? Create one here! </button> </a>

    

</h5>


</html>
 
<?PHP
require("includes/footer.php");
?>