<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-cyan w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
   <img width="225px" src="<?php echo $path; ?>images/stockslogo.png"> 
    <h3 class="w3-padding-34"><b>Menu</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="<?php echo $path; ?>index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="<?php echo $path; ?>login.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Login</a> 
    <a href="<?php echo $path; ?>beginner.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Beginner</a> 
    <a href="<?php echo $path; ?>intermediate.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Intermediate</a> 
    <a href="<?php echo $path; ?>advanced.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Advanced</a> 
    <a href="<?php echo $path; ?>about.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">About</a>
    <a href="<?php echo $path; ?>help.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Help</a>


  </div>

</nav>
<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-cyan w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-cyan w3-margin-right" onclick="w3_open()">☰</a>
  <span>EC Stock Forecasters</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

