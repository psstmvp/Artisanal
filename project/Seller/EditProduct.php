<?php

ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$sid = $_SESSION['sid'];
$pid = $_GET['eid'];
if (isset($_POST['btnupdate'])) {

  $sel = "select * from tbl_product where prod_name='" . $_POST["txtpname"] . "' and product_id !=".$pid."";
  $res = $conn->query($sel);
  if (!($row = $res->fetch_assoc())) {

    $prodname = strtoupper($_POST["txtpname"]);
    $prodcolor = $_POST["txtclr"];
    $prodmaterial = $_POST["txtmat"];

    if (isset($_POST['chktype'])) {
      $prodtype = implode(",", $_POST['chktype']);
      $upType = "update tbl_product set type_id='" . $prodtype . "' where seller_id = " . $sid . " and product_id='" . $pid . "'";
      $conn->query($upType);
    }
    $prodtag = $_POST["txttag"];
    $prodprice = $_POST["txtprice"];
    $proddescription = $_POST["txtdes"];
    $subcateid = $_POST["ddlsubcat"];

    $upQry = "update tbl_product set prod_name='" . $prodname . "',prod_color='" . $prodcolor . "',prod_material='" . $prodmaterial . "',prod_price='" . $prodprice . "',prod_tag='" . $prodtag . "',prod_description='" . $proddescription . "',subcat_id='" . $subcateid . "' where seller_id = " . $sid . " and product_id='" . $pid . "'";

    if ($conn->query($upQry)) {
      ?>
      <script>
        alert("updated");
        window.location = "MyProduct.php"
      </script>
    <?php
    } else {
      ?>
      <script>
        alert("failed");
      </script>
      <?php
    }

  } else {
    ?>
    <script>
      alert("product Name already exist");
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
  <title> Edit Product</title>
  <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
  <style>
  input[type="number"]::-webkit-inner-spin-button,
		input[type="number"]::-webkit-outer-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}
    </style>
</head>

<body>
  <div class="content-wrapper">
    <center>
      
    <?php
    $selQry = "select * from tbl_product p inner join tbl_subcategory s on p.subcat_id=s.subcat_id inner join tbl_category c on s.category_id=c.category_id where seller_id='" . $sid . "' and product_id='" . $pid . "'";
    $res = $conn->query($selQry);
    while ($row = $res->fetch_assoc()) {
      ?>
      <form method="post" onsubmit="return validateTextarea();">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="color:#234A6F;font-size:23px;">Edit Product</h4>
              <table>
          <tr>
            <td width="123">product Name:</td>
            <td align="center"><input class="form-control" type="text" name="txtpname" id="txtpname" value="<?php echo $row['prod_name']; ?>"
                required pattern="[A-Za-z ]{2,30}" title="Must contain only alphabets and length should be between 2 - 30 characters."></td>
          </tr>

          <tr>
            <td width="123">Color:</td>
            <td align="center"> <input class="form-control" type="text" name="txtclr" id="txtclr" value="<?php echo $row['prod_color']; ?>" pattern="[A-Za-z ,.]{2,30}"
                      title="Must contain only alphabets, comma and dot. Length should be between 2 - 30 characters.">
            </td>
          </tr>

          <tr>
            <td>Material :</td>
            <td align="center"><input type="text" class="form-control"  name="txtmat" id="txtmat"
                value="<?php echo $row['prod_material']; ?>" pattern="[A-Za-z0-9,. ]{2,30}"
                      title="Must only contain alphabets digits and , . Length should be between 2 - 30 characters.">
            </td>
          </tr>

          <tr>
            <td>Type:</td>
            <td>
              <?php
              $typeid = explode(",", $row['type_id']);

              $ptselqry = "select * from tbl_type";
              $ptreslt = $conn->query($ptselqry);
              while ($ptrow = $ptreslt->fetch_assoc()) {
                if (in_array($ptrow['type_id'], $typeid)) {
                  ?>
                  <input type="checkbox" name="chktype[]" checked="checked" value="<?php echo $ptrow['type_id'] ?>">
                  <?php echo $ptrow['type_name'] ?><br>
                  <?php
                } else {
                  ?> 
                  <input type="checkbox" name="chktype[]" value="<?php echo $ptrow['type_id'] ?>">
                  <?php echo $ptrow['type_name'] ?><br>
                  <?php
                }
              }
              ?>
            </td>
          </tr>



          <tr>
            <td>Price :</td>
            <td align="center"><input type="text" class="form-control" name="txtprice" id="txtprice" value="<?php echo $row['prod_price']; ?>"
                required placeholder="Indian Rupees"
                      pattern="[0-9]*" title="Must contain only digits"></td>
          </tr>

          <tr>
                  <td>Search Keys/ tags</td>
                  <td><textarea name="txttag" id="txttag" class="form-control" rows="6" cols="20"
                      placeholder="eg.#blue #crochet amigurumi #knitting #lion plushie #blue lion doll #cute stuffed toy" required><?php echo $row['prod_tag']; ?></textarea>
                    <span id="error" style="color:#BD0101; font-size: 15px;"></span>
                  </td>
                </tr>

          <tr>
            <td align="center">description</td>
            <td><textarea name="txtdes" rows="6" cols="20" class="form-control" required><?php echo $row['prod_description']; ?></textarea>
            </td>
          </tr>

          <tr>
            <td>category:</td>
            <td>
              <select class="form-control" name="ddlcate" id="ddlcate" onChange="getSubCat(this.value)">
                <option selected disabled value="">
                  <?php echo $row['category_name']; ?>
                </option>
                <?php
                $ctselqry = "select * from tbl_category";
                $ctreslt = $conn->query($ctselqry);
                while ($ctrow = $ctreslt->fetch_assoc()) { ?>
                  <option value="<?php echo $ctrow['category_id'] ?>">
                    <?php echo $ctrow['category_name'] ?>
                  </option>
                <?php } ?>
              </select>
            </td>
          </tr>

          <tr>
            <td>Sub Category:</td>
            <td>
              <select class="form-control" name="ddlsubcat" id="ddlsubcat">
                <option value="<?php echo $row['subcat_id'] ?>">
                  <?php echo $row['subcat_name']; ?>
                </option>
              </select>
            </td>
          </tr>
          <tr>
          <td colspan="2">
                    <div style="margin:15px;text-align:center;">
                      <input type="submit" name="btnupdate" class="btn btn-primary" style="background-color:#2865AF;"
                        value="update" />
                    </div>
                  </td>
          </tr>

          </table>
            </div>
          </div>
        </div>
      
      <?php
    } ?>

</form>

</center>
  </div>

  
  <?php
ob_end_flush();
include('Foot.php');
?>
</body>

<script src="../Assets/JQ/jQuery.js "></script>
<script>
  function getSubCat(cid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSubCate.php?xid=" + cid,
      success: function (html) {
        $("#ddlsubcat").html(html);
      }
    });
  }
  
  document.getElementById("imgprod").addEventListener("change", function () {
    var fileInput = this;
    if (fileInput.files.length > 0) {
      var file = fileInput.files[0];
      var allowedImageTypes = ["image/jpeg", "image/jpg", "image/png", "image/webp", "image/avif"];
      var allowedDocumentType = "application/pdf";
      var maxSize = 20 * 1024 * 1024; // 5 MB in bytes 

      if (allowedImageTypes.indexOf(file.type) === -1 && file.type !== allowedDocumentType) {
        alert("Invalid file type. Please select a jpg, jpeg, png, webp, avif or gif file.");
        fileInput.value = ""; // Clear the input 
      } else if (file.size > maxSize) {
        alert("File size exceeds 20 MB. Please select a smaller file.");
        fileInput.value = ""; // Clear the input 
      }
    }
  });

  function validateTextarea() {
    const textarea = document.getElementById('txttag');
    const error = document.getElementById('error');

    // Define a regular expression pattern to allow words preceded by #
    const pattern = /^(#[A-Za-z ]+(#[A-Za-z ]+)*$)?$/;

    // Check if the input matches the pattern
    if (pattern.test(textarea.value)) {
        // Count the number of valid words (strings preceded by #)
        const words = textarea.value.split('#').filter(word => word.trim() !== '');

        if (words.length <= 10) {
            error.textContent = ''; // Clear any previous error message
            return true; // Allow form submission
        } else {
            error.textContent = 'You can enter a maximum of 10 words preceded by #.';
            return false; // Prevent form submission
        }
    } else {
        error.textContent = 'Should only contain letters and space. Only words preceded by # are allowed.';
        return false; // Prevent form submission
    }
}


</script>

</html>