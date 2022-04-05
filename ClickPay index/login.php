<?php

$x = false;
require("../php/conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM `signup` where email = '$email'";
    $a = mysqli_query($con, $query);
    $b = mysqli_num_rows($a);

    while ($row = mysqli_fetch_assoc($a)) {
        $em = $row['email'];
        $ps = $row['pass'];
        $un = $row['f_name'];
        $ln = $row['l_name'];
        $contact_all = $row['contact'];
        $cid = $row['customer_id'];
        if ($email == $em) {
            $x = true;
        } else {
            $x = false;
        }
    }

    if ($x == true) {
        if ($em == $email) {
            $result = password_verify($pass, $ps);
            if ($result) {
                session_start();
                $_SESSION['f_name'] = $un;
                $_SESSION['l_name'] = $ln;
                $_SESSION['email'] = $em;
                $_SESSION['customer_id'] = $cid;
                $_SESSION['contact'] = $contact_all;
                $_SESSION['login'] = true;
                header("Location:../ClickPay Main/main_home.php");
                exit;
            } else {
                echo "<script>alert('Password Incorrect');</script>";
            }
        } else {
            echo "<script>alert('Email Incorrect');</script>";
        }
    } else {
        echo "<script>alert('Email Not Found');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/ClickPay index css/hf.css">
    <link rel="stylesheet" href="../css/ClickPay index css/login.css">
</head>

<body onload="load()">
    <div id="loading"></div>
    <header>
        <nav class="navbar h-nav">
            <div class="container">
                <img src="../img/logo.png" alt="Logo">
                <div class="navitem v-class">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="service.php">Services</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <!-- <li><a href="contact.php">Contact Us</a></li> -->
                    </ul>
                </div>
                <div class="btn v-class">
                    <a href="signup.php"><button id="signup"><strong>Sign Up</strong></button></a>
                    <!-- <a href="login.php"><button id="Login"><strong>Login</strong></button></a> -->
                </div>
            </div>
            <div class="burger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </nav>
    </header>

    <main>
        <div class="signup">
            <div class="form">
                <h1>Login</h1>
                <form action="login.php" method="POST">
                    <div class="fl">
                        <div class="lbl">
                            <label for="uname">Username</label>
                            <br>
                            <label for="pass">Password</label>
                            <br>
                        </div>
                        <div class="inp">
                            <input type="email" name="email" id="uname" placeholder="Email" required>
                            <br>
                            <input type="password" name="pass" id="pass" placeholder="Password" required>
                            <br>
                        </div>
                    </div>
                    <button name="submit" id="submit"><strong>Submit</strong></button>
                    <button id="android" class="and"><strong>Submit</strong></button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <div class="mainf">
            <div class="footlogo">
                <h3>Find Us Online</h3>
                <!-- <hr width="125px" color="red" id="footlogo"> -->
                <a href="https://facebook.com"><img src="../img/facebook.png" alt="Facebook" id="facebook"></a>
                <a href="https://instagram.com"><img src="../img/instagram.png" alt="Instagram"></a>
                <a href="https://linkedin.com"><img src="../img/linkedin.png" alt="Linked-in"></a>
                <a href="https://twitter.com"><img src="../img/twitter.png" alt="Twitter"></a>
            </div>
        </div>
        <h4>&copy; Copyright-2022 All Rights Reserved</h4>
    </footer>
</body>
<script src="../js/hf.js"></script>

</html>