<?php

session_start();

require("../php/conn.php");

if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("location:login.php");
    exit;
}
$customer_id = $_SESSION['customer_id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <!-- <link rel="stylesheet" href="../css/ClickPay main css/wallet.css"> -->
    <link rel="stylesheet" href="../css/ClickPay main css/passbook.css">

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
                        <li style="color: rgba(0, 0, 255, 0.616);">History</li>
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
            <h1 style="text-align: center; color: rgb(0, 0, 105); margin-top: 1.5rem;">Transaction History</h1>
            <hr width="980px" style="padding: .1rem; margin-left:17rem; background-color:darkblue">
            <div class="box">        

                <div class="info">
                    <table style="width: 100%; font-size: 1rem;">
                        <tr>
                            <th style="font-size: 1.4rem; color: white; ">Transaction</th>                            
                            <!-- <th style="font-size: 1.4rem; color: white; ">Name</th> -->
                            <th style="font-size: 1.4rem; color: white; ">Sender Contact</th>
                            <th style="font-size: 1.4rem; color: white; ">Receiver Contact</th>
                            <th style="font-size: 1.4rem; color: white; ">Date</th>
                            <th style="font-size: 1.4rem; color: white; ">Amount</th>
                        </tr>
                        <?php
                        $query5 = "SELECT * FROM wallet_history where customer_id = $customer_id";
                        $a5 = mysqli_query($con, $query5);
                        $b5 = mysqli_num_rows($a5);

                        if ($b5 > 0) {
                            while ($row5 = mysqli_fetch_assoc($a5)) {
                                $from_name = $row5['from_name'];
                                $from_contact = $row5['from_contact'];
                                $to_contact = $row5['to_contact'];
                                $date1 = $row5['h_date'];
                                $amount1 = $row5['amount'];
                                $trans = $row5['transaction'];
                                echo "<tr>";
                                echo "<td style='font-size: 1.3rem; color: white;'> $trans </td>";                                
                                // echo "<td style='font-size: 1.3rem; color: white;'> $from_name </td>";
                                echo "<td style='font-size: 1.3rem; color: white;'> $from_contact </td>";
                                echo "<td style='font-size: 1.3rem; color: white;'> $to_contact </td>";
                                echo "<td style='font-size: 1.3rem; color: white;'> $date1 </td>";
                                if($trans == "Sent"){
                                    echo "<td style='font-size: 1.3rem; color: white;'> - $amount1 </td>";                                
                                }
                                if($trans == "Received"){
                                    echo "<td style='font-size: 1.3rem; color: white;'> + $amount1 </td>";                                
                                }
                                echo "</tr>";
                            }
                        }
                        ?>                        
                    </table>
                    <br>
                    <br>
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