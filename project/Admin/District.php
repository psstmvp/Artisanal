<?php
ob_start();
include('Head.php');
$districtid = 0;
$districtname = "";
include("../Assets/Connection/Connection.php");
$msg = "";

if (isset($_POST["btnsave"])) {
	$districtname = strtoupper($_POST["txtdname"]);
	$districtid = $_POST["txtid"];
	if ($districtid == 0) {
		$seldis = "select * from tbl_district where district_name='" . $districtname . "'";
		$res = $conn->query($seldis);
		if (!($row = $res->fetch_assoc())) {
			$insQry = "insert into tbl_district(district_name)values('" . $districtname . "')";

			if ($conn->query($insQry)) {
				$msg = "record inserted..";
			} else {
				$msg = "Insertion Failed..";

			}
		} else { ?>
			<script>
				alert("already exist");
				window.location = "District.php"
			</script>
			<?php
		}
	} else {


		$upQry = "update tbl_district set district_name='" . $districtname . "' where district_id=" . $districtid;
		if ($conn->query($upQry)) {
			?>
			<script>
				alert("updated");
				window.location = "District.php"
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
	$delQry = "delete from tbl_district where district_id=" . $_GET['did'];
	$cdelQry = "delete from tbl_city where district_id=" . $_GET['did'];

	if ($conn->query($delQry) && $conn->query($cdelQry)) {
		?>
		<script>
			alert("deleted");
			window.location = "District.php"
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
	$selQry = "select * from tbl_district where district_id=" . $_GET['eid'];
	$resEdit = $conn->query($selQry);
	$rowEdit = $resEdit->fetch_assoc();
	$districtid = $rowEdit["district_id"];
	$districtname = $rowEdit['district_name'];
}

?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>District</title>
	<link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
</head>

<body>
	<div class="content-wrapper">
		<center>

			<form class="forms-sample" id="form1" name="form1" method="post">

				<input type="hidden" name="txtid" value="<?php echo $districtid ?>" />
				<div class="col-lg-6 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Enter District Here..</h4>
							<div class="table-responsive">
								<table class="table table-hover">
									<tr>
										<div class="form-group row">
											<td><label for="txtdname" class="col-sm-3 col-form-label">District
													Name</label></td>
											<div class="col-sm-9">
												<td><input type="text" class="form-control" name="txtdname"
														value="<?php echo $districtname ?>"required pattern="[A-Za-z ]{0,30}"
                      title="Must contain only alphabets and length should be upto 30 characters."></td>
											</div>
										</div>
									</tr>
									<tr>
										<td align="left"><button type="submit" name="btnsave"
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
						<h4 class="card-title">Districts Included</h4>
						<div class="table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th style="text-align:center;">sl.no.</th>
										<th >District name</th>
										<th style="text-align:center;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$selQry = "select * from tbl_district";
									$res = $conn->query($selQry);
									$i = 0;
									while ($row = $res->fetch_assoc()) {
										$i++;
										?>
										<tr>
											<td>
												<?php echo $i; ?>
											</td>
											<td>
												<?php echo $row['district_name']; ?>
											</td>
											<td align="center">
												<a class="btn btn-outline-danger btn-icon-text btn-sm"
													href="District.php?did=<?php echo $row['district_id'] ?>">Delete <i
														class="ti-trash btn-icon-append"></i></a>
												<a class="btn btn-outline-secondary btn-icon-text btn-sm"
													href="District.php?eid=<?php echo $row['district_id'] ?>">Edit <i
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