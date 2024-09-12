<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$_SESSION['uid'];
$sellid = $_GET['siid'];

?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Each Seller</title>
  <style>
    @import url(https://unpkg.com/@webpixels/css@1.1/dist/index.css);
    .follow{
      margin-top:20px;
      display:block;
      background-color:#C5F1FF;
       color:#2865AF; 
       border-radius: 10px; 
       width:100px;
       height: 40px;
    }
  </style>
</head>

<body>
  <center>
    <?php
    $selQry = "select * from tbl_seller_bio where seller_bio_id= " . $sellid . "";
    $res = $conn->query($selQry);

    if ($row = $res->fetch_assoc()) {
      ?>
      <div class="p-16 bg-surface-secondary">
        <div class="row">
          <div class="col-lg-6 mx-auto">
            <!-- Component -->
            <div class="card shadow">
              <div class="card-body">
                <div class="d-flex justify-content-center">
                  <span >
                    <img src="../Assets/File/Seller/SellerBio/<?php echo $row['sell_profilepic']; ?>" width="100%"
                      height="100%" style=" width: 150px; height: 150px; border-radius: 50%; margin: 0 auto 20px; display: block;"> </span>
                </div>
                <div class="text-center my-6">
                  <!-- Title -->
                  <span class="d-block h3 mb-0">
                    <?php echo $row['bio_nickname']; ?>
                  </span>
                  <!-- Subtitle -->
                  <span style="font-size:17px;" class="d-block text text-muted">
                    <?php echo $row['bio_email']; ?>
                  </span>
                  <span style="font-size:17px;" class="d-block text text-muted">
                    <?php echo $row['bio_details']; ?>
                  </span>

                </div>
                <!-- Stats -->
                <?php
                $selPost = "SELECT COUNT(*) as c FROM tbl_post WHERE seller_id=" . $row['seller_id'] . "";
                $result = $conn->query($selPost);
                $count = $result->fetch_assoc();
                $selfollow = "SELECT COUNT(*) as f FROM tbl_follow WHERE seller_id=" . $row['seller_id'] . "";
                $rlt = $conn->query($selfollow);
                $follow = $rlt->fetch_assoc();
                $selprod = "SELECT COUNT(*) as p FROM tbl_product WHERE seller_id=" . $row['seller_id'] . "";
                $reslt = $conn->query($selprod);
                $product = $reslt->fetch_assoc();
                ?>
                <div class="d-flex">
                  <div class="col-4 text-center">
                    <span class="h3 font-bolder mb-0">
                      <?php echo $count['c']; ?>
                    </span>
                    <span style="font-size:18px;" class="d-block ">Posts</span>
                  </div>
                  <div class="col-4 text-center">
                    <span class="h3 font-bolder mb-0">
                      <?php echo $product['p']; ?>
                    </span>
                    <span style="font-size:18px;" class="d-block ">products</span>
                  </div>
                  <div class="col-4 text-center">
                    <span class="h3 font-bolder mb-0" id="followcount">
                      <?php echo $follow['f']; ?>
                    </span>

                    <span style="font-size:18px;" class="d-block">followers</span>
                  </div>
                </div>
               <?php
                $fselQry = "select * from tbl_follow where customer_id=" . $_SESSION['uid'] . " and seller_id=" . $row['seller_id'] . "";
                $fres = $conn->query($fselQry);
                  ?>
                  <button class="follow" onClick="followers(<?php echo $row['seller_id']; ?>)">
                    <span id="followunfollow">
                      <?php
                      if (!($frow = $fres->fetch_assoc())) {
                        ?>
                        follow
                        <?php
                      } else {
                        ?>
                        unfollow
                        <?php }?>
                      </span>
                      </button>
                


              </div>
            </div>
          </div>
        </div>


        <div class="card shadow" style="margin-top:30px;">
          <div class="card-body">
            <div style="display:flex; justify-content:space-between">
              <div style="width:50%">
                <h3> my posts </h3>
                <table border=1 rules=none>
                  <?php
                  $seller_id = $row['seller_id'];
                  $selpostQry = "select * from tbl_post  where ( report_status in (0,3) and seller_id=" . $seller_id . ")  ORDER BY created_on DESC";
                  $postres = $conn->query($selpostQry);
                  while ($postrow = $postres->fetch_assoc()) { ?>
                    <tr>
                      <td>
                        <?Php
                        if ($postrow['post_type'] === 'image') {
                          ?>
                          <a href="EachPost.php?rid=<?php echo $postrow['post_id'] ?>">
                            <img src="../Assets/File/Seller/Posts/<?php echo $postrow['post_media'] ?>" alt="Post Image"
                              width="30%" height="30%" class="bg-image hover-overlay ripple rounded-0"
                              data-mdb-ripple-color="light">
                            <?php
                        } elseif ($postrow['post_type'] === 'video') { ?>
                            <a href="EachPost.php?rid=<?php echo $postrow['post_id'] ?>">
                              <video controls width="30%" height="30%">
                                <source src="../Assets/File/Seller/Posts/<?php echo $postrow['post_media'] ?>"
                                  type="video/mp4">Your
                                browser does not support the video tag
                              </video>
                            </a>
                            <?php
                        } ?>
                        </a>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </table>
              </div>

              <div style="width:50%">
                <h3> my products </h3>
                <table border="1" rules="all">
                  <?php
                  $selProQry = "select * from tbl_product where seller_id=" . $seller_id . "";
                  $pres = $conn->query($selProQry);
                  while ($prow = $pres->fetch_assoc()) {
                    ?>
                    <tr>
                      <td align="center">
                        <?php echo $prow['prod_name']; ?>
                      </td>

                      </td>
                      <td align="center"><a href="ViewProducts.php?spid=<?php echo $prow['product_id'] ?>"> <img
                            src="../Assets/File/seller/Products/<?php echo $prow['prod_img'] ?>" width="100" height="100" />
                        </a>
                      </td>
                    </tr>

                    <?php
                  } ?>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </center>



    <?php
    } ?>

  <script src="../Assets/JQ/jQuery.js "></script>
  <script>

    function followers(fid) {
      $.ajax({
        url: "../Assets/AjaxPages/AjaxFollow.php?fid=" + fid,
        success: function (response) {
          // Parse the JSON response
          var data = JSON.parse(response);

          // Access the values
          var countfollow = data.countfollow;
          var checkfollow = data.checkfollow;
          if (checkfollow === true) {
            //add for uniq postNumber

            $("#followunfollow").html('unfollow');
          } else {
            $("#followunfollow").html('follow');
          }

          // Update the HTML elements
          $("#followcount").text(countfollow);
        },
        error: function () {
          console.log("An error occurred during the AJAX request.");
        }
      });
    }
  </script>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>