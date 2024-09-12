<?php
ob_start();
include('Head.php');

include("../Assets/Connection/Connection.php");
$sid = $_SESSION['sid'];
if (isset($_POST["btnsubmit"])) {
  $selqry = "select * from tbl_seller where seller_id=" . $sid . "";
  $res = $conn->query($selqry);
  $row = $res->fetch_assoc();


  $oldpass = $_POST["txtoldpwd"];
  $pass = $_POST["txtnewpwd"];
  $conpass = $_POST["txtconpwd"];

  if (($row['sell_password'] != $oldpass) || ($pass != $conpass)) {
    if ($row['sell_password'] != $oldpass) { ?>
      <script>
        alert("incorrect Old Password");
      </script>
      <?php
    }
    if ($pass != $conpass) { ?>
      <script>
        alert("new password and confirm password does not match");
      </script>
      <?php
    }
  } else {
    $upqry = "update tbl_seller set sell_password='" . $pass . "' where seller_id=" . $sid . "";
    if ($conn->query($upqry)) {
      ?>
      <script>
        alert("password Updated");
        window.location = "SellerMyAccount.php"
      </script>
      <?php
    }
  }
}
?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Change Password</title>
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/mdi/css/materialdesignicons.min.css">
</head>

<body>
  <center>
    <div class="content-wrapper" >
      <form id="form1" name="form1" method="post" action="">
        <div class="col-lg-6 grid-margin stretch-card" style="margin-bottom:180px">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="color:#234A6F;font-size:23px;">Change Password</h4>
              <div class="form-container">

                <div class="form-group">
                  <div style="text-align:left;">
                    <label for="txtoldpwd">Old Password</label>
                  </div>
                  <div style="display:flex;">
                    <input type="password" class="form-control form-control-lg" id="txtoldpwd" name="txtoldpwd"
                      placeholder="Password">
                    <button type="button" style="border: 1px solid #ccc;border-left: #fff; background-color:#fff;"
                      id="toggleoldPassword"><i class='mdi mdi-eye-off'></i></button>
                  </div>
                </div>

                <div class="form-group">
                  <div style="text-align:left;">
                    <label for="txtnewpwd">New Password</label>
                  </div>

                  <div style="display:flex;">
                    <input type="password" class="form-control form-control-lg" id="txtnewpwd" name="txtnewpwd"
                      placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
                      title="Must contain at least one digit, one UPPERCASE, one lowercase and at least 8 and maximum 12 characters">
                    <button type="button" style="border: 1px solid #ccc;border-left: #fff; background-color:#fff;"
                      id="togglenewPassword"><i class='mdi mdi-eye-off'></i></button>
                  </div>
                </div>

                <div class="form-group">
                  <div style="text-align:left;">
                    <label for="txtconpwd">Confirm New Password</label>
                  </div>
                  <div style="display:flex;">
                    <input type="password" class="form-control form-control-lg" id="txtconpwd" name="txtconpwd"
                      placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
                      title="Must contain at least one digit, one UPPERCASE, one lowercase and at least 8 and maximum 12 characters">
                    <button type="button" style="border: 1px solid #ccc;border-left: #fff; background-color:#fff;"
                      id="toggleconPassword"><i class='mdi mdi-eye-off'></i></button>
                  </div>
                </div>

                <div class="form-group" style="margin:15px;text-align:center;">
                  <input type="submit" class="btn btn-primary" style="background-color:#2865AF;" name="btnsubmit"
                    id="btnsubmit" value="Change" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

  </center>
  <script>
    document.getElementById("toggleoldPassword").addEventListener("click", function () {
      const passwordInput = document.getElementById("txtoldpwd");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        this.innerHTML = "<i class='mdi mdi-eye'></i>";
      } else {
        passwordInput.type = "password";
        this.innerHTML = "<i class='mdi mdi-eye-off'></i>";
      }
    });

    document.getElementById("togglenewPassword").addEventListener("click", function () {
      const passwordInput = document.getElementById("txtnewpwd");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        this.innerHTML = "<i class='mdi mdi-eye'></i>";
      } else {
        passwordInput.type = "password";
        this.innerHTML = "<i class='mdi mdi-eye-off'></i>";
      }
    });

    document.getElementById("toggleconPassword").addEventListener("click", function () {
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
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>