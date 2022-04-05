<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "mainproject";

$con = mysqli_connect($server, $username, $password, $database);

if($con){
    // echo "Connection Successful";
}else{
    echo "<script>alert('Connection Failed');</script>";
}

?>