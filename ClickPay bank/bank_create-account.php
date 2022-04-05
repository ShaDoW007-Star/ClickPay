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

error_reporting(0);

$x = false;
$y = false;
$s = false;
require("../php/conn.php");

$query = "SELECT * FROM `bank_acc` order by acc_no desc limit 1";
$a = mysqli_query($con, $query);
$b = mysqli_num_rows($a);

error_reporting(0);

while ($row = mysqli_fetch_assoc($a)) {
    $z = $row['acc_no'];
    $accn = $z;
}

if ($accn == NULL) {
    $accno = "1000000001";
} else {
    $accno = ($accn + 1);
}

$query = "SELECT * FROM `signup` where customer_id = $customer_id";
$a = mysqli_query($con, $query);
$b = mysqli_num_rows($a);

while ($row = mysqli_fetch_assoc($a)) {
    $d_fname = $row['f_name'];
    $d_lname = $row['l_name'];
    $d_contact = $row['contact'];
    $d_email = $row['email'];
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $acc_no = $_POST['acc_no'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $adhno = $_POST['adhno'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $acc_type = $_POST['acc_type'];
    $pass = $_POST['pass'];

    $query1 = "SELECT * FROM `bank_acc`";
    $a1 = mysqli_query($con, $query1);
    $b1 = mysqli_num_rows($a1);

    while ($row1 = mysqli_fetch_assoc($a1)) {
        $an = $row1['adhno'];
    }

    if ($adhno != $an) {
        $s = true;
    } else {
        $s = false;
    }

    if ($s == true) {
        $hash = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO `bank_acc` (`acc_no`,`customer_id`,`f_name`,`l_name`,`contact`,`adhno`,`email`,`dob`,`acc_type`,`pass`,`ttl_amount`) VALUES ('$acc_no','$customer_id','$fname','$lname','$contact','$adhno','$email','$dob','$acc_type','$hash','0');";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header("Location:bank_login.php");
        } else {
            echo "<script>alert('Data Not Submitted...');</script>";
        }
    } else {
        echo "<script>alert('Aadhaar Number Same');</script>";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>ClickPay - Bank Create Account</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/ClickPay bank css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/ClickPay bank css/style.css">
    <link rel="stylesheet" href="../css/ClickPay bank css/login.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
        <div class="container"><a class="navbar-brand">ClickPay-Bank</a>

            <div id="my-nav" class="collapse navbar-collapse">
                <form class="form-inline my-2 my-lg-0" style="margin-left: 50rem;">
                    <a href="../ClickPay Main/main_home.php" class="btn btn-info my-2 my-sm-0 text-uppercase">HOME</a>
                </form>
            </div>
        </div>
    </nav>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Registration</h3>
                        <form action="bank_create-account.php" class="login-form" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" name="acc_no" value="<?php echo $accno; ?>" readonly placeholder="Account Number">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" name="fname" placeholder="First Name" value="<?php echo $d_fname; ?>" readonly required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" name="lname" placeholder="Last Name" value="<?php echo $d_lname; ?>" readonly required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" name="contact" placeholder="Contact Number" value="<?php echo $d_contact; ?>" readonly required>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control rounded-left" name="email" placeholder="Email" value="<?php echo $d_email; ?>" readonly required>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" name="adhno" placeholder="Aadhaar Number" required>
                            </div>

                            <div class="form-group">
                                <input type="date" class="form-control rounded-left" name="dob" placeholder="dob" required>
                            </div>
                            <div class="form-group">
                                <label for="">Which account do you want to open ?</label><br>
                                <input type="radio" class="acctype" name="acc_type" id="Current" value="Current Account" style="margin-left: 1rem;">&nbsp;&nbsp;<label for="Current">Current Account</label>
                                <input type="radio" class="acctype" name="acc_type" id="Saving" value="Saving Account" style="margin-left: 2rem;">&nbsp;&nbsp;<label for="Saving">Saving Account</label>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" name="pass" placeholder="Account PIN" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="hidden" class="form-control rounded-left" placeholder="NOTHING" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Create Account</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>

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