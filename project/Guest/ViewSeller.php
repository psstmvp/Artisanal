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
  <title>View Sellers</title>
  <style>
    .seller-list {
      width: 500px;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      margin-top: 30px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .seller-item {
      width: 150px;
      display: flex;
      align-items: center;
      justify-content: center;
      /* Center items vertically within .seller-item */
      margin: 10px;
      text-align: center;
    }

    .sell-image {

      width: 150px;
      /* Adjust the image dimensions as needed */
      height: 150px;
      border: 1px solid #000;
      /* Add a border if desired */
    }

    .details {
      margin-left: 20px;
    }

    .seller-name {
      text-decoration: none;
      color: #333;
      display: block;
      /* Adjust the margin as needed */
    }
  </style>
</head>

<body>
  <div class="flex-w flex-m m-tb-10" style="justify-content:right;margin-top: 90px;">
    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search" style="margin-right: 170px;color:#000">
      <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search" ></i>
      <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
      Search
    </div>
  </div>

  <!-- Search product -->
  <div class="dis-none panel-search w-full p-t-10 p-b-15" >
    <div class="bor8 dis-flex p-l-15">
      <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
        <i class="zmdi zmdi-search"></i>
      </button>

      <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" onkeyup="sellerCheck()" name="search-seller"
        placeholder="Search" id="txt_name">
    </div>
  </div>




  <div id="result">

    <center>
      <?php
      $selQry = "select * from tbl_seller_bio";
      $res = $conn->query($selQry);
      while ($row = $res->fetch_assoc()) {
        ?>
        <div class="seller-list">
          <div class="seller-item">
            <div class="image-container">
              <img src="../Assets/File/Seller/SellerBio/<?php echo $row['sell_profilepic']; ?>" alt="Seller Image"
                class="sell-image" style="border-radius:50%;">
            </div>

            <div class="details">
              <a href="Login.php" class="seller-name">
                <h4>
                  <?php echo $row['bio_nickname']; ?>
                </h4>
              </a>
              <span>
                <?php echo $row['bio_email']; ?>
              </span>
            </div>
          </div>
        </div>
        <?php
      }
      ?>

      <center>
  </div>



</body>
<script>

  function sellerCheck() {
    var name = document.getElementById('txt_name').value;

    $.ajax({
      url: "../Assets/AjaxPages/AjaxSellerSearch.php?name=" + name,
      success: function (response) {
        $("#result").html(response);
      }
    });


  }
</script>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>