<?php

session_start();

require("../php/conn.php");

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location:login.php");
    exit;
}

$customer_id = $_SESSION['customer_id'];

$query = "SELECT * FROM `signup` where customer_id = $customer_id";
$a = mysqli_query($con, $query);
$b = mysqli_num_rows($a);

if ($b > 0) {
    while ($row = mysqli_fetch_assoc($a)) {
        $fname = $row['f_name'];
        $lname = $row['l_name'];
        $cn = $row['contact'];
        $em = $row['email'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    $query3 = "SELECT * FROM `signup`";
    $a3 = mysqli_query($con, $query3);
    $b3 = mysqli_num_rows($a3);

    while ($row2 = mysqli_fetch_assoc($a3)) {
        $emm = $row2['email'];
    }
    if ($email != $emm) {
        $y = true;
    } else {
        $y = false;
    }

    if ($y) {
        $query1 = "UPDATE `signup` SET f_name='$f_name',l_name='$l_name',contact='$contact',email='$email' where customer_id = '$customer_id'";
        $a1 = mysqli_query($con, $query1);
        if ($a1) {
            echo "<script>alert('Your Data is Successfully Updated...');</script>";
            header("Refresh:0");
        } else {
            echo "<script>alert('Email Already Register...');</script>";
        }
    } else {
        echo "<script>alert('Email Already Register...');</script>";
    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="../css/ClickPay main css/profile.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #gtco-main-nav .navbar-brand {
            font-size: 36px;
            font-family: 'Lato-Black';
            text-transform: uppercase;
            background: -webkit-linear-gradient(left, #1d3ede, #01e6f8);
            background: -ms-linear-gradient(left, #1d3ede, #01e6f8);
            background: -moz-linear-gradient(left, #1d3ede, #01e6f8);
            background: -o-linear-gradient(left, #1d3ede, #01e6f8);
            background-clip: border-box;
            -webkit-background-clip: text;
            -ms-background-clip: text;
            -o-background-clip: text;
            -webkit-text-fill-color: transparent;
            -ms-text-fill-color: transparent;
            -o-text-fill-color: transparent;
        }
    </style>
</head>

<body>
    <header>
        <nav class="n">
            <div class="n1">
                <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
                    <div class="container"><a class="navbar-brand">ClickPay</a>
                    </div>
                </nav>
            </div>
            <div>
                <ul class="n2">
                    <a href="main_home.php">
                        <li>Home</li>
                    </a>
                    <a href="main_pay.php">
                        <li>Payment</li>
                    </a>
                    <a href="main_wallet.php">
                        <li>Wallet</li>
                    </a>
                    <a href="main_passbook.php">
                        <li>History</li>
                    </a>
                    <a href="main_profile.php">
                        <li style="color: rgba(0, 0, 255, 0.616);">Profile</li>
                    </a>
                </ul>
            </div>
            <div class="n3">
                <a href="#contact">
                    <a href="main_home.php">
                        <button>Welcome <?php echo $_SESSION['f_name'] . " " . $_SESSION['l_name']; ?></button>
                    </a>
                </a>
            </div>
        </nav>
    </header>
    <main>
        <section class="back">
            <img src="../img/profile-background.jpg" alt="" height="720px" width="1519px">
        </section>
        <h2 style="text-align: center; color: #01e6f8; margin-top: 1.3rem;">Your Account Info</h2>
        <form action="main_profile.php" method="post">
            <div class="form">
                <div class="form1">
                    <label for="fname">First Name</label><br>
                    <label for="lname">Last Name</label><br>
                    <label for="contact">Contact</label><br>
                    <label for="email">Email</label><br>
                </div>
                <div class="form2">
                    <input type="text" name="fname" id="fname" size="25" value="<?php echo $fname ?>" required><br>
                    <input type="text" name="lname" id="lname" value="<?php echo $lname ?>" size="25" required><br>
                    <input type="number" name="contact" id="contact" value="<?php echo $cn ?>" style="padding-right: 3.3rem;" readonly><br>
                    <input type="email" name="email" id="email" value="<?php echo $em ?>" size="25" required><br>
                </div>
            </div>
            <button class="u_btn">UPDATE DATA</button>
        </form>
    </main>
    <footer class="page-footer" style="margin-top: 13rem;">
        <div class="foot-p">
            <div class="foot-p1">
                <div class="container">
                    <div class="row mb-5">
                        <div class="foot">
                            <h3 style="font-size: 2.5rem;">Click<span class="text-primary">Pay</span></h3>
                            <p style="font-size: 1.5rem;">Visit the link if you want to unsubscribe.</p>

                            <p><a href="#">ClickPay@mail.com</a></p>
                            <p><a href="#">+00 1122 3344 5566</a></p>
                        </div>
                        <div class="row">
                            <div class="text-right">
                                <div class="foot">
                                    <a href="#">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="foot-p2">
                <div class="mainf">
                    <div class="footlogo">
                        <h3>Find Us Online</h3>
                        <a href="https://facebook.com"><img src="../img/facebook.png" alt="Facebook" id="facebook" style="height: 55px; width: 55px; margin-right: .5rem;"></a>
                        <a href="https://instagram.com"><img src="../img/instagram.png" alt="Instagram" style="height: 70px; width: 70px;"></a>
                        <a href="https://linkedin.com"><img src="../img/linkedin.png" alt="Linked-in" style="height: 70px; width: 70px;"></a>
                        <a href="https://twitter.com"><img src="../img/twitter.png" alt="Twitter" style="height: 70px; width: 70px;"></a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <p id="copyright" style="text-align: center; font-size: 1.5rem;">&copy; 2022 All rights reserved</p>
        </div>
    </footer>
</body>

</html>