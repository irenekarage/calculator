<!DOCTYPE html>
<html>
<title>My projects</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
.w3-row-padding img {margin-bottom: 12px}
/* Set the width of the sidebar to 120px */
.w3-sidebar {width: 120px;background:#acb2b1;color: #074039;}
/* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
#main {margin-left: 120px}
/* Remove margins from "page content" on small screens */
@media only screen and (max-width: 600px) {#main {margin-left: 0}}
</style>
<body style="background-color: #074039;">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="images/vcmg.png" style="width:100%">
  <a href="index.html" class="w3-bar-item w3-button w3-padding-large w3-teal">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>

  <a href="login.html" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-sign-in w3-xxlarge"></i>
    <p>LOGIN</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="login.html" class="w3-bar-item w3-button" style="width:25% !important">LOGIN</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center" id="home" style="background-color: #acb2b1;color: #074039;">
    <h1 class="w3-jumbo">MY PROJECTS</h1>
  </header>

 yuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu

  
  
    <!-- Footer -->
  <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity" style="color: white;"></i>
    <i class="fa fa-instagram w3-hover-opacity" style="color: white;"></i>
    <i class="fa fa-snapchat w3-hover-opacity" style="color: white;"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity" style="color: white;"></i>
    <i class="fa fa-twitter w3-hover-opacity" style="color: white;"></i>
    <i class="fa fa-linkedin w3-hover-opacity" style="color: white;"></i>
    <p class="w3-medium" style="color: white;">Powered by <a href="" target="_blank" class="w3-hover-text-green">MvcSofts.org</a></p>
  <!-- End footer -->
  </footer>

<!-- END PAGE CONTENT -->
</div>

</body>
</html>