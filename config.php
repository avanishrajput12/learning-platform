<?php

$srvername="localhost";
$username="root";
$password="";
$database="learnx";
$conn=mysqli_connect($srvername,$username,$password,$database);
if(!$conn){
    die("Error".mysqli_connect_error());
}
