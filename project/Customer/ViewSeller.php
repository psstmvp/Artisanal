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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    .follow-list {
      width: 250px;
      background-color: #ffffff;
      padding: 10px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      margin-top: 30px;
      margin-left: 30px;
    }

    .sell-item {
      width: 190px;
      display: flex;
      align-items: center;
      justify-content: center;
      /* Center items vertically within .seller-item */
      margin: 10px;
      text-align: center;
    }

    .row {
      display: flex;
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

    .foll-image {

      width: 75px;
      /* Adjust the image dimensions as needed */
      height: 75px;
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
  <div class="flex-w flex-m m-tb-10" style="justify-content:right;">
    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
      <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
      <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
      Search
    </div>
  </div>

  <!-- Search product -->
  <div class="dis-none panel-search w-full p-t-10 p-b-15">
    <div class="bor8 dis-flex p-l-15">
      <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
        <i class="zmdi zmdi-search"></i>
      </button>

      <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" onkeyup="sellerCheck()" name="search-seller"
        placeholder="Search" id="txt_name">
    </div>
  </div>

  <h3><i>Sellers you follow</i></h3>
  <div class="owl-carousel">
  <?php
  $i=0;
  $selfoll = "select * from tbl_seller_bio sb inner join tbl_follow f on sb.seller_id=f.seller_id where f.customer_id=" . $_SESSION['uid'] . "";
  $resfoll = $conn->query($selfoll);
  while ($rowfoll = $resfoll->fetch_assoc()) {
    $i++;
  ?>
    <div class="follow-list">
      <div class="sell-item">
        <div class="follow-img">
          <a href="EachSeller.php?siid=<?php echo $rowfoll['seller_bio_id'] ?>" class="seller-name">
            <img src="../Assets/File/Seller/SellerBio/<?php echo $rowfoll['sell_profilepic']; ?>" alt="Seller Image" class="foll-image" style="border-radius:50%;">
          </a>
        </div>
        <div class="details">
          <a href="EachSeller.php?siid=<?php echo $rowfoll['seller_bio_id'] ?>" class="seller-name">
            <h5><?php echo $rowfoll['bio_nickname']; ?></h5>
          </a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>


  <div id="result">

    <center>
      <br>
      <h2><b>OTHER SELLERS</b></h2>
      <?php
      
      $selQry = "select * from tbl_seller_bio";
      $res = $conn->query($selQry);
      while ($row = $res->fetch_assoc()) {
       
        ?>
        <div class="seller-list">
          <div class="seller-item">
            <div class="image-container">
              <a href="EachSeller.php?siid=<?php echo $row['seller_bio_id'] ?>" class="seller-name">
                <img src="../Assets/File/Seller/SellerBio/<?php echo $row['sell_profilepic']; ?>" alt="Seller Image"
                  class="sell-image" style="border-radius:50%;"> </a>
            </div>

            <div class="details">
              <a href="EachSeller.php?siid=<?php echo $row['seller_bio_id'] ?>" class="seller-name">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

<script>
  <?php if($i >=4) 
  {?>
  jQuery(document).ready(function ($) {
    $(".owl-carousel").owlCarousel({
      items: <?php echo $i; ?>, // Set the number of items to show
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 3000, // Set autoplay time in milliseconds
      
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        900: {
          items: 3
        },
        1200: {
          items: 4
        }
      }

    });
  });

  <?php } 
  else{ ?>
    jQuery(document).ready(function ($) {
      $(".owl-carousel").owlCarousel({
        items: <?php echo $i; ?>, // Set the number of items to show
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000, // Set autoplay time in milliseconds
      });
    }); 
    <?php
  }
  ?>
</script>


<?php
ob_end_flush();
include('Foot.php');
?>

</html>
