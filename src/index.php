<?PHP
$path = '';
require("functions/basic_html_functions.php");
require("includes/header.php");
display_small_page_heading("EC Stock Forecasters");
  ?>

  <html>
    <h4 style="text-align:center">
      <b>

      <script>function display_ct7() {
        var x = new Date()
        var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
        hours = x.getHours( ) % 12;
        hours = hours ? hours : 12;
        hours=hours.toString().length==1? 0+hours.toString() : hours;

        var minutes=x.getMinutes().toString()
        minutes=minutes.length==1 ? 0+minutes : minutes;

        var seconds=x.getSeconds().toString()
        seconds=seconds.length==1 ? 0+seconds : seconds;

        var month=(x.getMonth() +1).toString();
        month=month.length==1 ? 0+month : month;

        var dt=x.getDate().toString();
        dt=dt.length==1 ? 0+dt : dt;

        var x1=month + "/" + dt + "/" + x.getFullYear(); 
        x1 = x1 + " " +  hours + ":" +  minutes + ":" +  seconds + " " + ampm;
        document.getElementById('ct7').innerHTML = x1;
        display_c7();
        }
        function display_c7(){
        var refresh=1000; // Refresh rate in milli seconds
        mytime=setTimeout('display_ct7()',refresh)
        }
        display_c7()
      </script>
      <span id='ct7'></span>

      </b>
      <br><br> Welcome to the main page of the EC Stock Forecasters <br> <br>
    </h4>
    
    <marquee style="font-size:35pt;" behavior="scroll" direction="left" scrollamount="7">Dow <img width="20px" src="<?php echo $path; ?>images/redArrow.png">  Nasdaq <img width="20px" src="<?php echo $path; ?>images/greenArrow.png">   S&P500   Russell 2000   </marquee>

    <h2> News </h2>


  </html>
  

<?PHP
require("includes/footer.php");
