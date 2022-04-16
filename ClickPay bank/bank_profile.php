<?php

require("../php/conn.php");

session_start();

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

$acc = $_SESSION['acc_no'];

$query = "SELECT * FROM `bank_acc` where acc_no = '$acc'";
$a = mysqli_query($con, $query);
$b = mysqli_num_rows($a);

if ($b > 0) {
	while ($row = mysqli_fetch_assoc($a)) {
		$fname = $row['f_name'];
		$lname = $row['l_name'];
		$cn = $row['contact'];
		$an = $row['adhno'];
		$em = $row['email'];
		$dob = $row['dob'];
		$acc_type = $row['acc_type'];
	}
} else {
	echo "No Record Found";
}

?>


<!doctype html>
<html lang="en">

<head>
	<title>ClickPay - Bank User-Profile</title>
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
					<a href="bank_home.php" class="btn btn-info my-2 my-sm-0 text-uppercase">Home</a>
				</form>
			</div>
		</div>
	</nav>

	<section class="ftco-section">
		<div class="container" style="margin-left: 4em;">
			<div class="row">
				<div class="col-md-6 col-lg-5">
					<div class="p-4">
						<div class="icon d-flex align-items-center justify-content-center">
						</div>
						<h3 class="text-center mb-4">User Profile</h3>
						<form action="bank_home.php" class="login-form">
							<div class="form-group">
								<input type="text" class="form-control rounded-left" value="<?php echo $acc; ?>" placeholder="Account Number" readonly>
							</div>

							<div class="form-group">
								<input type="text" class="form-control rounded-left" value="<?php echo $fname; ?>" placeholder="First Name" readonly>
							</div>

							<div class="form-group">
								<input type="text" class="form-control rounded-left" value="<?php echo $lname; ?>" placeholder="Last Name" readonly>
							</div>

							<div class="form-group">
								<input type="text" class="form-control rounded-left" value="<?php echo $cn; ?>" placeholder="Contact Number" readonly>
							</div>

							<div class="form-group">
								<input type="text" class="form-control rounded-left" value="<?php echo $an; ?>" placeholder="Aadhaar Number" readonly>
							</div>

							<div class="form-group">
								<input type="email" class="form-control rounded-left" value="<?php echo $em; ?>" placeholder="Email" readonly>
							</div>

							<div class="form-group">
								<?php
								if ($acc_type == "Current Account") {
								?>
									<input type="radio" class="acctype" name="acc_type" id="ca" style="margin-left: 1rem;" checked>&nbsp;&nbsp;<label for="date">Current Account</label>
									<input type="radio" class="acctype" name="acc_type" id="sa" style="margin-left: 2rem;">&nbsp;&nbsp;<label for="date">Saving Account</label>
								<?php
								} elseif ($acc_type == "Saving Account") {
								?>
									<input type="radio" class="acctype" name="acc_type" id="ca" style="margin-left: 1rem;">&nbsp;&nbsp;<label for="date">Current Account</label>
									<input type="radio" class="acctype" name="acc_type" id="sa" style="margin-left: 2rem;" checked>&nbsp;&nbsp;<label for="date">Saving Account</label>
								<?php
								}
								?>
							</div>

							<div class="form-group">
								<input type="date" class="form-control rounded-left" value="<?php echo $dob; ?>" placeholder="dob" readonly>
							</div>

							<div class="form-group">
								<!-- <button type="submit" class="btn btn-primary rounded submit p-3 px-5" style="margin-bottom: 10rem; padding: 0 5rem;">Save</button> -->
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 6rem;"></div>
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