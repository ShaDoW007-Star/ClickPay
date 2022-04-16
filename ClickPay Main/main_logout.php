<?php

require ("../php/conn.php");

session_start();

session_unset();
session_destroy();

header("location:../ClickPay index/login.php");
exit;

?>