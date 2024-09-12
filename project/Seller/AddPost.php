<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");


$sid = $_SESSION['sid'];

if (isset($_POST["btnsubmit"])) {
  $caption = $_POST["txtcaption"];
  $type = $_POST["ddltype"];

  $prodid = $_POST["ddlprod"];

  $post = $_FILES["filepost"]["name"];
  $tempphoto = $_FILES["filepost"]["tmp_name"];
  move_uploaded_file($tempphoto, '../Assets/File/Seller/Posts/' . $post);

  $postdesc = $_POST["txtdescription"];

  $insQry = "insert into tbl_post(post_caption,post_type,post_media,post_content,created_on,product_id,seller_id)values('" . $caption . "','" . $type . "','" . $post . "','" . $postdesc . "',current_timestamp(),'" . $prodid . "','" . $sid . "')";

  if ($conn->query($insQry)) { ?>
    <script>
      alert("posted successfully")
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
  <title> Add Post</title>
  <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
</head>

<body>
  <div class="content-wrapper">
    <center>

      <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
        <div class="col-lg-8 grid-margin stretch-card">
          <div class="card">
          <div class="card-body">
							<h4 class="card-title"style="color:#234A6F;font-size:23px;" >share your thoughts..</h4>
            <table rules="none" cellpadding="10px" >
              <tr>
                <td>caption</td>
                <td>
                  <input type="text" name="txtcaption" class="form-control" required />
                </td>
              </tr>

              <tr>
                <td>file type</td>
                <td>
                  <select name="ddltype" class="form-control" required>
                    <option value="image">IMAGE</option>
                    <option value="video">VIDEO</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td>choose the file</td>
                <td>
                  <input type="file" name="filepost" id="filepost" class="form-control" required 
                   accept=".jpg, .jpeg, .png, .gif, .avif, .webp, .mp4, .mov, .avi, .mpeg" />
                </td>
              </tr>

              <tr>
                <td>Description</td>
                <td>
                  <textarea name="txtdescription" class="form-control" placeholder=" write something here..." required></textarea>
                </td>
              </tr>

              <tr>
                <td>related to any of your product?</td>
                <td>
                  <select name="ddlprod" class="form-control">
                    <option value="0">--select---</option>
                    <?php $selqry = "select *from tbl_product where seller_id=" . $sid . "";
                    $res = $conn->query($selqry);
                    while ($row = $res->fetch_assoc()) {
                      ?>
                      <option value="<?php echo $row['product_id'] ?> ">
                        <?php echo $row['prod_name'] ?>
                      </option>
                      <?php
                    } ?>
                  </select>
                </td>
              </tr>

              <tr>
              <td><button type="reset" name="btncancel"
												class="btn btn-secondary btn-fw">Cancel</button></td>
              <td align="right"><button type="submit" name="btnsubmit"
												class="btn btn-primary btn-fw">POST</button></td>
										
              </tr>

            </table>
          </div>
          </div>
        </div>
      </form>
    </center>
  </div>
<script>
  document.getElementById("filepost").addEventListener("change", function () {
  var fileInput = this;

  if (fileInput.files.length > 0) {
    var file = fileInput.files[0];
    var allowedTypes = ["image/jpeg", "image/jpg", "image/png", "image/webp","image/avif", "image/gif", "video/mp4", "video/mov", "video/avi", "video/mpeg"]; // Add video types as needed
    var maxSize = 30 * 1024 * 1024; // 5 MB in bytes

    if (allowedTypes.indexOf(file.type) === -1) {
      alert("Invalid file type. Please select a jpg, jpeg, png, avif, webp, gif, mp4, mov, avi, or mpeg file.");
      fileInput.value = ""; // Clear the input
    } else if (file.size > maxSize) {
      alert("File size exceeds 30 MB. Please select a smaller file.");
      fileInput.value = ""; // Clear the input
    }
  }
});
</script>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>