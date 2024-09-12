<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

$sid = $_SESSION['sid'];
if (isset($_POST["btnsubmit"])) {
  $sel = "select * from tbl_product where prod_name='" . $_POST["txtpname"] . "'";
  $res = $conn->query($sel);
  if (!($row = $res->fetch_assoc())) {
    $prodname = strtoupper($_POST["txtpname"]);
    $prodcolor = $_POST["txtclr"];
    $prodmaterial = $_POST["txtmat"];
    $prodtype = implode(",", $_POST['chktype']);
    $prodprice = $_POST["txtprice"];

    $prodphoto = $_FILES["imgprod"]["name"];
    $tempphoto = $_FILES["imgprod"]["tmp_name"];
    move_uploaded_file($tempphoto, '../Assets/File/Seller/Products/' . $prodphoto);
    $prodtag = $_POST["txttag"];
    $proddescription = $_POST["txtdes"];
    $subcateid = $_POST["ddlsubcat"];
    $insQry = "insert into tbl_product(prod_name,prod_color,Prod_material,type_id,prod_price,prod_img,prod_tag,prod_description,seller_id,subcat_id,prod_date)values('" . $prodname . "','" . $prodcolor . "','" . $prodmaterial . "','" . $prodtype . "','" . $prodprice . "','" . $prodphoto . "','" . $prodtag . "','" . $proddescription . "','" . $sid . "','" . $subcateid . "',curdate())";
    if ($conn->query($insQry)) {
      ?>
      <script>
        alert("product Added");
        window.location = "myProduct.php";
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
  <title>add product</title>
  <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
  
</head>

<body>
  <div class="content-wrapper">
    <center>
      <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data"
        onsubmit="return validateTextarea();">
        <div class="col-lg-7 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="color:#234A6F;font-size:23px;">Add new Product</h4>

              <table rule="none" cellpadding="6">

                <tr>
                  <td width="123">product Name:</td>
                  <td width="254">
                    <input type="text" class="form-control" name="txtpname" id="txtpname" required
                      pattern="[A-Za-z ]{2,30}"
                      title="Must contain only alphabets and length should be between 2 - 30 characters.">
                  </td>
                </tr>
                <tr>
                  <td width="123">Color</td>
                  <td>
                    <input type="text" class="form-control" name="txtclr" id="txtclr" required pattern="[A-Za-z0-9,. ]{2,30}"
                      title="Must only contain alphabets digits and , . Length should be between 2 - 30 characters.">
                  </td>
                </tr>

                <tr>
                  <td>Material</td>
                  <td>
                    <input type="text" class="form-control" name="txtmat" id="txtmat" required pattern="[A-Za-z0-9,. ]{2,30}"
                      title="Must only contain alphabets digits and , . Length should be between 2 - 30 characters.">
                  </td>
                </tr>

                <tr>
                  <td>Type</td>
                  <td>
                    <?php
                    $ptselqry = "select * from tbl_type";
                    $ptreslt = $conn->query($ptselqry);
                    while ($ptrow = $ptreslt->fetch_assoc()) { ?>

                      <input type="checkbox" name="chktype[]" value="<?php echo $ptrow['type_id'] ?>">
                      <?php echo $ptrow['type_name'] ?><br>
                    <?php } ?>
                  </td>
                </tr>


                <tr>
                  <td>Price </td>
                  <td><input type="text" class="form-control" name="txtprice" id="txtprice" required placeholder="Indian Rupees"
                      pattern="[0-9]*" title="Must contain only digits"></td>
                </tr>

                <tr>
                  <td>image</td>
                  <td><input type="file" class="form-control" name="imgprod" id="imgprod"
                      accept=".jpg, .jpeg, .png, .webp, .avif, .gif" /></td>
                </tr>

                <tr>
                  <td>Search Keys/ tags</td>
                  <td><textarea name="txttag" id="txttag" class="form-control" rows="6" cols="20"
                      placeholder="eg.#blue #crochet amigurumi #knitting #lion plushie #blue lion doll #cute stuffed toy" required></textarea>
                    <span id="error" style="color:#BD0101; font-size: 15px;"></span>
                  </td>
                </tr>

                <tr>
                  <td>description</td>
                  <td><textarea name="txtdes" class="form-control" rows="6" cols="20" required></textarea></td>
                </tr>
                <tr>
                  <td>category</td>
                  <td>
                    <select name="ddlcate" class="form-control" id="ddlcate" onChange="getSubCat(this.value)" required>
                      <option value="">-----select-----</option>
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
                  <td>Sub Category</td>
                  <td>
                    <select name="ddlsubcat" class="form-control" id="ddlsubcat" required>
                      <option value="">-----select-----</option>
                    </select>
                  </td>
                </tr>

                <tr>
                  <td><button type="reset" name="btncancel" class="btn btn-secondary btn-fw">Cancel</button>
                  </td>
                  <td align="right"><button type="submit" name="btnsubmit" class="btn btn-primary btn-fw"
                      style="background-color:#2865AF;">ADD</button></td>
                </tr>

              </table>
            </div>
          </div>
        </div>
      </form>
    </center>
  </div>

</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getSubCat(cid) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSubCate.php?xid=" + cid,
      success: function (html) {
        $("#ddlsubcat").html(html);
      }
    });
  }
</script>

<script>
  document.getElementById("imgprod").addEventListener("change", function () {
    var fileInput = this;
    if (fileInput.files.length > 0) {
      var file = fileInput.files[0];
      var allowedImageTypes = ["image/jpeg", "image/jpg", "image/png", "image/webp", "image/avif"];
      var allowedDocumentType = "application/pdf";
      var maxSize = 10 * 1024 * 1024; // 5 MB in bytes 

      if (allowedImageTypes.indexOf(file.type) === -1 && file.type !== allowedDocumentType) {
        alert("Invalid file type. Please select a jpg, jpeg, png, webp, avif or gif file.");
        fileInput.value = ""; // Clear the input 
      } else if (file.size > maxSize) {
        alert("File size exceeds 10 MB. Please select a smaller file.");
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
<?php
ob_end_flush();
include('Foot.php');
?>

</html>