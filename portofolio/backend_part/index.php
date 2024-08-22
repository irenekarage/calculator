<?php
session_start();
include './connection/include.php';

$errorMessage = ''; // Initialize error message variable

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $password = md5($_POST['password']);

    $query = mysqli_query($connect, "SELECT * FROM `users` WHERE `uname` = '$uname' AND `password` = '$password'") or die(mysqli_connect_error());
    $fetch = mysqli_fetch_array($query);
    $row = mysqli_num_rows($query);

    if ($row > 0) {
        $_SESSION['user_id'] = $fetch['user_id'];
        $_SESSION['role'] = $fetch['role'];
        $role = $fetch['role'];

        if ($role == 'admin') {
            echo "<script>window.location='dashboard.php'</script>";
        } 
    } else {
        $errorMessage = "Wrong! invalid username or password";
    }
}

$query = "SELECT id, description FROM about ORDER BY id DESC";
$result = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html>
<title>AUTH PAGE</title>
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

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<body style="background-color: #212f3d;">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <!-- Avatar image in top left corner -->
  <img src="images/vcmg.png" style="width:100%">
  <a href="#" class="w3-bar-item w3-button w3-padding-large " style="background-color:#212f3d;color:white">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-user w3-xxlarge"></i>
    <p>ABOUT</p>
  </a>
  
  <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-envelope w3-xxlarge"></i>
    <p>CONTACT</p>
  </a>

  <a href="downloadPro.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-dashboard w3-xxlarge"></i>
    <p>PROJECTS</p>
  </a>

  <a href="mygallery.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-dashboard w3-xxlarge"></i>
    <p>MyGallery</p>
  </a>

  <a href="myevents.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-dashboard w3-xxlarge"></i>
    <p>Events</p>
  </a>



  <a onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-sign-in w3-xxlarge"></i>
    <p>LOGIN</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
    <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
    <a href="downloadPro.php" class="w3-bar-item w3-button" style="width:25% !important">MY-PROJECTS</a>
       <a href="myevents.php" class="w3-bar-item w3-button" style="width:25% !important">EVENTS</a>
          <a href="mygallery.php" class="w3-bar-item w3-button" style="width:25% !important">GALLERY</a>
    <a onclick="document.getElementById('id01').style.display='block'" class="w3-bar-item w3-button" style="width:25% !important">LOGIN</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center" id="home" style="background-color: #acb2b1;color: #074039;">
    <h1 class="w3-jumbo"><span class="w3-hide-small">I'm</span> Mudhihir Hamis Nyema.</h1>
    <p style="font-weight: bold;font-size: 16px;">Software developer.</p>
    <img src="images/vcmg.png" alt="" class="" width="800" height="600">
  </header>

  <!-- About Section -->
  <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
    <h2 class="w3-text-light-grey">MyPortofolio</h2>
    <hr style="width:200pxl;color:white" class="w3-opacity">
    <p style="color: white;"><?php
                               while ($row = mysqli_fetch_assoc($result)) {
                                  echo "<tr>";
                                  echo "<td>{$row['description']}</td>";}
                              ?></p>
                              <hr>
    <h3 class="w3-padding-16 w3-text-light-grey">My Skills</h3>
    <p class="w3-wide" style="font-weight: bold;color: white;">Mobile app development</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:95%"></div>
    </div>
    <p class="w3-wide" style="font-weight: bold;color: white;">System development</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:85%"></div>
    </div>
    <p class="w3-wide" style="font-weight: bold;color: white;">Web development</p>
    <div class="w3-white">
      <div class="w3-dark-grey" style="height:28px;width:80%"></div>
    </div><br>
    
    <div class="w3-row w3-center w3-padding-16 w3-section w3-light-grey">
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">
         <?php
                           $countv1 = mysqli_query($connect,"select project_id from my_projects") or die(mysqli_error($connect));
                                $countv1 = mysqli_num_rows($countv1);
                                    if(empty($countv1) >= 0){  ?>
                                    <?php echo $countv1;?>
                                     <?php } ?>
        +</span><br>
        Projects Done
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">5+</span><br>
        Happy Clients
      </div>
      <div class="w3-quarter w3-section">
        <span class="w3-xlarge">
          <?php
                           $countv1 = mysqli_query($connect,"select event_id from events") or die(mysqli_error($connect));
                                $countv1 = mysqli_num_rows($countv1);
                                    if(empty($countv1) >= 0){  ?>
                                    <?php echo $countv1;?>
                                     <?php } ?>
        +</span><br>
       Events
      </div>
    </div>

    <button class="w3-button w3-light-grey w3-padding-large w3-section">
      <i class="fa fa-download"></i> Download my Resume here
    </button>

     <button class="w3-button w3-light-grey w3-padding-large w3-section">
      <i class="fa fa-link"></i> <a href="https://github.com/MVC2001">Github link</a></p>
    </button>
    
   

  <!-- Contact Section -->
  <div class="w3-padding-64 w3-content w3-text-grey" id="contact">
    <h2 class="w3-text-light-grey">Contact Me</h2>
    <hr style="width:200px" class="w3-opacity">

    <div class="w3-section">
      <p style="color: white;"><i class="fa fa-map-marker fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Dar es salaam</p>
      <p style="color: white;"><i class="fa fa-phone fa-fw w3-text-white w3-xxlarge w3-margin-right"></i> Phone: +0682131140, 0782345678</p>
      <p style="color: white;"><i class="fa fa-envelope fa-fw w3-text-white w3-xxlarge w3-margin-right"> </i> Email: nyemamudhihir@mail.com</p>
    </div><br>
    <p style="color: white;">Let's get in touch. Send me a message:</p>

    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Subject" required name="Subject"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message" required name="Message"></p>
      <p>
        <button class="w3-button w3-light-grey w3-padding-large" type="submit">
          <i class="fa fa-paper-plane"></i> SEND MESSAGE
        </button>
      </p>
    </form>
  <!-- End Contact Section -->
  </div>

   <!------LOGIN FORM HERE----->
   <div id="id01" class="modal">
  <?php if (!empty($errorMessage)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $errorMessage; ?>
                                    </div>
                   <?php } ?>
    <form class="modal-content animate" action="" method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <img src="images/vcmg.png" alt="Avatar" class="avatar" style="height: 150px;width:150px ;">
      </div>
  
      <div class="container">
        <label for="uname"><b>Email</b></label>
        <input type="text" placeholder="Enter email" name="uname" required>
  
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
          
        <button type="submit" name="login" style="background-color: #212f3d;">Login</button>
      </div>
  
      <div class="container" style="background-color:#212f3d">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      </div>
    </form>
  </div>
    <!----ENDS HERE-------->
  
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


<script>
  // Get the modal
  var modal = document.getElementById('id01');
  
  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>
</body>
</html>