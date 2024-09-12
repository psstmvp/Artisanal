<?php
session_start();
include("../Assets/Connection/Connection.php");
$email = $_SESSION['fpe'];
if (isset($_POST["btnsubmit"])) {
  $pass = $_POST["txtnewpwd"];
  $conpass = $_POST["txtconpwd"];

  if ($pass != $conpass) { ?>
    <script>
      alert("new password and confirm password does not match");
    </script>
    <?php
  } else {
    $cusqry = "select *from tbl_customer where cus_email='" . $email . "' and cus_otp_status=1";
    $cusres = $conn->query($cusqry);
    if ($cusrow = $cusres->fetch_assoc()) {
      $upqry = "update tbl_customer set cus_password='" . $pass . "' where cus_email='" . $email . "'";
      $conn->query($upqry);
    }
    $selqry = "select *from tbl_seller where sell_email='" . $email . "' and sell_otp_status=1";
    $res = $conn->query($selqry);
    if ($row = $res->fetch_assoc()) {
      $upqry = "update tbl_seller set sell_password='" . $pass . "' where sell_email='" . $email . "'";
      $conn->query($upqry);
    }
    ?>
    <script>
      alert("password Updated");
      window.location = "Login.php"
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
  <link rel="shortcut icon" href="../A.png">
  <link rel="stylesheet" href="../Assets/CssPages/FeedComp.css" />
  <title>Forgot Password</title>
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

</head>

<body>
  <center>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0" style="background-size: cover;background-repeat: no-repeat;
  background-image: url('../Assets/File/Admin/bg4.png');">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius:20px;">
                <form class="pt-3" method="post" action="">
                  <div class="form-container">

                    <div class="form-group">
                      <label for="txtpwd">New Password</label>
                      <div style="display:flex;">
                        <input type="password" class="form-control form-control-lg" id="txtnewpwd" name="txtnewpwd"
                          placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
                          title="Must contain at least one digit, one UPPERCASE, one lowercase and at least 8 and maximum 12 characters">
                        <button type="button" style="border: 1px solid #ccc;border-left: #fff; background-color:#fff;"
                          id="togglePassword"><i class='mdi mdi-eye-off'></i></button>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="txtpwd">Confirm New Password</label>
                      <div style="display:flex;">
                        <input type="password" class="form-control form-control-lg" id="txtconpwd" name="txtconpwd"
                          placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
                          title="Must contain at least one digit, one UPPERCASE, one lowercase and at least 8 and maximum 12 characters">
                        <button type="button" style="border: 1px solid #ccc;border-left: #fff; background-color:#fff;"
                          id="togglePassword"><i class='mdi mdi-eye-off'></i></button>
                      </div>
                    </div>

                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" style="margin-left:80px;" name=" btnsubmit"
                        id="btnsubmit" value="Update" />
                    </div>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </center>
</body>
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
<script>
  document.getElementById("togglePassword").addEventListener("click", function () {
    const passwordInput = document.getElementById("txtnewpwd");
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      this.innerHTML = "<i class='mdi mdi-eye'></i>";
    } else {
      passwordInput.type = "password";
      this.innerHTML = "<i class='mdi mdi-eye-off'></i>";
    }
  });

  document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
    const confirmPasswordInput = document.getElementById("txtconpwd");
    if (confirmPasswordInput.type === "password") {
      confirmPasswordInput.type = "text";
      this.innerHTML = "<i class='mdi mdi-eye'></i>";
    } else {
      confirmPasswordInput.type = "password";
      this.innerHTML = "<i class='mdi mdi-eye-off'></i>";
    }
  });
</script>

</html>