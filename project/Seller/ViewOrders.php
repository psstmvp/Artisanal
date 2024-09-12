<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$sid = $_SESSION['sid'];



?>
<?php


if (isset($_GET['shipid'])) {
  $upQry = "update tbl_cart set cart_status=3 where cart_id=" . $_GET['shipid'];
  if ($conn->query($upQry)) {
    $selqry = "select * from tbl_order o inner join tbl_cart c on o.order_id=c.order_id  inner join tbl_product p on p.product_id= c.product_id where cart_id=" . $_GET['shipid'];
    $result = $conn->query($selqry);
    while ($row = $result->fetch_assoc()) {
      $message = "your order of product <b>" . $row['prod_name'] . "</b> has been shipped";
      $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,customer_id,sent_on)values("Order Shipped","mdi mdi-truck-delivery","' . $message . '","' . $row['customer_id'] . '",current_timestamp())';
      $conn->query($Insqry);
    }
    ?>
    <script>
      alert("marked as shipped");

      window.location = "ViewOrders.php"
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

if (isset($_GET['delid'])) {
  $upQry = "update tbl_cart set cart_status=4 where cart_id=" . $_GET['delid'];
  if ($conn->query($upQry)) {
    $selqry = "select * from tbl_order o inner join tbl_cart c on o.order_id=c.order_id  inner join tbl_product p on p.product_id= c.product_id where cart_id=" . $_GET['delid'];
    $result = $conn->query($selqry);
    while ($row = $result->fetch_assoc()) {
      $message = "your order of product <b>" . $row['prod_name'] . "</b> has been delivered.";
      $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,customer_id,sent_on)values("Order delivered","mdi mdi-package-variant-closed","' . $message . '","' . $row['customer_id'] . '",current_timestamp())';
      $conn->query($Insqry);
    }


    ?>
    <script>
      alert("marked as delivered");
      window.location = "ViewOrders.php"
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
  <title>Orders Recieved</title>
</head>

<body>

  <div class="content-wrapper">

    <div class="col-lg-13 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Orders Recieved</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                  <tr>
                    <th style="text-align:center;">Sl.no.</th>
                    <th style="text-align:center;">Product name</th>
                    <th style="text-align:center;">Quantity</th>
                    <th style="text-align:center;">Customer Name</th>
                    <th style="text-align:center;">Contact</th>
                    <th style="text-align:center;">E-mail</th>
                    <th style="text-align:center;">Delivery address</th>
                    <th style="text-align:center;">Ordered On</th>
                    <th style="text-align:center;">Action</th>

                  </tr>
              </thead>
              <tbody>
                <?php
                $selQry = "select * from tbl_customer cus inner join tbl_order ord on cus.customer_id=ord.customer_id inner join tbl_cart ca on ord.order_id =ca.order_id inner join tbl_product p on ca.product_id=p.product_id where cart_status =1 and seller_id=" . $sid . " order by order_date DESC";
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
                      <?php echo $row['prod_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cart_quantity']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_contact']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_email']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['delivery_address']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['order_date']; ?>
                    </td>
                    <td align="center">
                    <a class="btn btn-outline-primary btn-icon-text btn-sm" href="ViewOrders.php?shipid=<?php echo $row['cart_id'] ?>">Mark Shipped<i class="ti-truck btn-icon-append"></i></a>
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
          <h4 class="card-title">list of Shipped</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                <th style="text-align:center;">Sl.no.</th>
                    <th style="text-align:center;">Product name</th>
                    <th style="text-align:center;">Quantity</th>
                    <th style="text-align:center;">Customer Name</th>
                    <th style="text-align:center;">Contact</th>
                    <th style="text-align:center;">E-mail</th>
                    <th style="text-align:center;">Delivery address</th>
                    <th style="text-align:center;">Ordered On</th>
                    <th style="text-align:center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $selQry = "select * from tbl_customer cus inner join tbl_order o on cus.customer_id=o.customer_id inner join tbl_cart ca on o.order_id=ca.order_id inner join tbl_product p on ca.product_id=p.product_id where cart_status =3 and seller_id=" . $sid . "";
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
                      <?php echo $row['prod_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cart_quantity']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_contact']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_email']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['delivery_address']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['order_date']; ?>
                    </td>
                    <td align="center"> 
                      <a class="btn btn-outline-info btn-icon-text btn-sm"  href="ViewOrders.php?delid=<?php echo $row['cart_id'] ?>">Mark Delivered<i class="ti-package btn-icon-append"></i></a>
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
          <h4 class="card-title">list of Delivered</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                <th style="text-align:center;">Sl.no.</th>
                    <th style="text-align:center;">Product name</th>
                    <th style="text-align:center;">Quantity</th>
                    <th style="text-align:center;">Customer Name</th>
                    <th style="text-align:center;">Contact</th>
                    <th style="text-align:center;">E-mail</th>
                    <th style="text-align:center;">Delivery address</th>
                    <th style="text-align:center;">Ordered On</th>
                    <th style="text-align:center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $selQry = "select * from tbl_customer cus inner join tbl_order o on cus.customer_id=o.customer_id inner join tbl_cart ca on o.order_id=ca.order_id inner join tbl_product p on ca.product_id=p.product_id where cart_status =4 and seller_id=" . $sid . "";
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
                      <?php echo $row['prod_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cart_quantity']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_contact']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_email']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['delivery_address']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['order_date']; ?>
                    </td>
                    <td align="center"><span class="btn btn-success btn-icon-text btn-sm" >Completed<i class="ti-check btn-icon-append"></i></span></td>
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
          <h4 class="card-title">list of cancelled</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                <th style="text-align:center;">Sl.no.</th>
                    <th style="text-align:center;">Product name</th>
                    <th style="text-align:center;">Quantity</th>
                    <th style="text-align:center;">Customer Name</th>
                    <th style="text-align:center;">Contact</th>
                    <th style="text-align:center;">E-mail</th>
                    <th style="text-align:center;">Delivery address</th>
                    <th style="text-align:center;">Ordered On</th>
                    <th style="text-align:center;">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $selQry = "select * from tbl_customer cus inner join tbl_order o on cus.customer_id=o.customer_id inner join tbl_cart ca on o.order_id=ca.order_id inner join tbl_product p on ca.product_id=p.product_id where cart_status =2 and seller_id=" . $sid . "";
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
                      <?php echo $row['prod_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cart_quantity']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_name']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_contact']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['cus_email']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['delivery_address']; ?>
                    </td>
                    <td align="center">
                      <?php echo $row['order_date']; ?>
                    </td>
                    <td>
                    <span class="btn btn-danger btn-icon-text btn-sm" >Cancelled
                      <i class="ti-close btn-icon-append"></i></span></td>
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