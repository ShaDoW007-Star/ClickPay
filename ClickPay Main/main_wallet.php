<?php

session_start();

require("../php/conn.php");

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location:login.php");
    exit;
}

?>
<?php

$customer_id = $_SESSION['customer_id'];
$cd = date("d-m-Y");
error_reporting(0);

$query1 = "SELECT * FROM `main_wallet` where customer_id = $customer_id; ";
$a1 = mysqli_query($con, $query1);
$b1 = mysqli_num_rows($a1);

while ($row1 = mysqli_fetch_assoc($a1)) {
    $d_amt = $row1['amount'];
}

if ($d_amt == NULL) {
    $d_amt = 0;
}




if ($a_amt == NULL) {
    $a_amt = 0;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $new_amt = $_POST['wallet'];

    $query = "SELECT * FROM `bank_acc` where customer_id = $customer_id; ";
    $a = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($a)) {
        $bank_ttl_amount = $row['ttl_amount'];
        $acc_no = $row['acc_no'];
    }

    if ($new_amt <= $bank_ttl_amount) {
        $bank_ttl_amount -= $new_amt;

        if ($d_amt == NULL) {
            $query2 = "INSERT INTO `main_wallet` (`customer_id`,`date`,`amount`) VALUES ('$customer_id','$cd','$new_amt');";
            $result2 = mysqli_query($con, $query2);

            // $query2 = "INSERT INTO `wallet_history` (`customer_id`,`h_date`,`from_name`,`from_contact`,`to_contact`,`amount`,`transaction`) VALUES ('$customer_id','$cd','Bank','$new_amt');";
            // $result2 = mysqli_query($con, $query2);

            $query3 = "INSERT INTO `bank_deposit` (`acc_no`,`customer_id`,`date`,`amount`,`transaction`) VALUES ('$acc_no','$customer_id','$cd','$new_amt','Debit');";
            $result3 = mysqli_query($con, $query3);

            $query = "UPDATE `bank_acc`set ttl_amount=$bank_ttl_amount where acc_no='$acc_no';";
            $result1 = mysqli_query($con, $query);

            echo "<script>alert('You have successfully add $new_amt Rupees...');</script>";
            header("Refresh:0");
        } else {
            $query4 = "UPDATE `main_wallet` SET amount=$new_amt + $d_amt where customer_id = $customer_id";
            $result4 = mysqli_query($con, $query4);

            $query5 = "INSERT INTO `bank_deposit` (`acc_no`,`customer_id`,`date`,`amount`,`transaction`) VALUES ('$acc_no','$customer_id','$cd','$new_amt','Sent');";
            $result5 = mysqli_query($con, $query5);

            $query = "UPDATE `bank_acc`set ttl_amount=$bank_ttl_amount where acc_no='$acc_no'";
            $result1 = mysqli_query($con, $query);


            echo "<script>alert('You have successfully add $new_amt Rupees...');</script>";
            header("Refresh:0");
        }
    } else {
        echo "<script>alert('you don\'t have enough balance in ClickPay Bank');</script>";
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
    <link rel="stylesheet" href="../css/ClickPay main css/wallet.css">
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
                        <li style="color: rgba(0, 0, 255, 0.616);">Wallet</li>
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
    <div class="poly">
    </div>
    <div class="poly1">

    </div>
    <main class="main1">
        <section>
            <h1 style="text-align: center; color: rgb(0, 0, 105); margin-top: 1.5rem;">Easy and Secure way to add money
                to ClickPay Wallet</h1>
            <hr width="980px" style="padding: .1rem; margin-left:17rem; background-color:darkblue">
            <div class="box">
                <div class="box1">
                    <img src="../img/wallet.png" alt="" height="200px" width="200px">
                    <h3>wallet</h3>
                    <h5>$<?php echo $d_amt; ?></h5>
                </div>
                <div class="box2">
                    <img src="../img/wallet.png" alt="" height="200px" width="200px">
                    <form action="main_wallet.php" method="post" class="fm">
                        <input type="number" name="wallet" placeholder="Add Money To Wallet" required>
                        <button>Add Money</button>
                    </form>

                    <?php
                    $qur = "SELECT * FROM bank_acc where customer_id = $customer_id; ";
                    $res = mysqli_query($con, $qur);
                    
                    while ($row = mysqli_fetch_array($res)) {
                        $a_amt = $row['ttl_amount'];
                    }
                    ?>
    
                    <h6>Available Balance : $<?php echo $a_amt; ?></h6>

                </div>
            </div>
        </section>
    </main>

    <footer class="page-footer" style="margin-top: 5rem;">
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