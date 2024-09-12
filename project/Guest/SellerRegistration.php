<?php
session_start();
include("../Assets/Connection/Connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

if (isset($_GET['id'])) {
  $selmail = "select * from tbl_seller where sell_email='" . $_SESSION['semail'] . "'";
  $resmail = $conn->query($selmail);
  $rowmail = $resmail->fetch_assoc();
  mailOTP($rowmail['sell_name'], $_SESSION['semail']);
}

function mailOTP($sellname, $sellemail)
{
  $ran = rand(100000, 999999);
  $_SESSION["token"] = $ran;
  //Email Code Start
  $mail = new PHPMailer(true);

  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'artisanalhelp@gmail.com'; // Your gmail
  $mail->Password = 'lzjtzxpdnkkflamj'; // Your gmail app password
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;

  $mail->setFrom('artisanalhelp@gmail.com'); // Your gmail

  $mail->addAddress($sellemail);

  $mail->isHTML(true);

  $mail->Subject = "Welcome to Artisanal";
  $mail->Body = "Hello " . $sellname . ",<br> Welcome to artisanal, you are one step away from signing up, 
Your one time password to sign in into Artisanal is <b>" . $ran . ".</b> please enter the OTP to complete signing up. After OTP Verfication, Kindly wait for the <b>ID verification to continue and Login</b>.
 <br> <i>  Thank you ❤️ </i><br> for inquiry : artisanalhelp@gmail.com  <br>";
  if ($mail->send()) {
    ?>
    <script>

      alert("Your OTP has been sent to your Email");
      window.location = "OTPregistration.php?emid=2";

    </script>
    <?php
  } else {
    echo "Failed";
  }


}

if (isset($_POST["btnsubmit"])) {
  $_SESSION['semail'] = $_POST["txtemail"];

  $delqry = "delete from tbl_seller where sell_otp_status=0";
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
      $selname = strtoupper($_POST["txtfname"] . " " . $_POST["txtlname"]);
      $selcontact = $_POST["txtcontact"];
      $selemail = strtolower($_POST["txtemail"]);
      $seladd = $_POST["txtaddress"];
      $districtid = $_POST["ddldistrict"];
      $cityid = $_POST["ddlcity"];


      $selphoto = $_FILES["filephoto"]["name"];
      $tempphoto = $_FILES["filephoto"]["tmp_name"];
      move_uploaded_file($tempphoto, '../Assets/File/Seller/SellerPhoto/' . $selphoto);

      $selproof = $_FILES["fileproof"]["name"];
      $tempproof = $_FILES["fileproof"]["tmp_name"];
      move_uploaded_file($tempproof, '../Assets/File/Seller/SellerProof/' . $selproof);



      $insQry = "insert into tbl_seller (sell_name, sell_contact, sell_email, sell_address, city_id, sell_photo, sell_proof, sell_password, sell_doj)values('" . $selname . "','" . $selcontact . "','" . $selemail . "','" . $seladd . "'," . $cityid . ",'" . $selphoto . "','" . $selproof . "','" . $pass . "',curdate())";

      if ($conn->query($insQry)) {
        mailOTP($selname, $selemail);

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
  <title>Seller SIGN UP</title>
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
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data"
      onsubmit="return validateTextarea();">
      <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth px-0" style="background-size: cover; background-repeat: no-repeat;
     background-image: url('../Assets/File/Admin/bg2.jpg');">
            <div class="row w-100 mx-0">
              <div class="col-lg-5 mx-auto">
                <h2>
                  <font color="#fff" face="Georgia, Times New Roman, Times, serif">SELLER SIGN UP</font>
                </h2>
                <div class="auth-form-light text-left py-5 px-4 px-sm-5" style="border-radius: 20px;">

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

                  </div>

                  <div class="form-group">
                    <label for="txtemail">E-mail:</label>
                    <input type="email" class="form-control form-control-lg" id="txtemail" name="txtemail"
                      placeholder="Email" required>
                  </div>

                  <div class="form-group">
                    <label for="txtcontact">Contact:</label>
                    <input type="text" class="form-control form-control-lg" id="txtcontact" name="txtcontact"
                      placeholder="Contact" required pattern="\d{10}" title="Must contain exactly 10 digits.">
                  </div>

                  <div class="form-group">
                    <label for="txtaddress">Address:</label>
                    <textarea class="form-control" name="txtaddress" id="txtaddress" rows="6" placeholder="Address"
                      required></textarea> <span id="error" style="color:#BD0101; font-size: 15px;"></span>
                  </div>

                  <div class="form-group">
                    <label for="ddldistrict">District:</label>
                    <select name="ddldistrict" id="ddldistrict" class="form-control" style="color: #000"
                      onChange="getCity(this.value)" required>
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
                    <select name="ddlcity" id="ddlcity" class="form-control" style="color: #000"
                      onChange="getPin(this.value)" required>
                      <option value="">-----select-----</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="filephoto">Photo:</label>
                    <input type="file" class="form-control" name="filephoto" required id="filephoto" required
                      accept=".jpg, .jpeg, .png, .gif" />
                  </div>
                  <div class="form-group">
                    <label for="fileproof">Proof:</label>
                    <input type="file" class="form-control" name="fileproof" id="fileproof" required
                      accept=".jpg, .jpeg, .png, .pdf" />
                  </div>

                  <div class="form-group">
                    <label for="txtpwd">Password:</label>
                    <div style="display:flex;">
                    <input type="password" class="form-control form-control-lg" id="txtpwd" name="txtpwd"
                      placeholder="Password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,12}$"
                      title="Must contain at least one digit ,one special Character, one UPPERCASE, one lowercase and at least 8 and maximum 12 characters">
                    <button type="button" style="border: 1px solid #ccc;border-left: #fff; background-color:#fff;"
                      id="togglePassword"><i class='mdi mdi-eye-off'></i></button>
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="txtcpwd">Confirm Password:</label>
                    <div style="display:flex;">
                    <input type="password" class="form-control form-control-lg" id="txtcpwd" name="txtcpwd"
                      placeholder="Confirm Password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[\W_]).{8,12}$"
                      title="Must contain at least one digit ,one special Character, one UPPERCASE, and at least 8 and maximum 12 characters">
                      <button type="button" style=" border: 1px solid #ccc;border-left: #fff; background-color:#fff;"
                      id="toggleConfirmPassword"><i class='mdi mdi-eye-off'></i></button>
                    </div>
                  </div>

                  <div class="form-group text-center">
                    <button type="submit" name="btnsubmit" id="btnsubmit"
                      class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                      style="background-color: #234A6F;"> SIGN UP</button>
                    <input type="reset" name="btncancel" id="btncancel" value="Cancel"
                      class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn"
                      style="background-color: #CCCCCC;">
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </form>
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
  document.getElementById("filephoto").addEventListener("change", function () {
    var fileInput = this;


    if (fileInput.files.length > 0) {
      var file = fileInput.files[0];
      var allowedTypes = ["image/jpeg", "image/jpg", "image/png", "image/gif"];
      var maxSize = 5 * 1024 * 1024; // 5 MB in bytes 

      if (allowedTypes.indexOf(file.type) === -1) {
        alert("Invalid file type. Please select a jpg, jpeg, png, or gif file.");
        fileInput.value = ""; // Clear the input 
      } else if (file.size > maxSize) {
        alert("File size exceeds 5 MB. Please select a smaller file.");
        fileInput.value = ""; // Clear the input 
      }
    }
  });

  document.getElementById("fileproof").addEventListener("change", function () {
    var fileInput = this;
    if (fileInput.files.length > 0) {
      var file = fileInput.files[0];
      var allowedImageTypes = ["image/jpeg", "image/jpg", "image/png"];
      var allowedDocumentType = "application/pdf";
      var maxSize = 5 * 1024 * 1024; // 5 MB in bytes 

      if (allowedImageTypes.indexOf(file.type) === -1 && file.type !== allowedDocumentType) {
        alert("Invalid file type. Please select a jpg, jpeg, png, or pdf file.");
        fileInput.value = ""; // Clear the input 
      } else if (file.size > maxSize) {
        alert("File size exceeds 5 MB. Please select a smaller file.");
        fileInput.value = ""; // Clear the input 
      }
    }
  });


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