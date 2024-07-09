<?php
$servername="localhost";
$username="root";
$password="";
$dbname="student";

$con=msqli_connect($servername,$username,$password,$dbname);

if(!$con){
    die("connection failed".mysqli_connect_error());
}
else{
    echo "connected";
}
?>