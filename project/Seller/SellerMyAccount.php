<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>My Account</title>
  <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
  <style>
    .container {
      width: 470px;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      margin-top: 20px;
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

    .label {
      font-weight: bold;
      text-align: left;
      margin-right: 10px;
    }

    .content {
      color: gray;
    }

    .data {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 10px;
    }

    .link {
      text-decoration: none;
      color: #333;
    }
  </style>
</head>

<body>
  <div class="content-wrapper">

    <?php
    $selid = $_SESSION['sid'];
    $selQry = "select * from tbl_seller s inner join tbl_city c on s.city_id=c.city_id inner join tbl_district d on c.district_id=d.district_id where seller_id='" . $selid . "'";
    $res = $conn->query($selQry);
    while ($row = $res->fetch_assoc()) {
      ?>


      <div class="container">
        <div style="color:#234A6F; font-size:32px; text-align:center; margin: 20px;">
          <span>My Account</span>
        </div>
        <div class="image-container">
          <img src="../Assets/File/Seller/SellerPhoto/<?php echo $row['sell_photo']; ?>" alt="Seller Photo">
        </div>
        <div class="data">
          <span class="label">Name:</span>
          <span class="content">
            <?php echo $row['sell_name']; ?>
          </span>
        </div>
        <div class="data">
          <span class="label">Email:</span>
          <span class="content">
            <?php echo $row['sell_email']; ?>
          </span>
        </div>
        <div class="data">
          <span class="label">Contact:</span>
          <span class="content">
            <?php echo $row['sell_contact']; ?>
          </span>
        </div>
        <div class="data">
          <span class="label">Date of Join:</span>
          <span class="content">
            <?php echo $row['sell_doj']; ?>
          </span>
        </div>
        <div class="data">
          <span class="label">Address:</span>
          <span class="content">
            <?php echo $row['sell_address']; ?>
          </span>
        </div>
        <div class="data">
          <span class="label">Pincode:</span>
          <span class="content">
            <?php echo $row['pincode']; ?>
          </span>
        </div>
        <div class="data">
          <span class="label">City:</span>
          <span class="content">
            <?php echo $row['city_name']; ?>
          </span>
        </div>
        <div class="data">
          <span class="label">District:</span>
          <span class="content">
            <?php echo $row['district_name']; ?>
          </span>
        </div>
        <div style="display:flex; flex-direction:column; margin-top:15px;">
          <div style="margin:15px;text-align:center;"><a class="btn btn-primary" style="background-color:#2865AF;"
              href="SellerEditAccount.php">Edit Account</a></div>
          <div style="margin:15px;text-align:center;"><a class="btn btn-info"
              style="background-color:#C5F1FF; color:#2865AF;" href="SellerChangePassword.php">Change Password</a></div>
        </div>
      </div>


    <?php
    } ?>
  </div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>