<?php
include("../Assets/Connection/Connection.php");
$msg="";
if(isset($_POST["btnsubmit"]))
{
 $conpass=$_POST["txtcpwd"];
 $adpass=$_POST["txtpwd"];
 if($conpass!=$adpass)
  {?>
	<script>
		alert("password and confirm password does not match");
		</script>
  <?php
  }
  else
  {
	
	$adminname=strtoupper($_POST["txtfname"]." ".$_POST["txtlname"]);
	$ademail=strtolower($_POST["txtemail"]);
	
	$insQry= "insert into tbl_admin(ad_name,ad_email,ad_password)values('".$adminname."','".$ademail."','".$adpass."')";
	 
	if($conn->query($insQry))
	  {
		?>
		<script>
		alert("Admin Signed Up successfully");
		window.location="../Guest/Login.php"
		</script>
       <?php 
	   }
    }
}
        
?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Artisanal Admin</title>
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
  <link rel="shortcut icon" href="../Assets/Template/Admin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <img style="width: 120px;height: 120px;border-radius: 50%;overflow: hidden; display: block;
            margin: 0 auto;" src="../Assets/File/Admin/A.png" alt="logo"/>
              </div>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="txtfname" placeholder="FirstName" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="txtlname" placeholder="LastName">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="txtemail" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="txtpwd" placeholder="Password"required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="txtcpwd" placeholder="Confirm Password"required>
                </div>
                <div class="mb-4" >
                  <div class="form-check" style="color:#234A6F;">
                    <label class="form-check-label text-muted" >
                      <input type="checkbox" class="form-check-input" >
                      I agree to all Terms & Conditions
                    </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" name="btnsubmit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  style="background-color:#234A6F;">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Already have an account? <a href="../Guest/Login.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
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
  <!-- endinject -->
</body>

</html>
