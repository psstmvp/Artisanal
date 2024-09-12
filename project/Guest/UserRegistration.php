<?php
session_start();
include("../Assets/Connection/Connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

if (isset($_GET['id'])) {
  $selmail = "select * from tbl_customer where cus_email='" . $_SESSION['email'] . "'";
  $resmail = $conn->query($selmail);
  $rowmail = $resmail->fetch_assoc();
  mailOTP($rowmail['cus_name'], $_SESSION['email']);
}

function mailOTP($cusname, $cusemail)
{
  $ran = rand(100000, 999999);
  $_SESSION["token"] = $ran;
  //Email Code Start
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = ''; // Your gmail
  $mail->Password = ''; // Your gmail app password
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom('artisanalhelp@gmail.com'); // Your gmail

  $mail->addAddress($cusemail);

  $mail->isHTML(true);

  $mail->Subject = "Welcome to Artisanal";
  $mail->Body = "Hello " . $cusname . ",<br> Welcome to artisanal, you are one step away from signing up, 
Your one time password to sign in into Artisanal is <b>" . $ran . ".</b> please enter the OTP to complete signing up. Hope you will have a wonderful shopping experience. 
We always try our best to provide customers with only the best. <br> Thank you ❤️";
  if ($mail->send()) {
    ?>
    <script>

      alert("Your OTP has been sent to your Email");
      window.location = "OTPregistration.php?emid=1";

    </script>
    <?php
  } else {
    echo "Failed";
  }


}

if (isset($_POST["btnsubmit"])) {

  $_SESSION['email'] = $_POST["txtemail"];
  $delqry = "delete from tbl_customer where cus_otp_status=0";
  $conn->query($delqry);
  $selqry = "select *from tbl_seller where sell_email='" . $_POST["txtemail"] . "' and sell_otp_status=1";
  $res = $conn->query($selqry);
  $cusqry = "select *from tbl_customer where cus_email='" . $_POST["txtemail"] . "' and cus_otp_status=1";
  $cusres = $conn->query($cusqry);
  if ($row = $res->fetch_assoc() || $cusrow = $cusres->fetch_assoc()) {
    ?>
    <script>
      alert("account already exist with given email");
    </script>
    <?php
  } else {
    $conpass = $_POST["txtcpwd"];
    $pass = $_POST["txtpwd"];
    if ($conpass != $pass) { ?>
      <script>
        alert("password and confirm password does not match");
      </script>
      <?php
    } else {
      $cusname = strtoupper($_POST["txtfname"] . " " . $_POST["txtlname"]);
      $cuscontact = $_POST["txtcontact"];
      $cusemail = strtolower($_POST["txtemail"]);
      $cusdob = $_POST["txtdob"];
      $cusadd = $_POST["txtaddress"];
      $cusgender = $_POST["btngender"];
      $districtid = $_POST["ddldistrict"];
      $cityid = $_POST["ddlcity"];

      $cusphoto = "default.jpg";

      $insQry = "insert into tbl_customer(cus_name,cus_email,cus_dob,cus_contact,cus_address,cus_gender,city_id,cus_photo,cus_password)values('" . $cusname . "','" . $cusemail . "','" . $cusdob . "','" . $cuscontact . "','" . $cusadd . "','" . $cusgender . "'," . $cityid . ",'" . $cusphoto . "','" . $pass . "')";

      if ($conn->query($insQry)) {
        mailOTP($cusname, $cusemail);

      }
    }
  }
}
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>SIGN UP</title>
  <link rel="shortcut icon" href="../A.png">
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
  <style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
</head>

<body>

  <center>

    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0" style="background-size: cover;background-repeat: no-repeat;
  background-image: url('../Assets/File/Admin/bg2.jpg');">>

          <div class="row w-100 mx-0">
            <div class="col-lg-5 mx-auto">
              <h2>
                <font color="#fff" face="Georgia, Times New Roman, Times, serif">SIGN UP
              </h2>
              </font>
              <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius:20px;">
                <div class="brand-logo">
                  <img
                    style="width: 120px; height: 120px; border-radius: 50%; overflow: hidden; display: block; margin: 0 auto;"
                    src="../Assets/File/Admin/A.png" alt="logo" />
                </div>
                <form id="form1" name="form1" method="post" onsubmit="return validateTextarea();"
                  action="UserRegistration.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="txtfname">First Name:</label>
                    <input type="text" class="form-control form-control-lg" id="txtfname" name="txtfname"
                      placeholder="First Name" required pattern="[A-Za-z ]{2,30}"
                      title="Must contain only alphabets and length should be between 2 - 30 characters.">
                  </div>
                  <div class="form-group">
                    <label for="txtlname">Last Name:</label>
                    <input type="text" class="form-control form-control-lg" id="txtlname" name="txtlname"
                      placeholder="Last Name" pattern="[A-Za-z ]{0,30}"
                      title="Must contain only alphabets and length should be upto 30 characters.">

                    <div class="form-group">
                      <label for="txtemail">E-mail:</label>
                      <input type="email" class="form-control form-control-lg" id="txtemail" name="txtemail"
                        placeholder="Email" required />
                    </div>
                    <div class="form-group">
                      <label for="txtcontact">Contact:</label>
                      <input type="text" class="form-control form-control-lg" id="txtcontact" name="txtcontact"
                        placeholder="Contact" required pattern="\d{10}" title="Must contain exactly 10 digits.">
                    </div>
                    <div class="form-group">
                      <label for="txtdob">DOB:</label>
                      <input type="date" class="form-control form-control-lg" id="txtdob" name="txtdob"
                        placeholder="Date of Birth" required />
                    </div>
                    <div class="form-group">
                      <label>Gender:</label>
                      <div>
                        <input type="radio" name="btngender" value="Male" checked> Male
                        <input type="radio" name="btngender" value="Female"> Female
                        <input type="radio" name="btngender" value="others"> Others
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="txtaddress">Address:</label>
                      <textarea class="form-control" name="txtaddress" id="txtaddress" rows="6" cols="20"
                        placeholder="Address" required></textarea><span id="error"
                        style="color:#BD0101; font-size: 15px;"></span>
                    </div>
                    <div class="form-group">
                      <label for="ddldistrict">District:</label>
                      <select name="ddldistrict" id="ddldistrict" onChange="getCity(this.value)" class="form-control"
                        style="color: #000" required>
                        <option value="">-----select-----</option>
                        <?php
                        $dselqry = "select * from tbl_district";
                        $dreslt = $conn->query($dselqry);
                        while ($drow = $dreslt->fetch_assoc()) {
                          ?>
                          <option value="<?php echo $drow['district_id'] ?>">
                            <?php echo $drow['district_name'] ?>
                          </option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="ddlcity">City:</label>
                      <select name="ddlcity" id="ddlcity" onChange="getPin(this.value)" class="form-control"
                        style="color: #000" required>
                        <option value="">-----select-----</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="txtpwd">Password:</label>
                      <div class="input-group">
                        <input type="password" class="form-control form-control-lg" id="txtpwd" name="txtpwd"
                          placeholder="Password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,12}$"
                          title="Must contain at least one digit ,one special Character, one UPPERCASE, one lowercase and at least 8 and maximum 12 characters">
                        <div class="input-group-append">
                          <button type="button" style=" border: 1px solid #ccc;border-left: #fff; background-color:#fff;"
                           id="togglePassword"><i class='mdi mdi-eye-off'></i></button>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="txtcpwd">Confirm Password:</label>
                      <div class="input-group">
                        <input type="password" class="form-control form-control-lg" id="txtcpwd" name="txtcpwd"
                          placeholder="Confirm Password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,12}$"
                          title="Must contain at least one digit,one special Character, one UPPERCASE, one lowercase and at least 8 and maximum 12 characters">
                        <div class="input-group-append">
                          <button type="button" style=" border: 1px solid #ccc;border-left: #fff; background-color:#fff;"
                            id="toggleConfirmPassword"><i class='mdi mdi-eye-off'></i></button>
                        </div>
                      </div>
                    </div>

                    <div class="form-group text-center">
                      <input type="submit" name="btnsubmit" id="btnsubmit" value="SIGN UP"
                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                        style="background-color: #234A6F;" />
                      <input type="reset" name="btncancel" id="btncancel" value="Cancel"
                        class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn"
                        style="background-color: #CCCCCC;" />
                    </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </center>
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
</body>
<script src="../Assets/JQ/jQuery.js "></script>
<script>
  function getCity(ddid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxCity.php?pid=" + ddid,
      success: function (html) {
        $("#ddlcity").html(html);
      }
    });
  }
  function getPin(ctid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPincode.php?cid=" + ctid,
      success: function (html) {
        $("#pincode").html(html);
      }
    });
  }
</script>


<script>
  const dobInput = document.getElementById("txtdob");
  dobInput.addEventListener("change", function () {
    const selectedDate = new Date(dobInput.value);
    const today = new Date();
    const age = today.getFullYear() - selectedDate.getFullYear();

    // Check if the user is at least 18 years old 
    if (selectedDate > today || age < 15) {
      alert("You must be at least 15 years old.");
      dobInput.value = ""; // Clear the input field 
    } else {
      document.getElementById("dobError").textContent = "";
    }
  });

  // Function to disable past dates 
  function disablePastDates() {
    const today = new Date().toISOString().split('T')[0];
    dobInput.setAttribute('max', today);
  }

  disablePastDates();


  function validateTextarea() {
    const textarea = document.getElementById('txtaddress');
    const error = document.getElementById('error');

    // Define a regular expression pattern to allow only alphabets and spaces
    const pattern = /^[A-Za-z0-9,.\n ]+$/;

    // Check if the input matches the pattern
    if (pattern.test(textarea.value)) {
      error.textContent = ''; // Clear any previous error message
      return true; // Allow form submission
    } else {
      error.textContent = 'Only alphabets, numbers, white space, comma, and dot are allowed. Line breaks are also accepted.';
      return false; // Prevent form submission
    }
  }

  document.getElementById("togglePassword").addEventListener("click", function () {
  const passwordInput = document.getElementById("txtpwd");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    this.innerHTML = "<i class='mdi mdi-eye'></i>";
  } else {
    passwordInput.type = "password";
    this.innerHTML = "<i class='mdi mdi-eye-off'></i>";
  }
});

document.getElementById("toggleConfirmPassword").addEventListener("click", function () {
    const confirmPasswordInput = document.getElementById("txtcpwd");
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
