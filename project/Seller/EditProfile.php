<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$sid = $_SESSION['sid'];

if (isset($_POST['btnupdate'])) {
	$sel = "select * from tbl_seller_bio where bio_nickname='" . $_POST["txtname"] . "' and seller_id !=" . $sid . "";
	$res = $conn->query($sel);
	if (!($row = $res->fetch_assoc())) {

		$nickname = $_POST["txtname"];
		$selemail = strtolower($_POST["txtemail"]);
		$selbio = $_POST["txtbio"];

		if (file_exists($_FILES['image']["tmp_name"])) {
			$biophoto = $_FILES["image"]["name"];
			$tempphoto = $_FILES["image"]["tmp_name"];
			move_uploaded_file($tempphoto, '../Assets/File/Seller/SellerBio/' . $biophoto);

			$photoUpQry = "update tbl_seller_bio set sell_profilepic='" . $biophoto . "' where seller_id='" . $sid . "'";
			$conn->query($photoUpQry);
		}

		$upQry = "update tbl_seller_bio set bio_nickname='" . $nickname . "',bio_email='" . $selemail . "',bio_details='" . $selbio . "' where seller_id = " . $sid . "";

		if ($conn->query($upQry)) {
			?>
			<script>
				alert("updated");
				window.location = "SetProfile.php"
			</script>
			<?php
		} else {
			?>
			<script>
				alert("failed");
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
	<title>Edit Account</title>
	<link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
	<link rel="stylesheet" type="text/css" href="../Assets/CssPages/SetProfile.css">

</head>

<body>
	<div class="content-wrapper">
		<?php

		$selQry = "select * from tbl_seller_bio where seller_id='" . $sid . "'";
		$res = $conn->query($selQry);
		while ($row = $res->fetch_assoc()) {
			?>

			<div class="setprofile-container">
				<form id="myForm" action="#" method="post" enctype="multipart/form-data">

					<center><img class="profile-picture"
							src="../Assets/File/Seller/SellerBio/<?php echo $row['sell_profilepic']; ?>" width="150px"
							height="150px"></center>
					<label for="image">Image:</label>
					<input type="file" id="image" name="image" accept=".jpg, .jpeg, .png, .webp, .avif, .gif">

					<label for="name">Name:</label>
					<input type="text" id="txtname" name="txtname" value="<?php echo $row['bio_nickname']; ?>" required>

					<label for="email">Email:</label>
					<input type="email" id="txtemail" name="txtemail" value="<?php echo $row['bio_email']; ?>" required>

					<label for="bio">Bio:</label>
					<textarea id="bio" name="txtbio" rows="4" required><?php echo $row['bio_details']; ?></textarea>

					<div class="button-container">
						<input type="submit" name="btnupdate" id="btnupdate" value="Update" class="update-button">
					</div>

				</form>
			</div>
			<?php
		} ?>
	</div>
</body>
<script>
	document.getElementById("image").addEventListener("change", function () {
		var fileInput = this;
		if (fileInput.files.length > 0) {
			var file = fileInput.files[0];
			var allowedImageTypes = ["image/jpeg", "image/jpg", "image/png", "image/webp", "image/avif"];
			var allowedDocumentType = "application/pdf";
			var maxSize = 5 * 1024 * 1024; // 5 MB in bytes 

			if (allowedImageTypes.indexOf(file.type) === -1 && file.type !== allowedDocumentType) {
				alert("Invalid file type. Please select a jpg, jpeg, png, webp, avif or gif file.");
				fileInput.value = ""; // Clear the input 
			} else if (file.size > maxSize) {
				alert("File size exceeds 5 MB. Please select a smaller file.");
				fileInput.value = ""; // Clear the input 
			}
		}
	});
	</script>
		<?php
		ob_end_flush();
		include('Foot.php');
		?>

	</html>