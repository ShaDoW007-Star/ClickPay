<?php

require("../php/conn.php");

session_start();

$customer_id = $_SESSION['customer_id'];

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location:login.php");
    exit;
}

?>

<?php

if (!isset($_SESSION['log']) || $_SESSION['log'] != true) {
    header("location:bank_login.php");
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

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="../css/ClickPay bank css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/ClickPay bank css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/ClickPay bank css/style.css">
    <title>ClickPay-Bank</title>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
        <div class="container" style="margin-left:4rem;"><a class="navbar-brand">ClickPay-Bank</a>
            <div id="my-nav" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="bank_home.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="bank_deposit.php">Depoist</a></li>
                    <li class="nav-item"><a class="nav-link" href="bank_passbook.php">Passbook</a></li>
                    <li class="nav-item"><a class="nav-link" href="bank_profile.php">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" style="color:white; margin-left:1rem" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" style="color:white;" href="#Details">Details</a></li>
                    <li class="nav-item"><a class="nav-link" style="color:white; margin-right:3rem;" href="#contact">Contact</a></li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <a href="bank_logout.php" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase">LOGOUT</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-fluid gtco-banner-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1> We promise to bring
                        the best <span>Banking Experience</span> for
                        your business. </h1>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus turpis nisl. </p>
                    <a href="bank_deposit.php" class="submit-button">Depoist <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    <a href="bank_passbook.php" class="submit-button" style="margin-left:2rem;">View Balance <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>

                <div class="col-md-6">
                    <div class="card"><img class="card-img-top img-fluid" src="../img/banner-img.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid gtco-features" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h2> Explore The Services<br />
                        We Offer For You </h2>
                    <p> Nunc sodales lobortis arcu, sit amet venenatis erat placerat a. Donec lacinia magna nulla, cursus
                        impediet augue egestas id. Suspendisse dolor lectus, pellentesque quis tincidunt ac, dictum id
                        neque. </p>
                </div>
                <div class="col-lg-8">
                    <svg id="bg-services" width="100%" viewBox="0 0 1000 800">
                        <defs>
                            <linearGradient id="PSgrad_02" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1" />
                                <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1" />
                            </linearGradient>
                        </defs>
                        <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_02)" d="M801.878,3.146 L116.381,128.537 C26.052,145.060 -21.235,229.535 9.856,312.073 L159.806,710.157 C184.515,775.753 264.901,810.334 338.020,792.380 L907.021,652.668 C972.912,636.489 1019.383,573.766 1011.301,510.470 L962.013,124.412 C951.950,45.594 881.254,-11.373 801.878,3.146 Z" />
                    </svg>
                    <div class="row">
                        <div class="col">
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="../img/fundhistory.png" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">Fund Transfer History</h3>
                                    <p class="card-text">Simplify and Track Spends And Receives.</p>
                                </div>
                            </div>
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="../img/integrade.png" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">Easy to Integrate</h3>
                                    <p class="card-text">Create Instant and fast account with user verification.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="../img/payment.png" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">Payment Button</h3>
                                    <p class="card-text">Accept payments on your website, in less than 5 minutes. No Developer Needed.</p>
                                </div>
                            </div>
                            <div class="card text-center">
                                <div class="oval"><img class="card-img-top" src="../img/24-7.png" alt=""></div>
                                <div class="card-body">
                                    <h3 class="card-title">24 / 7 Available</h3>
                                    <p class="card-text">Always available email, phone and chat based support to help you in your every step.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid gtco-feature" id="Details">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="cover">
                        <div class="card">
                            <svg class="back-bg" width="100%" viewBox="0 0 900 700" style="position:absolute; z-index: -1">
                                <defs>
                                    <linearGradient id="PSgrad_01" x1="64.279%" x2="0%" y1="76.604%" y2="0%">
                                        <stop offset="0%" stop-color="rgb(1,230,248)" stop-opacity="1" />
                                        <stop offset="100%" stop-color="rgb(29,62,222)" stop-opacity="1" />
                                    </linearGradient>
                                </defs>
                                <path fill-rule="evenodd" opacity="0.102" fill="url(#PSgrad_01)" d="M616.656,2.494 L89.351,98.948 C19.867,111.658 -16.508,176.639 7.408,240.130 L122.755,546.348 C141.761,596.806 203.597,623.407 259.843,609.597 L697.535,502.126 C748.221,489.680 783.967,441.432 777.751,392.742 L739.837,95.775 C732.096,35.145 677.715,-8.675 616.656,2.494 Z" />
                            </svg>
                            <!-- *************-->

                            <svg width="100%" viewBox="0 0 700 500">
                                <clipPath id="clip-path">
                                    <path d="M89.479,0.180 L512.635,25.932 C568.395,29.326 603.115,76.927 590.357,129.078 L528.827,380.603 C518.688,422.048 472.661,448.814 427.190,443.300 L73.350,400.391 C32.374,395.422 -0.267,360.907 -0.002,322.064 L1.609,85.154 C1.938,36.786 40.481,-2.801 89.479,0.180 Z"></path>
                                </clipPath>
                                <!-- xlink:href for modern browsers, src for IE8- -->
                                <image clip-path="url(#clip-path)" xlink:href="../img/learn-img.jpg" width="100%" height="465" class="svg__image"></image>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h2> We are a Creative Digital
                        Agency & Marketing Experts </h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. In rhoncus turpis nisl, vitae dictum mi
                        semper convallis. Ut sapien leo, varius ac dapibus a, cursus quis ante. </p>
                    <p>
                        <small>Nunc sodales lobortis arcu, sit amet venenatis erat placerat a. Donec lacinia magna nulla,
                            cursus impediet augue egestas id. Suspendisse dolor lectus, pellentesque quis tincidunt ac,
                            dictum id neque.
                        </small>
                    </p>
                    <a href="#">Learn More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid gtco-features-list">
        <div class="container">
            <div class="row">
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="../img/quality-results.png" alt=""></div>
                    <div class="media-body">
                        <h5 class="mb-0">Quality Results</h5>
                        Aliquam a nisl pulvinar, hendrerit arcu sed, dapibus velit. Duis ac quam id sapien vestibulum
                        fermentum ac eu eros. Aliquam erat volutpat.
                    </div>
                </div>
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="../img/analytics.png" alt=""></div>
                    <div class="media-body">
                        <h5 class="mb-0">Analytics</h5>
                        Aliquam a nisl pulvinar, hendrerit arcu sed, dapibus velit. Duis ac quam id sapien vestibulum
                        fermentum ac eu eros. Aliquam erat volutpat.
                    </div>
                </div>
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="../img/affordable-pricing.png" alt=""></div>
                    <div class="media-body">
                        <h5 class="mb-0">Affordable Pricing</h5>
                        Aliquam a nisl pulvinar, hendrerit arcu sed, dapibus velit. Duis ac quam id sapien vestibulum
                        fermentum ac eu eros. Aliquam erat volutpat.
                    </div>
                </div>
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="../img/easy-to-use.png" alt=""></div>
                    <div class="media-body">
                        <h5 class="mb-0">Easy To Use</h5>
                        Aliquam a nisl pulvinar, hendrerit arcu sed, dapibus velit. Duis ac quam id sapien vestibulum
                        fermentum ac eu eros. Aliquam erat volutpat.
                    </div>
                </div>
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="../img/free-support.png" alt=""></div>
                    <div class="media-body">
                        <h5 class="mb-0">Free Support</h5>
                        Aliquam a nisl pulvinar, hendrerit arcu sed, dapibus velit. Duis ac quam id sapien vestibulum
                        fermentum ac eu eros. Aliquam erat volutpat.
                    </div>
                </div>
                <div class="media col-md-6 col-lg-4">
                    <div class="oval mr-4"><img class="align-self-start" src="../img/effectively-increase.png" alt=""></div>
                    <div class="media-body">
                        <h5 class="mb-0">Effectively Increase</h5>
                        Aliquam a nisl pulvinar, hendrerit arcu sed, dapibus velit. Duis ac quam id sapien vestibulum
                        fermentum ac eu eros. Aliquam erat volutpat.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid" id="gtco-footer" style="margin-top: 10rem;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" id="contact">
                    <h4> Contact Us </h4>
                    <form action="bank_home.php" method="post">
                        <input type="text" name="name" class="form-control" placeholder="Full Name">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                        <textarea class="form-control" name="msg" placeholder="Message"></textarea>
                        <button class="submit-button" style="border: none;">Submit <i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-6">
                            <h4>Company</h4>
                            <ul class="nav flex-column company-nav">
                                <li class="nav-item"><a class="nav-link" href="#home">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                                <li class="nav-item"><a class="nav-link" href="#Details">Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                            </ul>
                            <h4 class="mt-5">Fllow Us</h4>
                            <ul class="nav follow-us-nav">
                                <li class="nav-item"><a class="nav-link pl-0" href="https://facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="https://twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="https://google.com"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="https://linkedin.com"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <h4>Services</h4>
                            <ul class="nav flex-column services-nav">
                                <li class="nav-item"><a class="nav-link" href="#services">Fund Transfer History</a></li>
                                <li class="nav-item"><a class="nav-link" href="#services">Payment Button</a></li>
                                <li class="nav-item"><a class="nav-link" href="#services">Easy to Integrate</a></li>
                                <li class="nav-item"><a class="nav-link" href="#services">Instant Activation</a></li>
                                <li class="nav-item"><a class="nav-link" href="#services">Superior Checkout</a></li>
                                <li class="nav-item"><a class="nav-link" href="#services">24 / 7Available</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <p>&copy; 2022. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- owl carousel js-->
    <script src="owl-carousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>