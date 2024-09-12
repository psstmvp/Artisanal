<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$prodid = $_GET['prid'];
if (isset($_POST["btnsubmit"])) {
  $prodstock = $_POST["txtstock"];
  $insstock = "insert into tbl_stock(stock_count,product_id,added_date)values('" . $prodstock . "','" . $prodid . "',curdate())";
  if ($conn->query($insstock)) {
    ?>
    <script>
      alert("stock updated");
      window.location = "stockManage.php?prid=<?php echo $prodid ?>";
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
  <title>My Products</title>
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
      <form method="post">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title" style="color:#234A6F;font-size:23px;">Update Stock</h4>
              <table>
                <?php
                $orderedstock = 0;
                $addedstock = 0;
                $selstock = "select *from tbl_stock where product_id=" . $prodid . "";
                $restock = $conn->query($selstock);
                while ($rowstock = $restock->fetch_assoc()) {
                  $addedstock = $addedstock + $rowstock['stock_count'];
                }

                $selcart = "select * from tbl_cart where ( cart_status in (1,3,4) and product_id=" . $prodid . ")";
                $rescart = $conn->query($selcart);
                while ($rowcart = $rescart->fetch_assoc()) {
                  $orderedstock = $orderedstock + $rowcart['cart_quantity'];
                }

                $stock = $addedstock - $orderedstock;
                ?>
                <tr>
                  <td>stock remaining:</td>
                  <td class="form-control">
                    <?php echo $stock ?>
                  </td>
                </tr>

                <tr>
                  <td>add stock :</td>
                  <td><label for="txtstock"></label>
                    <input type="number" name="txtstock" id="txtstock" class="form-control">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <div style="margin:15px;text-align:center;">
                      <input type="submit" name="btnsubmit" class="btn btn-primary" style="background-color:#2865AF;"
                        value="Insert" />
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </form>

    </center>
  </div>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>