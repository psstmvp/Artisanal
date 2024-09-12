<?php
include("../Connection/Connection.php");
session_start();


if (isset($_GET["name"])) {?>

        <center>
      <?php
      $name = $_GET["name"];
      $selQry = "select * from tbl_seller_bio where bio_nickname LIKE '%" . $name . "%'";
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
        <?php }?>