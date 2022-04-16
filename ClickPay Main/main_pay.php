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
$contact = $_SESSION['contact'];

$query1 = "SELECT * FROM `signup` where customer_id = $customer_id";
$a1 = mysqli_query($con, $query1);
$b1 = mysqli_num_rows($a1);

while ($row1 = mysqli_fetch_assoc($a1)) {
    $d_name = $row1['f_name'];
    $d_contact = $row1['contact'];
}

$query1 = "SELECT * FROM `main_wallet` where customer_id = $customer_id";
$a1 = mysqli_query($con, $query1);
$b1 = mysqli_num_rows($a1);

while ($row1 = mysqli_fetch_assoc($a1)) {
    $d_amount = $row1['amount'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cd = date("d-m-Y");

    $from = $_POST['from'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $query1 = "SELECT * FROM `signup` where contact = $to ";
    $a1 = mysqli_query($con, $query1);
    $b1 = mysqli_num_rows($a1);


    error_reporting(0);

    while ($row1 = mysqli_fetch_assoc($a1)) {
        $to_name = $row1['f_name'];
        $reciever_id = $row1['customer_id'];
        $reciever_contact = $row1['contact'];

        if ($reciever_contact == $to) {
            $x = true;
            $query1 = "SELECT * FROM `main_wallet` where customer_id = $reciever_id";
            $a1 = mysqli_query($con, $query1);
            $b1 = mysqli_num_rows($a1);

            while ($row1 = mysqli_fetch_assoc($a1)) {
                $reciever_amount = $row1['amount'];
            }
        } else {
            $x = false;
        }
    }


    if ($contact != $to) {

        if ($x == true) {
            if ($amount <= $d_amount) {

                $reciever_amount += $amount;
                $d_amount -= $amount;

                $query3 = "UPDATE `main_wallet` SET amount= $reciever_amount where customer_id = $reciever_id";
                $result3 = mysqli_query($con, $query3);

                $query3 = "UPDATE `main_wallet` SET amount= $d_amount where customer_id = $customer_id";
                $result3 = mysqli_query($con, $query3);

                $query2 = "INSERT INTO `wallet_history` (`customer_id`,`h_date`,`from_name`,`from_contact`,`to_contact`,`amount`,`transaction`) VALUES ('$customer_id','$cd','$to_name','$from','$reciever_contact','$amount','Sent');";
                $result2 = mysqli_query($con, $query2);

                $query2 = "INSERT INTO `wallet_history` (`customer_id`,`h_date`,`from_name`,`from_contact`,`to_contact`,`amount`,`transaction`) VALUES ('$reciever_id','$cd','$d_name','$from', '$reciever_contact','$amount','Received');";
                $result2 = mysqli_query($con, $query2);

                echo "<script>alert('Transaction Successfull');</script>";
            } else {
                echo "<script>alert('Not Enough Balance');</script>";
            }
        } else {
            echo "<script>alert('Invaild Number........Wallet Not Found');</script>";
        }
    } else {
        echo "<script>alert('Sender and Reciever Contact Same...');</script>";
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
    <link rel="stylesheet" href="../css/ClickPay main css/pay.css">
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
                        <li style="color: rgba(0, 0, 255, 0.616);">Payment</li>
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
    <main class="m1">
        <h1 style="color: whitesmoke; text-align: center; margin-top: 3rem;">Supercharge your
            business <br> with ClickPay
            Payment Gateway</h1>
        <section class="s1">
            <form action="" method="post">
                <div class="form">
                    <img src="../img/user_pic.png" alt="" style="margin-top: 5rem; margin-left: 5rem;" height="30px" width="30px">
                    <div class="p1">
                        <p>From</p>
                        <input type="number" name="from" placeholder="Enter Your Number" value="<?php echo $d_contact; ?>" readonly>
                    </div>
                    <img src="../img/user_pic.png" alt="" style="margin-top: 5rem; margin-left:5rem;" height="30px" width="30px">
                    <div class="p2">
                        <p>To</p>
                        <input type="number" name="to" placeholder="Enter Person Number" required>
                    </div>
                    <img src="../img/transfer.png" alt="" style="margin-top: 5rem; margin-left:5rem;" height="30px" width="30px">
                    <div class="p3">
                        <p>Amount</p>
                        <input type="number" name="amount" placeholder="$ Amount $" required><br>
                    </div>
                </div>
                <button>Pay</button>
            </form>
            <br>
            <br>
        </section>
        <section>
            <div class="info">
                <div class="info1">
                    <h3>Automated Payment Reminders <br> to automate collections</h2>
                        <hr width="80px" style="padding: .2rem; color:blue">
                        <h5>Send SMS and email reminders to late-paying <br> clients without lifting a finger.</h4>
                </div>
                <div class="info2">
                    <img src="../img/pay1.png" alt="" height="90%" width="90%">
                </div>
            </div>
        </section>
    </main>
    <footer class="page-footer" style="margin-top: 63rem;">
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