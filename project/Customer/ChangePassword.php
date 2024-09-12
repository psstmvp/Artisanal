<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$uid = $_SESSION['uid'];
if (isset($_POST["btnsubmit"])) {
  $selqry = "select * from tbl_customer where customer_id='" . $uid . "'";
  $res = $conn->query($selqry);
  $row = $res->fetch_assoc();

  $oldpass = $_POST["txtoldpwd"];
  $pass = $_POST["txtnewpwd"];
  $conpass = $_POST["txtconpwd"];
  if (($row['cus_password'] != $oldpass) || ($pass != $conpass)) {
    if ($row['cus_password'] != $oldpass) { ?>
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
    $upqry = "update tbl_customer set cus_password='" . $pass . "' where customer_id='" . $uid . "'";
    if ($conn->query($upqry)) {
      ?>
      <script>
        alert("password Updated");
        window.location = "MyAccount.php"
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
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Change Password</title>
  <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
  <link rel="stylesheet" href="../Assets/Template/Admin/vendors/mdi/css/materialdesignicons.min.css">
  <style>
    .container-account {
      width: 470px;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      margin-top: 70px;
    }
    td{
      border-spacing:6px;
    }
  </style>
</head>

<body>
  <form id="form1" name="form1" method="post" action="">
    <center>
      <div class="container-account"style="padding: 45px">
          
          
              <h4 class="card-title" style="color:#234A6F;font-size:23px;">Change Password</h4>
              <div class="form-container">

                <div class="form-group">
                  <div style="text-align:left;">
                    <label for="txtoldpwd">Old Password</label>
                  </div>
                  <div style="display:flex;">
                    <input type="password" class="form-control"  id="txtoldpwd" name="txtoldpwd"
                      placeholder="Password" >
                    <button type="button" style="border: 1px solid #ccc;border-left: #fff; background-color:#fff; padding:3px;"
                      id="toggleOldPassword"><i class='mdi mdi-eye-off'></i></button>
                  </div>
                </div>

                <div class="form-group">
                  <div style="text-align:left;">
                    <label for="txtnewpwd">New Password</label>
                  </div>

                  <div style="display:flex;">
                    <input type="password" class="form-control" id="txtnewpwd" name="txtnewpwd"
                      placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
                      title="Must contain at least one digit, one UPPERCASE, one lowercase and at least 8 and maximum 12 characters">
                    <button type="button" style="border: 1px solid #ccc;border-left: #fff; background-color:#fff; padding:3px;"
                      id="toggleNewPassword"><i class='mdi mdi-eye-off'></i></button>
                  </div>
                </div>

                <div class="form-group">
                  <div style="text-align:left;">
                    <label for="txtconpwd">Confirm New Password</label>
                  </div>
                  <div style="display:flex;">
                    <input type="password" class="form-control" id="txtconpwd" name="txtconpwd"
                      placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,12}"
                      title="Must contain at least one digit, one UPPERCASE, one lowercase and at least 8 and maximum 12 characters">
                    <button type="button" style="border: 1px solid #ccc;border-left: #fff; background-color:#fff; padding:3px;"
                      id="toggleConPassword"><i class='mdi mdi-eye-off'></i></button>
                  </div>
                </div>

                <div class="form-group" style="margin:15px;text-align:center;">
                  <input type="submit" class="btn btn-primary" style="background-color:#2865AF; border-radius:20px" name="btnsubmit"
                    id="btnsubmit" value="Change" />
                </div>
              </div>
           
 
      </div>
    </center>

  </form>
  <script>
document.getElementById("toggleOldPassword").addEventListener("click", function () {
  const passwordInput = document.getElementById("txtoldpwd");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    this.innerHTML = "<i class='mdi mdi-eye'></i>";
  } else {
    passwordInput.type = "password";
    this.innerHTML = "<i class='mdi mdi-eye-off'></i>";
  }
});

document.getElementById("toggleNewPassword").addEventListener("click", function () {
  const passwordInput = document.getElementById("txtnewpwd");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    this.innerHTML = "<i class='mdi mdi-eye'></i>";
  } else {
    passwordInput.type = "password";
    this.innerHTML = "<i class='mdi mdi-eye-off'></i>";
  }
});


document.getElementById("toggleConPassword").addEventListener("click", function () {
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