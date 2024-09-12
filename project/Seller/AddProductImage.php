<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

if (isset($_GET['prid']))
	$_SESSION['proid'] = $_GET['prid'];
if (isset($_POST["btnsubmit"])) {
	$size = $_FILES["filepimg"]["size"];

	$prodimg = $_FILES["filepimg"]["name"];
	$tempphoto = $_FILES["filepimg"]["tmp_name"];
	move_uploaded_file($tempphoto, '../Assets/File/Seller/Products/' . $prodimg);

	$insQry = "insert into tbl_product_gallery (product_img,product_id)
values('" . $prodimg . "','" . $_SESSION['proid'] . "')";
	if ($conn->query($insQry)) {
		?>
		<script>
			alert("image added")
			window.location = "AddProductImage.php";
		</script>
		<?php

	}
}
if (isset($_GET['did'])) {
	$delQry = "delete from tbl_product_gallery where product_gallery_id=" . $_GET['did'];
	if ($conn->query($delQry)) { ?>
		<script>
			alert("deleted");
			window.location = "AddProductImage.php"
		</script>
		<?php
	} else {
		?>
		<script>
			alert("failed");
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
	<title>product images</title>
	<link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
</head>

<body>
	<form method="post" enctype="multipart/form-data">
		<center>
			<div class="content-wrapper">
				<div class="col-lg-7 grid-margin stretch-card" style="margin-bottom:200px;">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">My products</h4>
								<div style="display:flex; flex-wrap: wrap;">
									<?php
									$selprod = "select * from tbl_product where product_id='" . $_SESSION['proid'] . "'";
									$pres = $conn->query($selprod);
									$prow = $pres->fetch_assoc();
									?>
									<div style="padding:5px;">
										<img src="../Assets/File/Seller/Products/<?php echo $prow['prod_img']; ?>"
											width="150px" height="150px">
									</div>

									<?php
									$selQry = "select * from tbl_product_gallery where product_id='" . $_SESSION['proid'] . "'";
									$res = $conn->query($selQry);
									while ($row = $res->fetch_assoc()) {
										?>
										<div style="padding:5px; display:flex;flex-direction:column">
											<img src="../Assets/File/Seller/Products/<?php echo $row['product_img']; ?>"
												width="150px" height="150px">
												<a href="AddProductImage.php?did=<?php echo $row['product_gallery_id'] ?>" style="text-decoration:none">Delete</a>
										</div>
										<?php 
									} ?>
								</div>
							<table border="1" rules="none">
								<tr>
									<td><input type="file" name="filepimg" id="filepimg"  required accept=".jpg, .jpeg, .png, .webp, .avif, .gif" /></td>
									<td><input type="submit" class="btn btn-success" name="btnsubmit" value="add" /></td>
								</tr>
							</table>

						</div>
					</div>
				</div>
			</div>
		</center>

	</form>
	<script>
  document.getElementById("filepimg").addEventListener("change", function () {
    var fileInput = this;
    if (fileInput.files.length > 0) {
      var file = fileInput.files[0];
      var allowedImageTypes = ["image/jpeg", "image/jpg", "image/png", "image/webp", "image/avif"];
      var allowedDocumentType = "application/pdf";
      var maxSize = 10 * 1024 * 1024; // 5 MB in bytes 

      if (allowedImageTypes.indexOf(file.type) === -1 && file.type !== allowedDocumentType) {
        alert("Invalid file type. Please select a jpg, jpeg, png, webp, avif or gif file.");
        fileInput.value = ""; // Clear the input 
      } else if (file.size > maxSize) {
        alert("File size exceeds 10 MB. Please select a smaller file.");
        fileInput.value = ""; // Clear the input 
      }
    }
  });
  </script>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>