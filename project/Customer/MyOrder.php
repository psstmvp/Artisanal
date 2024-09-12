<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$cid = $_SESSION['uid'];

?>
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="../Assets/CssPages/MyOrderCss.css" />
  <title>my Orders</title>
</head>

<body>

  <?php
  $cancount = 0;
  $counter = 0;
  $cancel = 0;
  $flag1 = 0;
  $flag2 = 0;
  $selqry = "select * from tbl_order where customer_id=" . $cid . " and order_status =1 ORDER BY order_date DESC";
  $orderres = $conn->query($selqry);
  while ($orderrow = $orderres->fetch_assoc()) {
    $counter++;
    ?>
    <div class="order-container">

      <div class="order">
        <?php
        $sel = "select * from tbl_cart c inner join tbl_product p on c.product_id=p.product_id where order_id='" . $orderrow['order_id'] . "'";
        $res = $conn->query($sel);
        while ($row = $res->fetch_assoc()) {
          if ($row['cart_status'] == 1)
            $status = "Confirmed";
          else if ($row['cart_status'] == 2)
            $status = "Cancelled";
          else if ($row['cart_status'] == 3)
            $status = "Shipped";
          else if ($row['cart_status'] == 4)
            $status = "Delivered";

          if ($status == "Confirmed")
            $flag1 = "1" . $counter;

          if ($status == "Delivered")
            $flag2 = "1" . $counter;

          $carttotal = $row["cart_quantity"] * $row["prod_price"];
          ?>
          <div class="product">
            <img src="../Assets/File/seller/Products/<?php echo $row["prod_img"] ?>" alt="Product">
            <div class="product-details">
            <?php
                  if ($status == "Cancelled") {
                    $cancount = "Cancelled" . $counter;
                    $cancel = $cancel + $row['prod_price'];
                  }
                    ?>

              <div style="display:flex; justify-content:space-between">
                <div class="quantity">x
                  <?php echo $row["cart_quantity"] ?><br>
                  <?php echo $row["prod_price"] ?>/-
                </div>
                <div class="order-status" style=" <?php if ($status == "Cancelled") {
                  echo "color:gray";
                } ?>">
                  Order Status:
                  <?php echo $status ?><br>
                  ₹
                  <?php echo $carttotal ?>/-

                </div>

              </div>

              <div class="button-container">
                <a class="view-button" href="EachOrder.php?cartid=<?php echo $row["cart_id"] ?>">
                  details</a>
              </div>
            </div>
          </div>
          <?php
        } ?>
      </div>
      <div class="order-summary">
        <span class="total-price">Total Price: ₹
          <?php echo $orderrow["order_price"] ?>/-<br>
          <?php
          if ($cancount == "Cancelled" . $counter)
            echo " - " . $cancel . "/-";
          $cancel = 0;
          ?>
        </span>
        <button class="more-button" id="morebutton<?php echo $counter; ?>"
          onclick="toggleViewMore(<?php echo $counter; ?>)">View More</button>

      </div>
      <?php
      $selpay = "select * from tbl_payment where order_id=" . $orderrow['order_id'] . "";
      $respay = $conn->query($selpay);
      $rowpay = $respay->fetch_assoc();
      ?>

      <div id="viewmore<?php echo $counter; ?>" style="display: none;">
        <div class="order-details">
          <div class="data-section">
            <span class="label">Delivery Address:</span>
            <span class="value">
              <?php echo $orderrow['delivery_address']; ?>
            </span>
          </div>
          <div class="divider"></div>

          <div class="data-section">
            <span class="label">Order ID:</span>
            <span class="value">
              <?php echo $orderrow['order_id']; ?>
            </span>
          </div>
          <div class="data-section">
            <span class="label">Ordered On:</span>
            <span class="value">
              <?php echo $orderrow['order_date']; ?>
            </span>
          </div>
          <div class="data-section">
            <span class="label">Payment ID:</span>
            <span class="value">
              <?php echo $rowpay['payment_id']; ?>
            </span>
          </div>
          <div class="data-section">
            <span class="label">Payment Method:</span>
            <span class="value">
              <?php echo $rowpay['pay_method']; ?>
            </span>
          </div>
          <?php
          if (!($flag1 == '1' . $counter)) {
            if ($flag2 == '1' . $counter) {
              ?>
              <a class="invoice-button" href="Invoice.php?oid=<?php echo $orderrow['order_id']; ?>">
                Get Invoice</a>
              <?php
            }
          }
          ?>
        </div>
      </div>

    </div>

    <?php

  } ?>
  <script src="../Assets/JQ/jQuery.js "></script>
  <script>
    function toggleViewMore(orderNumber) {
      var viewmoreDiv = document.getElementById('viewmore' + orderNumber);
      if (viewmoreDiv.style.display === 'none') {
        viewmoreDiv.style.display = 'block';
      } else {
        viewmoreDiv.style.display = 'none';
      }
    }
  </script>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>