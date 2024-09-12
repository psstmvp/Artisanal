<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$cname = "";
$pincode = "";
$distid=0;
$cityid = 0;

if (isset($_POST["btnsubmit"])) {
	$cname = strtoupper($_POST["txtcname"]);
	$cityid = $_POST["txtid"];
	$pincode = $_POST["txtpin"];
	$districtid = $_POST["seldistrict"];
	if ($cityid == 0) {
		$selcit = "select * from tbl_city where city_name='" . $cname . "' and pincode='" . $pincode . "' ";
		$res = $conn->query($selcit);
		if (!($row = $res->fetch_assoc())) {
			$insQry = "insert into tbl_city(city_name,pincode,district_id)values('" . $cname . "','" . $pincode . "'," . $districtid . ")";

			if ($conn->query($insQry)) {

				?>
				<script>
					alert("City inserted");
					window.location = "City.php"
				</script>
				<?php
			} else {
				?>
				<script>
					alert("Insertion failed");
					window.location = "City.php"
				</script>
				<?php
			}
		} else { ?>
			<script>
				alert("already exist");
				window.location = "City.php"
			</script>
			<?php
		}

	} else {

		$upQry = "update tbl_city set city_name='" . $cname . "',pincode='" . $pincode . "',district_id='" . $districtid . "' where city_id=" . $cityid;
		if ($conn->query($upQry)) {
			?>
			<script>
				alert("updated");
				window.location = "City.php"
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

if (isset($_GET['did'])) {
	$delQry = "delete from tbl_city where city_id=" . $_GET['did'];
	if ($conn->query($delQry)) { ?>
		<script>
			alert("deleted");
			window.location = "City.php"
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
	$selQry = "select * from tbl_city c where city_id=" . $_GET['eid'];
	$resEdit = $conn->query($selQry);
	$rowEdit = $resEdit->fetch_assoc();
	$cityid = $rowEdit["city_id"];
	$cname = $rowEdit["city_name"];
	$pincode = $rowEdit["pincode"];
	$distid = $rowEdit["district_id"];
}

?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>City</title>
	<link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
</head>

<body>
<div class="content-wrapper">
	<center>
	<form class="forms-sample" id="form1" name="form1" method="post">

		<input type="hidden" name="txtid" value="<?php echo $cityid ?>" />
		<div class="col-lg-6 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Enter City Here..</h4>
					<div class="table-responsive">
						<table class="table table-hover">

							<tr>
								<div class="form-group row">
									<td><label for="txtcategory" class="col-sm-3 col-form-label">district</label></td>
									<div class="col-sm-9">
										<td width="174"><select name="seldistrict" onChange="displayCity(this.value)"
												required>

												<option value="">------select------</option>	
												<?php
												$seldis = "select *from tbl_district";
												$reslt = $conn->query($seldis);
												while ($row = $reslt->fetch_assoc()) {?>
													<option 
													<?php
													if($row['district_id']==$distid)
													{?> 
													selected <?php
												    }?>
													 value="<?php echo $row['district_id'] ?>">
														<?php echo $row['district_name'] ?>
													</option>
												<?php } 
												?>
											</select>
										</td>
									</div>
								</div>
							</tr>

							<tr>
								<div class="form-group row">
									<td><label for="txtcname" class="col-sm-3 col-form-label">City </label></td>
									<div class="col-sm-9">
										<td><input type="text" class="form-control" name="txtcname" id="txtpcame"
												value="<?php echo $cname ?>" required required pattern="[A-Za-z ]{0,40}"
                      title="Must contain only alphabets and length should be upto 40 characters.">
									</div>
								</div>
							</tr>

							
							<tr>
								<div class="form-group row">
									<td><label for="txtdistrict" class="col-sm-3 col-form-label">pincode</label></td>
									<div class="col-sm-9">
										<td><input type="text" class="form-control" name="txtpin" id="txtpin"
												value="<?php echo $pincode ?>" required required pattern="\d{6}"
                      title="Must contain 6 digits and only digits."></td>
									</div>
								</div>
							</tr>


							
							<tr>
								<td align="left"><button type="submit" name="btnsubmit"
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
					<h4 class="card-title">Cities Included</h4>
					<div class="table-responsive">
						<table class="table table-hover" id="citydis">
							<td>select a district </td>
						</table>
					</div>
				</div>
			</div>
		</div>
	</center>
</div>

	<script src="../Assets/JQ/jQuery.js "></script>
	<script>
		function displayCity(disid) {
			$.ajax({
				url: "../Assets/AjaxPages/AjaxCityDisplay.php?ddid=" + disid,
				success: function (html) {
					$("#citydis").html(html);
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