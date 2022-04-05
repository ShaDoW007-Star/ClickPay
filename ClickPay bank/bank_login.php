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

$x = false;
require("../php/conn.php");

$query = "SELECT * FROM `bank_acc`where customer_id = '$customer_id'";
$a = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($a)) {
	$d_acc_no = $row['acc_no'];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$acc_no = $_POST['acc_no'];
	$pass = $_POST['pass'];

	$query = "SELECT * FROM `bank_acc` where acc_no = '$acc_no'";
	$a = mysqli_query($con, $query);
	$b = mysqli_num_rows($a);

	while ($row = mysqli_fetch_assoc($a)) {
		$accn = $row['acc_no'];
		$ps = $row['pass'];
		$un = $row['f_name'];
		$ln = $row['l_name'];
		$acc = $row['acc_no'];
		if ($acc_no == $accn) {
			$x = true;
		} else {
			$x = false;
		}
	}

	if ($x == true) {
		if ($acc_no == $accn) {
			$result = password_verify($pass, $ps);
			if ($result) {
				session_start();
				$_SESSION['f_name'] = $un;
				$_SESSION['l_name'] = $ln;
				$_SESSION['acc_no'] = $acc;
				$_SESSION['pass'] = $ps;
				$_SESSION['log'] = true;
				header("Location:bank_home.php");
				exit;
			} else {
				echo "<script>alert('Pin Incorrect');</script>";
			}
		} else {
			echo "<script>alert('Account Number Incorrect');</script>";
		}
	} else {
		echo "<script>alert('Account Not Found');</script>";
	}
}

?>


<!doctype html>
<html lang="en">

<head>
	<title>ClickPay Bank - Login</title>
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
						<h3 class="text-center mb-4">Login</h3>
						<form action="bank_login.php" class="login-form" method="POST">
							<div class="form-group">
								<input type="text" class="form-control rounded-left" name="acc_no" placeholder="Account Number" value="<?php echo $d_acc_no; ?>" readonly required>
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left" name="pass" placeholder="Account PIN" required>
							</div>

							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#"></a>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5">LOGIN</button>
								<br>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
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