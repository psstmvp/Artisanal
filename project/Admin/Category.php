<?php
ob_start();
include('Head.php');
$catname = "";
$catid = 0;
include("../Assets/Connection/Connection.php");
$msg = "";
if (isset($_POST["btnsubmit"])) {

	$catname = strtoupper($_POST["txtcategory"]);
	$catid = $_POST["txtid"];
	if ($catid == 0) {
		$selcat = "select * from tbl_category where category_name='" . $catname . "'";
		$res = $conn->query($selcat);
		if (!($row = $res->fetch_assoc())) {
			$insQry = "insert into tbl_category(category_name)values('" . $catname . "')";

			if ($conn->query($insQry)) {
				$msg = "record inserted..";
			} else {
				$msg = "Insertion Failed..";

			}
		} else { ?>
			<script>
				alert("already exist");
				window.location = "Category.php"
			</script>
			<?php
		}

	} else {

		$upQry = "update tbl_category set category_name='" . $catname . "' where category_id=" . $catid;
		if ($conn->query($upQry)) {
			?>
			<script>
				alert("updated");
				window.location = "Category.php"
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
}
?>


<?php
if (isset($_GET['did'])) {
	$delQry = "delete from tbl_category where category_id=" . $_GET['did'];
	$sdelQry = "delete from tbl_subcategory where category_id=" . $_GET['did'];
	if ($conn->query($delQry) && $conn->query($sdelQry)) { ?>
		<script>
			alert("deleted");
			window.location = "Category.php"
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

<?php
if (isset($_GET['eid'])) {
	$selQry = "select * from tbl_category where  category_ID=" . $_GET['eid'];
	$resEdit = $conn->query($selQry);
	$rowEdit = $resEdit->fetch_assoc();
	$catid = $rowEdit["category_id"];
	$catname = $rowEdit["category_name"];
}

?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Category</title>
	<link rel="stylesheet" href="../../vendors/select2/select2.min.css">
	<link rel="stylesheet" href="../../vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
	<link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
</head>

<body>
	<div class="content-wrapper">
		<center>


			<form class="forms-sample" id="form1" name="form1" method="post">

				<input type="hidden" name="txtid" value="<?php echo $catid ?>" />
				<div class="col-lg-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Enter Category Here..</h4>
							<div class="table-responsive">
								<table class="table table-hover">
									<tr>
										<div class="form-group row">
											<td><label for="txtcategory" class="col-sm-3 col-form-label">Category
													Name</label></td>
											<div class="col-sm-9">
												<td><input type="text" class="form-control" name="txtcategory"
														value="<?php echo $catname ?>" required pattern="[A-Za-z ]{0,30}"
                      title="Must contain only alphabets and length should be upto 30 characters."></td>
											</div>
										</div>
									</tr>
									<tr>
										<td align="left"><button type="submit" name="btnsubmit"
												class="btn btn-outline-primary btn-fw">Save</button></td>
										<td align="right"><button type="reset" name="btncancel"
												class="btn btn-outline-secondary btn-fw">Cancel</button></td>
									</tr>
									<tr>
										<td colspan="2" align="center">
											<?php echo $msg ?>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>


			</form>
		</center>
		<center>
			<div class="col-lg-8 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Categories Included</h4>
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>

									<tr>
										<th style="text-align:center;">sl.no.</th>
										<th style="text-align:center;">Category name</th>
										<th style="text-align:center;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$selQry = "select * from tbl_category";
									$res = $conn->query($selQry);
									$i = 0;
									while ($row = $res->fetch_assoc()) {
										$i++;
										?>
										<tr>
											<td align="center">
												<?php echo $i; ?>
											</td>
											<td align="center">
												<?php echo $row['category_name']; ?>
											</td>
											<td align="center">
												<a class="btn btn-outline-danger btn-icon-text btn-sm"
													href="Category.php?did=<?php echo $row['category_id'] ?>">Delete <i
														class="ti-trash btn-icon-append"></i></a>
												<a class="btn btn-outline-secondary btn-icon-text btn-sm"
													href="Category.php?eid=<?php echo $row['category_id'] ?>">Edit <i
														class="ti-file btn-icon-append"></i></a>
											</td>
										</tr>
										<?php
									}
									?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</center>

	</div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>