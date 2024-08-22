
<?php
include("connection.php");
session_start();
if(!isset($_SESSION['id'])){
    header("location:index.php");
    exit();
}
$email = $_SESSION['email'];
 ?>
  s
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body >
    <div class="card">
        <div class="card-header">student dashboard</div>
        <h1>welcome to dashboard</h1>
        <p>your email:<?php echo $email; ?></p>
        <a href="logout.php">logout</a>
    </div>
    
</body>
</html>