<?php

require("../php/conn.php");

session_start();

$customer_id = $_SESSION['customer_id'];


if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location:login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];

    $sql = "INSERT INTO `feedback` (`customer_id`,`name`,`email`,`msg`) VALUES ('$customer_id','$name','$email','$msg');";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script>alert('Your Feedback is Successfully Delivered')</script>";
    } else {
        echo "<script>alert('Your Feedback is Not Delivered')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClickPay Home</title>
    <link rel="stylesheet" href="../css/ClickPay main css/home.css">
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
                        <li style="color: rgba(0, 0, 255, 0.616);">Home</li>
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
                        <li>Profile</li>
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
        <section class="sec">
            <div class="sec1_1">
                <div class="txt">
                    <p>You Should Create ClickPay-Bank <br> Account</p>
                    <span>Click Here To Redirect ClickPay-Bank</span><br>
                    <a href="../ClickPay bank/check_user.php">
                        <button class="b1">ClickPay-Bank</button>
                    </a>
                    <a href="main_logout.php">
                        <button class="b2">Log-out</button>
                    </a>
                </div>
            </div>
            <div class="sec1_2">
                <img src="../img/bg_image_1.png" alt="" height="350px" width="400px">
            </div>
        </section>
        <section class="sec2">
            <div class="sec2_1">
                <img src="../img/bg_image_3.png" alt="">
            </div>
            <div class="txt1">
                <p>We're ready to Serve you with best</p>
                <span>Ignite the most powerfull growth engine you have ever <br> built for your company</span>
            </div>
        </section>
        <section class="sec3">
            <div class="txt2">
                <p>We're Dynamic Team of Creatives People</p>
                <span>We provide marketing services to startups & small business to looking for partner for their
                    digital media, design & dev lead generation & communication.</span>
            </div>
            <div class="sec3_1">
                <img src="../img/bg_image_2.png" alt="">
            </div>
        </section>
        <section class="sec4">

            <div class="page-section" id="contact">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 py-3 wow fadeInUp">
                            <img src="../img/instant.png" alt="" height="400px" width="400px">
                        </div>
                        <div class="col-lg-6 py-3 wow fadeInUp">
                            <div class="subhead" style="font-size: 1.5rem; margin: 1.5rem 0; color: rgba(0, 0, 255, 0.616);">Contact Us</div>
                            <h2 class="title-section">Drop Us a Line</h2>
                            <div class="divider"></div>

                            <form action="main_home.php" id="#contact" method="POST">
                                <div class="py-2">
                                    <input type="text" class="form-control" name="name" placeholder="Full name" required>
                                </div>
                                <div class="py-2">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="py-2">
                                    <textarea rows="6" class="form-control" name="msg" placeholder="Enter message" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill mt-4" style="margin-bottom: 2rem;">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <footer class="page-footer">
        <div class="p">
            <div class="p1">
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
                                    <a href="#contact">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p2">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>