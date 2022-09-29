<?PHP
$path = '';
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("EC Stock Forecasters");
  ?>

  <html>
    <h4 style="text-align:center">
      <b>

      <script>function display_ct6() {
      var x = new Date()
      var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
      hours = x.getHours( ) % 12;
      hours = hours ? hours : 12;
      var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
      x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
      document.getElementById('ct6').innerHTML = x1;
      display_c6();
      }
      function display_c6(){
      var refresh=1000; // Refresh rate in milli seconds
      mytime=setTimeout('display_ct6()',refresh)
      }
      display_c6()
      </script>
      <span id='ct6' style="background-color: #FFFF00"></span>
      </b>
      <br><br> Welcome to the main page of the EC Stock Forecasters <br> <br>
    </h4>
    <marquee style="font-size:35pt;" behavior="scroll" direction="left" scrollamount="7">Dow <img width="20px" src="<?php echo $path; ?>images/redArrow.png">  Nasdaq <img width="20px" src="<?php echo $path; ?>images/greenArrow.png">   S&P500   Russell 2000   </marquee>
  </html>
  

<?PHP
require("includes/footer.php");
