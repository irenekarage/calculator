<?php
$servername ="localhost";
$username="root";
$password ="";
$db_name="myportofio_database";


$connect = mysqli_connect($servername,$username,$password,$db_name);


if($connect != true){
    echo "wrong connection";
}



?>