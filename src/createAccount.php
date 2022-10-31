<?PHP
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("Create Account", "");
?>

<html>
<h5> Crete an account to save stocks to a watchlist! <br> <br>
    <form action="includes/signup.inc.php" method="post" >

        <input style="width:250px; border-width:3px border-style=solid; border-color:black;" type="text"  name="name" placeholder = "Full Name...">  <br> <br>

        <input style="width:250px; border-width:3px border-style=solid; border-color:black;" type="text"  name="email" placeholder = "Email...">      <br> <br>
      
        <input style="width:250px; border-width:3px border-style=solid; border-color:black;" type="text" name="username" placeholder = "Username..."> <br> <br>
        
        <input style="width:250px; border-width:3px border-style=solid; border-color:black; " type="password" id="password" name="password" placeholder = "Password..."> <br> <br>

        <input style="width:250px; border-width:3px border-style=solid; border-color:black; " type="password" id="passwordRepeat" name="passwordRepeat" placeholder = "Repeat Password...">
    

        <br>
        <br>

        <button type="submit" name="submit"> Create </button> <br> <br> <br> <br>

    </form>
</h5>

</html>

<?PHP
require("includes/footer.php");
?>