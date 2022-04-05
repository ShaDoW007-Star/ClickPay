<?php

require("../php/conn.php");

$query2 = "SELECT * FROM `signup` order by customer_id desc limit 1";
$a2 = mysqli_query($con, $query2);
$b2 = mysqli_num_rows($a2);

error_reporting(0);


while ($row2 = mysqli_fetch_assoc($a2)) {
    $z = $row2['customer_id'];
    $c_id     = $z;
}

if ($c_id == NULL) {
    $customer_id = "1001";
} else {
    $customer_id = ($c_id + 1);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    $query = "SELECT * FROM `signup`";
    $a = mysqli_query($con, $query);
    $b = mysqli_num_rows($a);

    do {
        $cn = $row['contact'];
        $em = $row['email'];

        if ($contact != $cn) {
            $x = true;
        } else {
            $x = false;
        }
        if ($email != $em) {
            $y = true;
        } else {
            $y = false;
        }
    } while ($row = mysqli_fetch_assoc($a));

    if ($x == true) {
        if ($y == true) {
            if ($cpass == $pass) {
                $hash = password_hash($pass, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `signup` (`id`,`customer_id`,`f_name`,`l_name`,`contact`,`email`,`pass`) VALUES (NULL,'$customer_id','$fname','$lname','$contact','$email','$hash');";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    echo "Insert Successfully";
                    header("Location:login.php");
                    exit;
                } else {
                    echo "<script>alert('Insert Not Submitted')</script>";
                }
            } else {
                echo "<script>alert('Password Not Matched');</script>";
            }
        } else {
            echo "<script>alert('Email Same');</script>";
        }
    } else {
        echo "<script>alert('Contact Same');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="stylesheet" href="../css/ClickPay index css/hf.css">
    <link rel="stylesheet" href="../css/ClickPay index css/signup.css">
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
                    <!-- <a href="signup.php"><button id="signup"><strong>Sign Up</strong></button></a> -->
                    <a href="login.php"><button id="login"><strong>Login</strong></button></a>
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
                <h1>Sign-Up</h1>
                <form action="signup.php" method="POST" autocomplete="off">
                    <div class="fl">
                        <div class="lbl">
                            <label for="fname">First Name</label>
                            <br>
                            <label for="lname">Last Name</label>
                            <br>
                            <label for="contact">Contact No.</label>
                            <br>
                            <label for="email">Email</label>
                            <br>
                            <label for="pass">Password</label>
                            <br>
                            <label id="cpass" for="cpass">Confirm Password</label>
                            <br>
                        </div>
                        <div class="inp">
                            <input type="text" name="fname" id="fname" placeholder="First Name" required>
                            <br>
                            <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                            <br>
                            <input type="text" name="contact" id="contact" placeholder="Contact" required>
                            <br>
                            <input type="email" name="email" id="email" placeholder="Email" required>
                            <br>
                            <input type="password" name="pass" id="pass" placeholder="Password" required>
                            <br>
                            <input type="password" name="cpass" id="cpas" placeholder="Confirm Password" required>
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