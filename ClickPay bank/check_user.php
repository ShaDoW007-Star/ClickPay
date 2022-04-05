<?php

session_start();
$customer_id = $_SESSION['customer_id'];

require ("../php/conn.php");

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location:login.php");
    exit;
}

$query = "SELECT * FROM `bank_acc` where customer_id = '$customer_id'";
$a = mysqli_query($con, $query);
$b = mysqli_num_rows($a);

if($b == NULL || $b ==0){
    header("Location:bank_create-account.php");
}else{
    header("Location:bank_login.php");
}

?>