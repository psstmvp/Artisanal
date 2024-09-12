<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$selid = $_SESSION['sid'];
$statSelQry = "select * from tbl_seller where seller_id=" . $selid . " and sell_bio_status=0";
$result = $conn->query($statSelQry);
if ($row = $result->fetch_assoc()) {
	?>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			// Your modal-related JavaScript code here
			const modal = document.getElementById('customModal');
			const closeModalButton = document.getElementById('closeModal');
			const dontShowAgainCheckbox = document.getElementById('dontShowAgain');

			modal.style.display = 'block';

			function closeModal() {
				modal.style.display = 'none';

				if (dontShowAgainCheckbox.checked) {
					check();
				}
			}
			closeModalButton.addEventListener('click', closeModal)
		});


		// Attach the closeModal function as the click event handler

	</script>
	<?php
}


if (isset($_POST["btnsubmit"])) {
	$sel = "select * from tbl_seller_bio where bio_nickname='" . $_POST["txtname"] . "'";
	$res = $conn->query($sel);
	if (!($row = $res->fetch_assoc())) {

		$nickname = $_POST["txtname"];
		$selemail = strtolower($_POST["txtemail"]);
		$selbio = $_POST["txtbio"];

		$biophoto = $_FILES["image"]["name"];
		$tempphoto = $_FILES["image"]["tmp_name"];
		move_uploaded_file($tempphoto, '../Assets/File/Seller//SellerBio/' . $biophoto);

		$insQry = "insert into tbl_seller_bio (bio_nickname, bio_email, bio_details, sell_profilepic, seller_id)values('" . $nickname . "','" . $selemail . "','" . $selbio . "','" . $biophoto . "'," . $selid . ")";
		if ($conn->query($insQry)) {
			?>
			<script>
				alert("Profile Set");
				window.location = "SetProfile.php";
			</script>
			<?php

		}
	} else {
		?>
		<script>
			alert("nickname already exist");
		</script>
		<?php
	}
}
?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>My Bio</title>
	<link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
	<link rel="stylesheet" type="text/css" href="../Assets/CssPages/SetProfile.css">

	<style>

	</style>
	<style>


	</style>
</head>

<body>

<div class="content-wrapper">
	<div id="customModal" class="modal">
		<div class="modal-contentss">
			<h4>Note: these details are viewed by the customers</h4>

			<label>
				<input type="checkbox" id="dontShowAgain"> Don't show again
			</label>
			<button id="closeModal" class="closebutton">Close</button>
		</div>
	</div>
	<form id="form1" name="form1" method="post" enctype="multipart/form-data">
		<?php
		$SelQry = "select * from tbl_seller_bio where seller_id=" . $selid . "";
		$res = $conn->query($SelQry);

		if ($brow = $res->fetch_assoc()) {
			?>

			<!-- Component -->
			<div class="profile-container">
				<img class="profile-picture" src="../Assets/File/Seller/SellerBio/<?php echo $brow['sell_profilepic']; ?>"
					width="150px" height="150px"> </span>

				<div>
					<!-- Title -->
					<div align="center">
						<span class="profile-nickname">
							<?php echo $brow['bio_nickname']; ?><br>
						</span>
					</div>
					<!-- Subtitle -->
					<div align="center">
						<span class="profile-email">
							<?php echo $brow['bio_email']; ?><br>
						</span>
					</div>
					<div align="center">
						<span class="profile-bio">
							<?php echo $brow['bio_details']; ?><br>
						</span>
					</div>
				</div>


				<!-- Stats -->
				<?php
				$selPost = "SELECT COUNT(*) as c FROM tbl_post WHERE seller_id=" . $brow['seller_id'] . "";
				$result = $conn->query($selPost);
				$count = $result->fetch_assoc();
				$selfollow = "SELECT COUNT(*) as f FROM tbl_follow WHERE seller_id=" . $brow['seller_id'] . "";
				$rlt = $conn->query($selfollow);
				$follow = $rlt->fetch_assoc();
				$selprod = "SELECT COUNT(*) as p FROM tbl_product WHERE seller_id=" . $brow['seller_id'] . "";
				$reslt = $conn->query($selprod);
				$product = $reslt->fetch_assoc();
				?>

				<div>
					<div class="profile-statistics">
						<div class="data-line">
							<div class="data-item">
								<span>
									<?php echo $count['c']; ?>
								</span>
								<p class="data-label">Posts</p>
							</div>

							<div class="data-item"style="margin:0 0 0 0px">
								<span>
									<?php echo $product['p']; ?>
								</span>
								<p class="data-label">Products</p>
							</div>

							<div class="data-item" style="margin:0 0 0 0px">
								<span>
									<?php echo $follow['f']; ?>
								</span>
								<p class="data-label">Followers</p>
							</div>
						</div>
					</div>

				</div>
				<div style="margin:15px;text-align:center;">               
				<a class="btn btn-primary" style="background-color:#2865AF;" href="EditProfile.php">Edit Profile</a>
				</div>	
			</center>
			</div>

			<?php
		} else {
			?>



			<div class="setprofile-container">
				<form id="myForm" action="#" method="post" enctype="multipart/form-data">

					<center><img src="../Assets/File/Seller/SellerBio/default.jpg" width="150px" height="150px"></center>
					<label for="image">Image:</label>
					<input type="file" id="image" name="image" accept="image/*">

					<label for="name">Name:</label>
					<input type="text" id="txtname" name="txtname" required>

					<label for="email">Email:</label>
					<input type="email" id="txtemail" name="txtemail" required>

					<label for="bio">Bio:</label>
					<textarea id="bio" name="txtbio" rows="4" required></textarea>

					<div class="button-container">
						<input type="submit" value="Submit" name="btnsubmit" id="btnsubmit" class="submit-button">
						<input type="reset" value="Reset" name="btncancel" class="reset-button">
					</div>

				</form>
			</div>
			<?Php
		}
		?>
</div>
		<script src="../Assets/JQ/jQuery.js "></script>
		<script>
			function check() {
				$.ajax({
					url: "../Assets/AjaxPages/AjaxCheckStatus.php",
					success: function (html) {
					}
				});
			}

		</script>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>