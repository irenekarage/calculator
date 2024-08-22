<?php

$username=$_POST'username'];
$registration No=$_POST'$registration No'];
$schoonamel=$_POST'schoolname'];
$department=$_POST'department'];
$coursename=$_POST'coursename'];
$password=$_POST'password'];
$year=$_POST'year'];
//database connection$
$conn = new mysqli('localhost', 'root', '', 'project');
if($conn->connect_error){
    die ('connection failed :' .$conn_>connect _error);
}
else{
    $stmt = $conn->prepare("insert into sinup(username, Registration No, school name, department, course name, password, year)
    values(?, ?, ?, ?, ?, ?,?)");
    $stmt = ->blind_param(" sssssss"$username, $registration No, $schooname, $department, $coursename, $password, $year);
    $stmt->execute();
    echo"registration successfully......";
    $stmt->close();
    $conn->close();
}

?>