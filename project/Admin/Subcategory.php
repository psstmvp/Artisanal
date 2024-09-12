<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$scatname ="";
$scatid = 0;
$cateid=0;

$msg = "";
if (isset($_POST["btnsave"])) {
	$scatname = strtoupper($_POST["txtsubname"]);
	$scatid = $_POST["txtid"];
	$catid = $_POST["selcategory"];
	if ($scatid == 0) {
		$selscat = "select * from tbl_subcategory where subcat_name='" . $scatname . "'";
		$res = $conn->query($selscat);
		if (!($row = $res->fetch_assoc())) {
		$insQry = "insert into tbl_subcategory(subcat_name,category_id)values('" . $scatname . "'," . $catid . ")";

		if ($conn->query($insQry)) {
			?>
				<script>
					alert(" inserted");
					window.location = "Subcategory.php"
				</script>
				<?php
			} else {
				?>
				<script>
					alert("Insertion failed");
					window.location = "Subcategory.php"
				</script>
				<?php
			}
		} else { ?>
			<script>
				alert("already exist");
				window.location = "Subcategory.php"
			</script>
			<?php
		}
	} else {

		$upQry = "update tbl_subcategory set subcat_name='" . $scatname . "' where subcat_id=" . $scatid;
		if ($conn->query($upQry)) {
			?>
			<script>
				alert("updated");
				window.location = "Subcategory.php"
			</script>
			<?php
		} else {
			?>
			<script>
				alert("Updation failed");
			</script>
			<?php
		}


	}

}

if (isset($_GET['did'])) {
	$delQry = "delete from tbl_subcategory where subcat_id=" . $_GET['did'];
	if ($conn->query($delQry)) { ?>
		<script>
			alert("deleted");
			window.location = "Subcategory.php"
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

if (isset($_GET['eid'])) {
	$selQry = "select * from tbl_subcategory where subcat_id=" . $_GET['eid'];
	$resEdit = $conn->query($selQry);
	$rowEdit = $resEdit->fetch_assoc();
	$scatid = $rowEdit["subcat_id"];
	$scatname = $rowEdit["subcat_name"];
	$cateid= $rowEdit["category_id"];
}

?>


<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Subcategory</title>
	<link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
</head>

<body>

	<div class="content-wrapper">
		<center>
			<form class="forms-sample" id="form1" name="form1" method="post">

				<input type="hidden" name="txtid" value="<?php echo $scatid ?>" />
				<div class="col-lg-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Enter SubCategory Here..</h4>
							<div class="table-responsive">
								<table class="table table-hover">
									<tr>
										<div class="form-group row">
											<td><label for="txtcategory"
													class="col-sm-3 col-form-label">Category</label></td>
											<div class="col-sm-9">
												<td width="174">
												<select name="selcategory" onChange="displaysubcat(this.value)"
														required>
														<option value="">------select------</option>
														<?php
														$selcat = "select * from tbl_category";
														$reslt = $conn->query($selcat);
														while ($row = $reslt->fetch_assoc()) { ?>
															<option 
															<?php if($cateid== $row['category_id']) {?>
																selected
																<?php }?>
															value="<?php echo $row['category_id'] ?>">
																<?php echo $row['category_name'] ?>
															</option>
														<?php } ?>
													</select>
												</td>
											</div>
										</div>
									</tr>

									<tr>
										<div class="form-group row">
											<td><label for="txtsubname" class="col-sm-3 col-form-label">subcategory
												</label></td>
											<div class="col-sm-9">
												<td><input type="text"  name="txtsubname" class="form-control"
														id="txtsubname" value="<?php echo $scatname ?>" required pattern="[A-Za-z ]{0,30}"
                      title="Must contain only alphabets and length should be upto 30 characters.">
											</div>
										</div>
									</tr>

									<tr>
										<td align="left"><button type="submit" name="btnsave"
												class="btn btn-outline-primary btn-fw">Save</button></td>
										<td align="right"><button type="reset" name="btncancel"
												class="btn btn-outline-secondary btn-fw">Cancel</button></td>
									</tr>

								</table>
							</div>
						</div>
					</div>
				</div>


			</form>
		</center>

		<center>
			<div class="col-lg-10 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Sub Categories Included</h4>
						<div class="table-responsive">
							<table class="table table-hover" >
								<td id="subcat">Select a Category</td>
									
							</table>
						</div>
					</div>
				</div>
			</div>
	</div>
	</center>
	<script src="../Assets/JQ/jQuery.js "></script>
	<script>
		function displaysubcat(catid) {
			$.ajax({
				url: "../Assets/AjaxPages/AjaxSubcatDisplay.php?ctid=" + catid,
				success: function (html) {
					$("#subcat").html(html);
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