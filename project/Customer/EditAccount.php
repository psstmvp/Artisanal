<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$cusid = $_SESSION['uid'];

if (isset($_POST['btnupdate'])) {
  $cusname = strtoupper($_POST["txtname"]);
  $cuscontact = $_POST["txtcontact"];
  $cusemail = strtolower($_POST["txtemail"]);
  $cusdob = $_POST["txtdob"];
  $cusadd = $_POST["txtaddress"];
  $cityid = $_POST["ddlcity"];

  if (file_exists($_FILES['filephoto']["tmp_name"])) {
    $cusphoto = $_FILES["filephoto"]["name"];
    $tempphoto = $_FILES["filephoto"]["tmp_name"];
    move_uploaded_file($tempphoto, '../Assets/File/Customer/' . $cusphoto);

    $photoUpQry = "update tbl_customer set cus_photo='" . $cusphoto . "' where customer_id='" . $cusid . "'";
    $conn->query($photoUpQry);
  }

  $upQry = "update tbl_customer set cus_name='" . $cusname . "',cus_dob='" . $cusdob . "',cus_contact='" . $cuscontact . "',cus_address='" . $cusadd . "', city_id='" . $cityid . "' where customer_id='" . $cusid . "'";

  if ($conn->query($upQry)) {
    ?>
    <script>
      alert("updated");
      window.location = "MyAccount.php"
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


<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Edit Account</title>
  <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
  <link rel="stylesheet" type="text/css" href="../Assets/CssPages/headerNavigation.css">
  <style>
    .container-account {
      width: 470px;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      margin-top: 10px;
    }

    .image-container {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      overflow: hidden;
      margin: 0 auto 20px;
    }

    .image-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    
  </style>
</head>

<body>
  <center>
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" onsubmit="return validateTextarea();">
      <?php

      $selQry = "select * from tbl_customer u inner join tbl_city c on u.city_id=c.city_id inner join tbl_district d on c.district_id=d.district_id where customer_id='" . $cusid . "'";
      $res = $conn->query($selQry);
      while ($row = $res->fetch_assoc()) {
        ?>

        <div class="container-account">
          <center>
            <table width="324">
              <tr>

                <td colspan="2" align="center">
                  <div class="image-container">
                    <img src="../Assets/File/Customer/<?php echo $row['cus_photo']; ?>" width="150px" height="150px">
                  </div>
                  <input type="file" name="filephoto" id="filephoto"/>
                </td>
              </tr>
              <tr>
                <td width="123"> Name :</td>
                <td><label for="txtname"></label>
                  <input type="text" class="form-control" name="txtname" id="txtname"
                    value="<?php echo $row['cus_name']; ?>" required pattern="[A-Za-z ]{2,60}"
                      title="Must contain only alphabets and length should be between 2 - 60 characters.">
                </td>
              </tr>

              <tr>
                <td>E-mail :</td>
                <td><label for="txtemail"></label>
                  <input type="email" class="form-control" name="txtemail" id="txtemail"
                    value="<?php echo $row['cus_email']; ?>" disabled />
                </td>
              </tr>

              <tr>
                <td>Contact :</td>
                <td><label for="txtcontact"></label>
                  <input type="text" class="form-control" name="txtcontact" id="txtcontact"
                    value="<?php echo $row['cus_contact']; ?>" required pattern="\d{10}" title="Must contain exactly 10 digits.">
                </td>
              </tr>
              <tr>
                <td>Date Of Birth:</td>
                <td><label for="txtdob"></label>
                  <input type="date" class="form-control" name="txtdob" id="txtdob" value="<?php echo $row['cus_dob']; ?>"
                    required />
                </td>
              </tr>

              <tr>
                <td>Address :</td>
                <td>
                  <textarea name="txtaddress" class="form-control" rows="6" cols="20"
                    required><?php echo $row['cus_address']; ?></textarea>
                    <span id="error" style="color:#BD0101; font-size: 15px;"></span>
                </td>
              </tr>
              <tr>
                <td>District :</td>
                <td>
                  <select name="ddldistrict" id="ddldistrict" onChange="getCity(this.value)">
                    <?php
                    $dselqry = "select * from tbl_district";
                    $dreslt = $conn->query($dselqry);
                    while ($drow = $dreslt->fetch_assoc()) { ?>
                      <option <?php if($row['district_id']==$drow['district_id'])
                      {?>
                      selected
                      <?php } ?>
                      value="<?php echo $drow['district_id'] ?>">
                        <?php echo $drow['district_name'] ?>
                      </option>
                    <?php } ?>
                  </select>
                </td>
              </tr>

              <tr>
                <td>City :</td>
                <td>
                  <select name="ddlcity" id="ddlcity" onChange="getPin(this.value)">
                    <option value="<?php echo $row['city_id']; ?>">
                      <?php echo $row['city_name']; ?>
                    </option>
                    <?php
                    $cselqry = "SELECT *FROM tbl_city where district_id=" . $row['district_id'] . "";
                    $creslt = $conn->query($cselqry);
                    while ($crow = $creslt->fetch_assoc()) { ?>
                      <option value="<?php echo $crow['city_id'] ?>">
                        <?php echo $crow['city_name'] ?>
                      </option>
                    <?php } ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Pincode :</td>
                <td id="pincode">
                  <span class="form-control">
                    <?php echo $row['pincode']; ?>
                  </span>
                </td>
              </tr>
              <tr>
                <td colspan="2" align="center">
                  <div style="margin-top:25px;text-align:center;"><input class="btn btn-primary"
                      style="background-color:#2865AF;border-radius: 20px;" type="submit" name="btnupdate" id="btnupdate" value="Update" />
                  </div>
                </td>
              </tr>
            </table>
          </center>
        </div>


        <?php
      } ?>
    </form>
  </center>
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
</script>
<?php
ob_end_flush();
include('Foot.php');
?>
</body>

</html>