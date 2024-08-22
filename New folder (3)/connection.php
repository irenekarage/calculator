<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "student_database";

$conn = mysqli_connect($servername, $username, $password, $database);

if ($conn!=true) {
echo"wrong connection";

} 
else{
    echo"connenction succesful";
}

