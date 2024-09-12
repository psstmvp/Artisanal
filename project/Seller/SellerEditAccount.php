<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$sid = $_SESSION['sid'];

if (isset($_POST['btnupdate'])) {
  $sname = strtoupper($_POST["txtname"]);
  $scontact = $_POST["txtcontact"];
  $semail = strtolower($_POST["txtemail"]);
  $sadd = $_POST["txtaddress"];
  $districtid = $_POST["ddldistrict"];
  $cityid = $_POST["ddlcity"];

  if (file_exists($_FILES['filephoto']["tmp_name"])) {
    $selphoto = $_FILES["filephoto"]["name"];
    $tempphoto = $_FILES["filephoto"]["tmp_name"];
    move_uploaded_file($tempphoto, '../Assets/File/Seller/SellerPhoto/' . $selphoto);

    $photoUpQry = "update tbl_seller set sell_photo='" . $selphoto . "' where seller_id='" . $sid . "'";
    $conn->query($photoUpQry);
  }

  $upQry = "update tbl_seller set sell_name='" . $sname . "',sell_contact='" . $scontact . "',sell_address='" . $sadd . "',city_id='" . $cityid . "' where seller_id = " . $sid . "";

  if ($conn->query($upQry)) {
    ?>
    <script>
      alert("updated");
      window.location = "SellerMyAccount.php"
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
  <style>
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
  <div class="content-wrapper">

    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data"
      onsubmit="return validateTextarea();">>
      <?php

      $selQry = "select * from tbl_seller s inner join tbl_city c on s.city_id=c.city_id inner join tbl_district d on c.district_id=d.district_id where seller_id='" . $sid . "'";
      $res = $conn->query($selQry);
      while ($row = $res->fetch_assoc()) {
        ?>
        <center>
          <div class="col-lg-6 grid-margin stretch-card">
            <div class="card" style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
              <div class="card-body">
                <div style="color:#234A6F; font-size:32px; text-align:center; margin: 20px;">
                  <span>Edit Account</span>
                </div>

                <table rules="none">
                  <tr>
                    <td colspan="2" align="center" id="sellimg">

                      <div class="image-container">
                        <img src="../Assets/File/Seller/SellerPhoto/<?php echo $row['sell_photo']; ?>" width="150px"
                          height="150px">
                      </div>
                      <input type="file" class=file-upload-default name="filephoto" id="filephoto"
                        accept=".jpg, .jpeg, .png, .webp, .avif, .gif">

                    </td>
                  </tr>

                  <tr>
                    <td width="123"> Name :</td>
                    <td><label for="txtname"></label>
                      <input type="text" name="txtname" class="form-control" id="txtname"
                        value="<?php echo $row['sell_name']; ?>" required placeholder="First Name" required
                        pattern="[A-Za-z ]{2,60}"
                        title="Must contain only alphabets and length should be between 2 - 60 characters.">
                    </td>
                  </tr>

                  <tr>
                    <td>E-mail :</td>
                    <td><label for="txtemail"></label>
                      <input type="email" name="txtemail" class="form-control" id="txtemail"
                        value="<?php echo $row['sell_email']; ?>" disabled />
                    </td>
                  </tr>

                  <tr>
                    <td>Contact :</td>
                    <td><label for="txtcontact"></label>
                      <input type="text" name="txtcontact" class="form-control" id="txtcontact"
                        value="<?php echo $row['sell_contact']; ?>" required pattern="\d{10}"
                        title="Must contain exactly 10 digits.">
                    </td>
                  </tr>

                  <tr>
                    <td>Address :</td>
                    <td>
                      <textarea name="txtaddress" id="txtaddress" rows="6" cols="20" required
                        class="form-control"><?php echo $row['sell_address']; ?></textarea>
                      <span id="error" style="color:#BD0101; font-size: 15px;"></span>
                    </td>
                  </tr>
                  <tr>

                  </tr>
                  <tr>
                    <td>District :</td>
                    <td>

                      <select class="form-control" name="ddldistrict" id="ddldistrict" onChange="getCity(this.value)">
                        <?php
                        $dselqry = "select * from tbl_district";
                        $dreslt = $conn->query($dselqry);
                        while ($drow = $dreslt->fetch_assoc()) { ?>
                          <option <?php if ($row['district_id'] == $drow['district_id']) { ?> selected <?php } ?>
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
                      <select class="form-control" name="ddlcity" id="ddlcity" onChange="getPin(this.value)">
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
                    <td id="pincode" class="form-control">
                      <?php echo $row['pincode']; ?>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <div style="margin:15px;text-align:center;">
                        <input type="submit" name="btnupdate" class="btn btn-primary" style="background-color:#2865AF;"
                          value="Update" />
                      </div>
                    </td>
                  </tr>
                </table>

                <?php
      } ?>
    </form>
  </div>
  </div>
  </div>
  </center>
  </div>
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
  document.getElementById("filephoto").addEventListener("change", function () {
    var fileInput = this;
    if (fileInput.files.length > 0) {
      var file = fileInput.files[0];
      var allowedImageTypes = ["image/jpeg", "image/jpg", "image/png", "image/webp", "image/avif"];
      var allowedDocumentType = "application/pdf";
      var maxSize = 5 * 1024 * 1024; // 5 MB in bytes 

      if (allowedImageTypes.indexOf(file.type) === -1 && file.type !== allowedDocumentType) {
        alert("Invalid file type. Please select a jpg, jpeg, png, webp, avif or gif file.");
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

</html>