<?php
session_start();
include("../Assets/Connection/Connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';
if(isset($_GET['id']))
{
	mailOTP($_SESSION['fpe']);
}

function mailOTP($email)
		{
		$ran = rand(100000, 999999);
		$_SESSION["otp"] = $ran;
		//Email Code Start
		$mail = new PHPMailer(true);

		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = ''; // Your gmail
		$mail->Password = ''; // Your gmail app password
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;

		$mail->setFrom('artisanalhelp@gmail.com'); // Your gmail

		$mail->addAddress($email);

		$mail->isHTML(true);

		$mail->Subject = "Artisanal password Recovery";
		$mail->Body = "Hello,<br> this is your one time password to recover your Artisanal account enter the given OTP to set a new Password <b>" . $ran . ".</b> <br> Thank you ";
		if ($mail->send()) {
			?>
			<script>

				alert("Your OTP has been sent to your Email")
				window.location = "OTP.php";


			</script>
			<?php
		} else {
			echo "Failed";
		}
	}



if (isset($_POST['btnotp'])) {

	$email = $_POST['txtemail'];
	$_SESSION['fpe']=$email;

	$selqry = "select *from tbl_seller where sell_email='" . $email . "' and sell_otp_status=1";
	$res = $conn->query($selqry);
	$cusqry = "select *from tbl_customer where cus_email='" . $email . "' and cus_otp_status=1";
	$cusres = $conn->query($cusqry);
	if (!($row = $res->fetch_assoc() || $cusrow = $cusres->fetch_assoc())) {
		?>
		<script>
			alert("account doesnot exist with given email");
		</script>
		<?php
	} else {
		mailOTP($email);
		
	}
} //Email Code End
?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="../Assets/CssPages/FeedComp.css" />
	<title>Forgot Password</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="../Assets/Template/Admin/vendors/feather/feather.css">
	<link rel="stylesheet" href="../Assets/Template/Admin/vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="../Assets/Template/Admin/vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../Assets/Template/Admin/css/vertical-layout-light/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="../A.png">
</head>

<body>
	<center>
		<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth px-0"style="background-size: cover;background-repeat: no-repeat;
	background-image: url('../Assets/File/Admin/bg4.png');">
				<div class="row w-100 mx-0">
					<div class="col-lg-4 mx-auto">
						<div class="auth-form-light text-left py-5 px-4 px-sm-5"
							style="border-radius:20px;">
							<form class="pt-3" method="post" action="">
								<div class="form-container">
									<div class="form-group">
										<label for="txtemail">E-mail</label>
										<input type="email" class="form-control" id="txtemail" name="txtemail">
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" style="margin-left:80px;"id="btnotp" name="btnotp"
											value="Send OTP">
									</div>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
		</div>

		<script src="../Assets/Template/Admin/vendors/js/vendor.bundle.base.js"></script>
		<!-- endinject -->
		<!-- Plugin js for this page -->
		<!-- End plugin js for this page -->
		<!-- inject:js -->
		<script src="../Assets/Template/Admin/js/off-canvas.js"></script>
		<script src="../Assets/Template/Admin/js/hoverable-collapse.js"></script>
		<script src="../Assets/Template/Admin/js/template.js"></script>
		<script src="../Assets/Template/Admin/js/settings.js"></script>
		<script src="../Assets/Template/Admin/js/todolist.js"></script>
</body>

</html>
