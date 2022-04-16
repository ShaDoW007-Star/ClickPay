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

$acc_no = $_SESSION['acc_no'];
$customer_id = $_SESSION['customer_id'];

$query1 = "SELECT * FROM `bank_acc` where acc_no =  $acc_no";
$a1 = mysqli_query($con, $query1);
$b1 = mysqli_num_rows($a1);

while ($row1 = mysqli_fetch_assoc($a1)) {

    $an = $row1['acc_no'];
    $fn = $row1['f_name'];
    $ln = $row1['l_name'];
    $cn = $row1['contact'];
    $at = $row1['acc_type'];
}

$query2 = "SELECT * FROM `bank_deposit` where customer_id = $customer_id and transaction='Credit'";
$a2 = mysqli_query($con, $query2);
$b2 = mysqli_num_rows($a2);

if ($b2 > 0) {
    while ($row3 = mysqli_fetch_assoc($a2)) {
        $ammm = $row3['amount'];
        error_reporting(0);
        $int = (int)$ammm;
        $sum = $sum + $int;
    }
}

$query2 = "SELECT * FROM `bank_deposit` where customer_id = $customer_id and transaction='Debit'";
$a2 = mysqli_query($con, $query2);
$b2 = mysqli_num_rows($a2);

if ($b2 > 0) {
    while ($row3 = mysqli_fetch_assoc($a2)) {
        $ammmm = $row3['amount'];
        error_reporting(0);
        $int = (int)$ammmm;
        $sent += $int;
    }
}
$sum -= $sent;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../css/ClickPay bank css/passbook.css">

    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/ClickPay bank css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/ClickPay bank css/style.css">

    <title>ClickPay - Bank Passbook</title>
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
                <h3 class="debit">PassBook</h3>

                <div class="data">

                    <form action="" method="get">
                        <div class="lbl">
                            <label for="">Account Number</label><br>
                            <input type="text" size="15" value="<?php echo " $an "; ?>" style="text-align: center;" readonly><br>
                            <label for="">Name</label>
                            <input type="text" value="<?php echo "$fn $ln"; ?>" style="text-align: center;" readonly><br>
                            <label for="">Account Type</label><br>
                            <input type="text" size="15" value="<?php echo " $at "; ?>" style="text-align: center;" readonly><br>
                            <label for="">Total Amount</label><br>
                            <input type="text" size="15" value="<?php echo $sum; ?>" style="text-align: center;" readonly>
                        </div>
                    </form>
                    <h2>Transaction History</h2>
                </div>

                <div class="info">
                    <table style="width: 100%; font-size: 1rem;">
                        <tr>
                            <th style="font-size: 1.4rem;">Account Number</th>
                            <th style="font-size: 1.4rem;">First Name</th>
                            <th style="font-size: 1.4rem;">Last Name</th>
                            <th style="font-size: 1.4rem;">Contact</th>
                            <th style="font-size: 1.4rem;">Date</th>
                            <th style="font-size: 1.4rem;">Amount</th>
                            <th style="font-size: 1.4rem;">Account Transaction</th>
                        </tr>
                        <?php
                        $query5 = "SELECT * FROM `bank_deposit` where customer_id = $customer_id";
                        $a5 = mysqli_query($con, $query5);
                        $b5 = mysqli_num_rows($a5);

                        if ($b5 > 0) {
                            while ($row5 = mysqli_fetch_assoc($a5)) {
                                $date1 = $row5['date'];
                                $amount1 = $row5['amount'];
                                $trans = $row5['transaction'];
                                echo "<tr>";
                                echo "<td style='font-size: 1.3rem;'> $an </td>";
                                echo "<td style='font-size: 1.3rem;'> $fn </td>";
                                echo "<td style='font-size: 1.3rem;'> $ln </td>";
                                echo "<td style='font-size: 1.3rem;'> $cn </td>";
                                echo "<td style='font-size: 1.3rem;'> $date1 </td>";
                                echo "<td style='font-size: 1.3rem;'> $amount1 </td>";
                                echo "<td style='font-size: 1.3rem;'> $trans </td>";
                                echo "</tr>";
                            }
                        }
                        ?>

                    </table>
                    <br>
                    <br>
                </div>
            </div>
        </div>

    </section>
    </script>


</body>

</html>