
<?php
session_start();

include "connection.php";

if(isset($_POST["login_function"])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);    
    

    $select_only_email_and_password = "SELECT id, email, password
      FROM admin WHERE email = '$email' AND password = '$password'";
      $admin_query = $conn->query($select_only_email_and_password);

      if ($admin_query->num_rows > 0){
      $row = $admin_query->fetch_assoc();

      $_SESSION['id'] = $row['id'];
      $_SESSION['email'] = $row['email'];
    

      header("location: student_dashboard.php");
}      else{ 
        echo"invalid email or Password";
    }
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: silver;">

        <div class="card">
            <h1 style="color:teal;margin-left: 500px;font-size: 30px;margin-top: 20px; text-shadow:maroon; ">STUDENT FIELD ENROLMENT</h1>
        
        </div>
        <div class="container-fluid" style="background-color:white;height: 400px;width:550px;margin-top:40px;">
        <div class="row">
        <div class ="col-md-12">
        <div class="card" style="margin-left: 20px; margin-top:30px; width:500px; height:10px;"        >
                <div class ="card header" style="background-color:teal;">
                    <h3>admin</h3>
                </div>
                <div class="card-body">
                <form method="" action="">
                </div>
                <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="enter your email">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="enter your password">
                <div class="form-group">
                    <button type="submit" name = "login_function" class="btn btn-success">login</button>
                </div>
                <br>
                <p>back <a href="index.php">home</p>

        


            
            </form> 
</body>
</html>