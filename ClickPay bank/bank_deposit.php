<?php

require("../php/conn.php");

session_start();
error_reporting(0);

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

?>

<?php

require("../php/conn.php");

$cd = date("d-m-Y");
$pin = $_SESSION['pass'];
$acc_no = $_SESSION['acc_no'];
$customer_id = $_SESSION['customer_id'];
$display = false;

// $query1 = "SELECT * FROM `bank_deposit` where acc_no = $acc_no";
// $a1 = mysqli_query($con, $query1);
// $b1 = mysqli_num_rows($a1);


// while ($row1 = mysqli_fetch_assoc($a1)) {
//     $z = $row1['amount'];
//     $am = $z;
// }

$query1 = "SELECT * FROM `bank_acc` where acc_no = $acc_no";
$a2 = mysqli_query($con, $query1);
$b2 = mysqli_num_rows($a2);

while ($row2 = mysqli_fetch_assoc($a2)) {
    $ttl_amount = $row2['ttl_amount'];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $acc_no = $_POST['acc_no'];
    $pass = $_POST['pass'];
    $amount = $_POST['amount'];

    $result = password_verify($pass, $pin);

    if ($result) {
        if ($amount <= 1000) {

            $ttl_amount += $amount;

            $query = "INSERT INTO `bank_deposit` (`acc_no`,`customer_id`,`date`,`amount`,`transaction`) VALUES ('$acc_no','$customer_id','$cd','$amount','Received');";
            $result1 = mysqli_query($con, $query);

            $query = "UPDATE `bank_acc`set ttl_amount=$ttl_amount where acc_no='$acc_no';";
            $result1 = mysqli_query($con, $query);

            if ($result1) {
                $display = true;
            } else {
                echo "<script>alert('Your Amount is Not Deposit Try again......')</script>";
            }
        } else {
            echo "<script>alert('You can not deposit more than 1000 Rupees Per Day.....')</script>";
        }
    } else {
        echo "<script>alert('Wrong Pin...')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../css/ClickPay bank css/card.css">

    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/ClickPay bank css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/ClickPay bank css/style.css">

    <title>ClickPay - Bank Depoist</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent" id="gtco-main-nav">
        <div class="container" style="margin-left:3rem;"><a class="navbar-brand">ClickPay-Bank</a>
            <div id="my-nav" class="collapse navbar-collapse">
                <form class="form-inline my-2 my-lg-0">
                    <a href="bank_home.php" class="btn btn-outline-dark my-2 my-sm-0 mr-3 text-uppercase" style="margin-left: 55rem;">HOME</a>
                </form>
            </div>
        </div>
    </nav>
    <section>
        <div class="card">
            <div class="face front">
                <form action="bank_deposit.php" method="POST">

                    <h3 class="debit">CLICKPAY - BANK</h3>
                    <h3 class="bank">Depoist</h3>
                    <img class="chip" src="../img/chip.png" alt="chip">
                    <h3 class="number"><span>Account Number</span> <input type="text" name="acc_no" id="accno" value="<?php echo $_SESSION['acc_no']; ?>" size="30" placeholder="xxxx-xxxx-xxxx-xxxx" style="padding-top: .5rem;"> </h3>
                    <h5 class="valid"><span>PIN</span><span> <input type="password" name="pass" id="pin" placeholder="****" size="10"> </span></h5>
                    <h5 class="card-holder"><span>Amount</span> <input type="text" name="amount" id="Amount" placeholder="Rs. 1000/-" size="10"></h5>
                    <button class="submit-button">Submit</button>
                </form>
            </div>
        </div>
        <div style="margin-top: 7rem; margin-left:37rem">
            <?php
            if ($display) {
                echo "<h4>Your Amount is $amount Rupees Deposit Successfully</h1>";
            }
            ?>
        </div>
    </section>
    </script>


</body>

</html>