<?php
ob_start();
include('Head.php');

include("../Assets/Connection/Connection.php");

if (isset($_GET['aid'])) {
  $upQry = "update tbl_seller set sell_ver_status= 1 where seller_id=" . $_GET['aid'];
  if ($conn->query($upQry)) { ?>
    <script>
      alert("Accepted");
      window.location = "SellerVerification.php"
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
<?php
if (isset($_GET['rid'])) {
  $upQry = "update tbl_seller set sell_ver_status= 2 where seller_id=" . $_GET['rid'];
  if ($conn->query($upQry)) { ?>
    <script>
      alert("rejected");
      window.location = "SellerVerification.php"
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
  <title>Seller Verification</title>
  <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
</head>

<body>
  <div class="content-wrapper">


    <div class="col-lg-13 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sellers not verified yet</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th style="text-align:center;">Sl.no.</th>
                  <th style="text-align:center;">Name</th>
                  <th style="text-align:center;">Photo</th>
                  <th style="text-align:center;">Contact</th>
                  <th style="text-align:center;">E-mail</th>
                  <th style="text-align:center;">Address</th>
                  <th style="text-align:center;">District</th>
                  <th style="text-align:center;">City</th>
                  <th style="text-align:center;">Pincode</th>
                  <th style="text-align:center;">Proof</th>
                  <th style="text-align:center;">DOJ</th>
                  <th style="text-align:center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $selQry = "select * from tbl_seller s inner join tbl_city c on s.city_id=c.city_id inner join tbl_district d on c.district_id=d.district_id where sell_ver_status !=1 and sell_ver_status !=2";
                $res = $conn->query($selQry);
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                  $i++;
                  ?>
                  <tr>
                    <td align="center">
                      <?php echo $i; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['sell_name']; ?>
                    </td>
                    <td align="center"><img src="../Assets/File/Seller/SellerPhoto/<?php echo $row['sell_photo']; ?>"
                    style="width:150px; height:150px;">
                  </td>
                    <td align="center">
                      <?php echo $row['sell_contact']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['sell_email']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['sell_address']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['district_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['city_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['pincode']; ?>
                    </td>

                   
                    <td align="center"><a href="../Assets/File/Seller/SellerProof/<?php echo $row['sell_proof']; ?>"
                        target="_blank"> proof</a></td>


                    <td align="center">
                      <?php echo $row['sell_doj']; ?>
                    </td>
                    <td align="center">
                      <a class="btn btn-outline-success btn-icon-text btn-sm" href="SellerVerification.php?aid=<?php echo $row['seller_id'] ?>">Accept <i class="ti-check btn-icon-append"></i></a>
                      <a class="btn btn-outline-danger btn-icon-text btn-sm" href="SellerVerification.php?rid=<?php echo $row['seller_id'] ?>">Reject <i class="ti-close btn-icon-append"></i></a>
                    </td>
                  </tr>
                  <?php
                }
                ?>


              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-13 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">List of verified</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                <th style="text-align:center;">Sl.no.</th>
                  <th style="text-align:center;">Name</th>
                  <th style="text-align:center;">Photo</th>
                  <th style="text-align:center;">Contact</th>
                  <th style="text-align:center;">E-mail</th>
                  <th style="text-align:center;">Address</th>
                  <th style="text-align:center;">District</th>
                  <th style="text-align:center;">City</th>
                  <th style="text-align:center;">Pincode</th>
                  <th style="text-align:center;">Proof</th>
                  <th style="text-align:center;">DOJ</th>
                  <th style="text-align:center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $selQry = "select * from tbl_seller s inner join tbl_city c on s.city_id=c.city_id inner join tbl_district d on c.district_id=d.district_id where sell_ver_status = 1";
                $res = $conn->query($selQry);
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                  $i++;
                  ?>
                  <tr>
                    <td align="center">
                      <?php echo $i; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['sell_name']; ?>
                    </td>
                    <td align="center"><img src="../Assets/File/Seller/SellerPhoto/<?php echo $row['sell_photo']; ?>"
                    style="width:150px; height:150px;">
                  </td>
                    <td align="center">
                      <?php echo $row['sell_contact']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['sell_email']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['sell_address']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['district_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['city_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['pincode']; ?>
                    </td>

                    <td align="center"><a href="../Assets/File/Seller/SellerProof/<?php echo $row['sell_proof']; ?>"
                        target="_blank"> proof</a></td>


                    <td align="center">
                      <?php echo $row['sell_doj']; ?>
                    </td>
                    <td align="center">

                    <a class="btn btn-outline-danger btn-icon-text btn-sm" href="SellerVerification.php?rid=<?php echo $row['seller_id'] ?>">Reject <i class="ti-close btn-icon-append"></i></a>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


    <div class="col-lg-13 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">List of Rejected</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                <th style="text-align:center;">Sl.no.</th>
                  <th style="text-align:center;">Name</th>
                  <th style="text-align:center;">Photo</th>
                  <th style="text-align:center;">Contact</th>
                  <th style="text-align:center;">E-mail</th>
                  <th style="text-align:center;">Address</th>
                  <th style="text-align:center;">District</th>
                  <th style="text-align:center;">City</th>
                  <th style="text-align:center;">Pincode</th>
                  <th style="text-align:center;">Proof</th>
                  <th style="text-align:center;">DOJ</th>
                  <th style="text-align:center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $selQry = "select * from tbl_seller s inner join tbl_city c on s.city_id=c.city_id inner join tbl_district d on c.district_id=d.district_id where sell_ver_status = 2";
                $res = $conn->query($selQry);
                $i = 0;
                while ($row = $res->fetch_assoc()) {
                  $i++;
                  ?>
                  <tr>
                    <td align="center">
                      <?php echo $i; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['sell_name']; ?>
                    </td>
                    <td align="center"><img src="../Assets/File/Seller/SellerPhoto/<?php echo $row['sell_photo']; ?>"
                    style="width:150px; height:150px;">
                  </td>
                    <td align="center">
                      <?php echo $row['sell_contact']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['sell_email']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['sell_address']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['district_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['city_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['pincode']; ?>
                    </td>

                    <td align="center"><a href="../Assets/File/Seller/SellerProof/<?php echo $row['sell_proof']; ?>"
                        target="_blank"> proof</a></td>


                    <td align="center">
                      <?php echo $row['sell_doj']; ?>
                    </td>
                    <td align="center">
                    <a class="btn btn-outline-success btn-icon-text btn-sm" href="SellerVerification.php?aid=<?php echo $row['seller_id'] ?>">Accept <i class="ti-check btn-icon-append"></i></a>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>