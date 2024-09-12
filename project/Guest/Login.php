
<?php
      
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST['btnlogin']))
{
$email=$_POST["txtemail"];
$pass=$_POST["txtpass"];
$admin="select * from tbl_admin where ad_email='".$email."' and ad_password='".$pass."'";
$seller="select * from tbl_seller where sell_email='".$email."' and sell_password='".$pass."'";
$user="select * from tbl_customer where cus_email='".$email."' and cus_password='".$pass."'";
$resadmin=$conn->query($admin);
$resseller=$conn->query($seller);
$resuser=$conn->query($user);

if($resadmin->num_rows>0)
   {
	$row=$resadmin->fetch_assoc();
	$_SESSION['aid']=$row['admin_id'];
	$_SESSION['aname']=$row['ad_name'];
	header("location:../Admin/AdminHome.php");
	}
else if($resseller->num_rows>0)
  {
	$row=$resseller->fetch_assoc();
	$_SESSION['sid']=$row['seller_id'];
	$_SESSION['sname']=$row['sell_name'];
	$stat=$row['sell_ver_status'];
	if($stat==1 && $row['sell_otp_status'])
	{
	header("location:../Seller/SellerHome.php");
	}else if($stat==2)
	{?>
    <script>
	alert("YOUR SIGN-IN REQUEST IS REJECTED \n for inquiry contact: artisanalhelp@gmail.com");
	</script>
	<?php
    }
  }
else if($resuser->num_rows>0)
{
	$row=$resuser->fetch_assoc();
	$_SESSION['uid']=$row['customer_id'];
	$_SESSION['uname']=$row['cus_name'];
	if($row['cus_otp_status']==1)
	header("location:../Customer/HomePage.php");
	}
else{
	?>
	<script>
	alert("User not Found");
	</script>
<?php }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>login</title>
<link rel="shortcut icon" href="../A.png">
  <!-- plugins:css -->
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/mdi/css/materialdesignicons.min.css">

  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../Assets/Template/Admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
</head>

<body >

<center>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0"style="background-size: cover;background-repeat: no-repeat;
	background-image: url('../Assets/File/Admin/bg11.jpg');">
      <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius:20px; height:600px">
            <div class="brand-logo" style="margin-bottom:0px;">
              <img style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; display: block; margin: 0 auto;" src="../Assets/File/Admin/Artisanal_logo.gif" alt="logo" />
            </div>
            <form class="pt-3" method="post" action="">
              <div class="form-group">
                <label for="txtemail">E-mail</label>
                <input type="email" class="form-control form-control-lg" id="txtemail" name="txtemail" placeholder="Email" required>
              </div>
              <div class="form-group">
                <label for="txtpass">Password</label>
                <div style="display:flex;">
                <input type="password" class="form-control form-control-lg" id="txtpass" name="txtpass" placeholder="Password" required>
                <button type="button" style=" border: 1px solid #ccc;border-left: #fff; background-color:#fff;"
                      id="togglePassword"><i class='mdi mdi-eye-off'></i></button>
                </div>
              </div>
              <div class="mt-3">
                <button type="submit" name="btnlogin" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" style="background-color:#234A6F;">LOGIN</button>
              </div>
            </form>
            <div class="text-center mt-4 font-weight-light">
              NEW USER? <a href="UserRegistration.php" class="text-primary">Sign Up</a>
            </div>
            <div class="text-center mt-2 font-weight-light">
              Want to SIGN IN as a seller? <a href="SellerRegistration.php" class="text-primary"><br>SELLER SIGN IN</a>
            </div>
            <div class="text-center mt-2 font-weight-light">
              <a href="ForgotPassword.php" class="text-primary">Forgot Password?</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</center>
<script>
document.getElementById("togglePassword").addEventListener("click", function () {
  const passwordInput = document.getElementById("txtpass");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    this.innerHTML = "<i class='mdi mdi-eye'></i>";
  } else {
    passwordInput.type = "password";
    this.innerHTML = "<i class='mdi mdi-eye-off'></i>";
  }
});
</script>
<script src="../Assets/Template/Admin/vendors/js/vendor.bundle.base.js"></script>

  <script src="../Assets/Template/Admin/js/off-canvas.js"></script>
  <script src="../Assets/Template/Admin/js/hoverable-collapse.js"></script>
  <script src="../Assets/Template/Admin/js/template.js"></script>
  <script src="../Assets/Template/Admin/js/settings.js"></script>
  <script src="../Assets/Template/Admin/js/todolist.js"></script>
</body>
</html>