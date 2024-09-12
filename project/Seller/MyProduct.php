<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$sid = $_SESSION['sid'];
?>
<?php
if (isset($_GET['did'])) {
  $delQry = "delete from tbl_product where product_id=" . $_GET['did'];
  if ($conn->query($delQry)) { ?>
    <script>
      alert("deleted");
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
}
//inner join tbl_type t on p.type_id=t.type_id 
?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>My Products</title>
  <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
  <style>
    
    </style>
</head>

<body>
  <center>
    <div class="content-wrapper">
      <div class="col-lg-13 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">My products</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>

                    <th style="text-align:center;">Product Name</th>
                    <th style="text-align:center;">manage Images</th>
                    <th style="text-align:center;">color</th>
                    <th style="text-align:center;">material</th>
                    <th style="text-align:center;">type</th>
                    <th style="text-align:center;">price</th>
                    <th style="text-align:center;">tags</th>
                    <th style="text-align:center;">description</th>
                    <th style="text-align:center;">category</th>
                    <th style="text-align:center;">sub Category</th>
                    <th style="text-align:center;">Action</th>
                    <th style="text-align:center;"> Manage stock</th>

                  </tr>
                </thead>
                <tbody>

                  <?php

                  $selQry = "select * from tbl_product p inner join tbl_subcategory s on p.subcat_id=s.subcat_id inner join tbl_category c on s.category_id=c.category_id  where seller_id='" . $sid . "' order by prod_date desc";
                  $res = $conn->query($selQry);
                  while ($row = $res->fetch_assoc()) {
                    ?>
                    <tr>
                      <td align="center">
                        <?php echo $row['prod_name']; ?>
                      </td>

                      <td align="center">
                        <a href="AddProductImage.php?prid=<?php echo $row['product_id'] ?>" style="text-decoration:none;"><img
                            src="../Assets/File/Seller/products/<?php echo $row['prod_img']; ?>"
                            style="width:150px; height:150px;"><br> Click here</a>
                      </td>
                      <td align="center">
                        <?php echo $row['prod_color']; ?>
                      </td>
                      <td align="center">
                        <?php echo $row['prod_material']; ?>
                      </td>

                      <td align="center">
                        <?php
                        $typeid = explode(",", $row['type_id']);
                        for ($i = 0; $i < sizeof($typeid); $i++) {
                          $tySelQry = "select * from tbl_type where type_id= " . $typeid[$i] . "";
                          $tyres = $conn->query($tySelQry);
                          while ($tyrow = $tyres->fetch_assoc()) {
                            echo $tyrow['type_name'] . "<br>";
                          }

                        }
                        ?>
                      </td>

                      <td align="center">
                        <?php echo $row['prod_price']; ?>
                      </td>
                      <td align="center" style=" white-space:nowrap; max-width: 300px;overflow-y:hidden;">
                        <?php echo $row['prod_tag']; ?>
                      </td>
                      <td align="center" style=" white-space:nowrap; max-width: 350px;overflow-y:hidden;">
                        <?php echo $row['prod_description']; ?>
                      </td>
                      <td align="center">
                        <?php echo $row['category_name']; ?>
                      </td>
                      <td align="center">
                        <?php echo $row['subcat_name']; ?>
                      </td>
                      
                      <td align="center">
                        <a class="btn btn-outline-danger btn-icon-text btn-sm"
                          href="MyProduct.php?did=<?php echo $row['product_id'] ?>">Delete <i
                            class="ti-trash btn-icon-append"></i></a><br>
                        <a class="btn btn-outline-secondary btn-icon-text btn-sm"
                          href="EditProduct.php?eid=<?php echo $row['product_id'] ?>">Edit <i
                            class="ti-file btn-icon-append"></i></a>
                      </td>

                      <td><a class="btn btn-outline-success btn-icon-text btn-sm" 
                      href="StockManage.php?prid=<?php echo $row['product_id'] ?>">update stock</a></td>

                    </tr>
                    <?php
                  } ?>
              </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

  </center>
  </div>
 </div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>