<?PHP
$path = '';
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("EC Stock Forecasters");
  ?>

  <html>
    <h4 style="text-align:center">
      <b>
      <?PHP
        date_default_timezone_set('America/New_York');
        $date = date("F d, Y h:i A\n");
        echo $date;


      ?>
      </b>
      <br><br> Welcome to the main page of the EC Stock Forecasters <br> <br>
    </h4>
    <marquee style="font-size:35pt;" behavior="scroll" direction="left" scrollamount="7">Dow <img width="20px" src="<?php echo $path; ?>images/redArrow.png">  Nasdaq <img width="20px" src="<?php echo $path; ?>images/greenArrow.png">   S&P500   Russell 2000   </marquee>
  </html>
  

<?PHP
require("includes/footer.php");
