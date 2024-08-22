
<?php
include("connection.php");

if(isset($_POST["insert_user_data"])){
    $name= $_POST["name"];
    $phone= $_POST["phone"];
    $course= $_POST["course"];
    $program= $_POST["program"];
    $email= $_POST["email"];
    $password=md5($_POST["password"]);
   
   
   
  
  
  $submit_students_data = "INSERT INTO student_registration (name,phone,course,program,email,password) 
  VALUES('$name', '$phone','$course','$program','$email','$password')";
  
  if (mysqli_query($conn,$submit_students_data)) {
    echo "you have successfully create an account";
  } else {
    echo "wrong  try again";
  } 
  
  

  
  }
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
        <div class="container-fluid" style="background-color:white;height: 600px;width:550px;margin-top:40px;">
        <div class="row">
        <div class ="col-md-12">
        <div class="card" style="margin-left: 20px; margin-top:30px; width:500px; height:10px;"        >
                <div class ="card header" style="background-color:teal;">
                    <h3>student registration</h3>
                </div>
                <div class="card-body">
                <form method="POST" action="">
                </div>
                <div class="form-group">
                    
                <label for="name">full name</label>
                <input type="text" name="name" class="form-control" placeholder="enter your name">
                <label for="phone">phone</label>
                <input type="text" name="phone" class="form-control" placeholder="enter your phone number">
                <label for="course">course name </label>
                <input type="text" name="course" class="form-control" placeholder="enter your course name">
                <label for="program">program</label>
                <input type="text" name="program" class="form-control" placeholder="enter your program">


                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="enter your email">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="enter your password">
                <div class="form-group">
                    <button type="submit" name="insert_user_data" class="btn btn-success">register</button>
                </div>
                <br>
                <p>back <a href="index.php">home</p>

        


            
            </form> 
</body>
</html>