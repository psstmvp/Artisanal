<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$count = 0;

$oid = $_SESSION["oid"];
$sum = $_SESSION['sum'];
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Place Order</title>
    <link rel="icon" type="image/x-icon" href="../Assets/File/Admin/Artisanal_icon.png" />
    <style>
        /* Style for the overall container */
        .order-container {
            margin-top: 60px;
            width: 550px;
            border-radius: 20px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Style for the delivery address */
        .delivery-address {
            font-weight: bold;
        }

        /* Style for the "Change Delivery Address" link */
        .change-address-link {
            text-decoration: none;
            color: #007bff;
        }

        /* Style for the order summary table */
        .order-summary {
            border-collapse: collapse;
            width: 100%;
        }

        /* Style for table headings */
        .table-heading {

            text-align: center;
            background-color: #f0f0f0;
        }

        /* Style for table cells */
        .table-cell {
            text-align: center;
        }

        /* Style for the total price cell */
        .total-price {
            font-weight: bold;
        }

        .product-image {
            max-width: 100px;
            max-height: 100px;
            border-radius: 20px;
        }

        .product-name {
            color: gray;
            width: 120px;
            /* Add other styles as needed */
        }

        .cart-quantity {
            color: gray;
        }

        .prod-price {
            font-weight: bold;
            color: green;
            /* Example color */
            /* Add other styles as needed */
        }
    </style>

</head>

<body>
    <center>
        <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
            <?php
            $sQry = "select *from tbl_order where order_id=" . $oid . "";
            $orderres = $conn->query($sQry);
            $orderrow = $orderres->fetch_assoc();
            ?>
            <div class="order-container p-5">
                <!-- Delivery Address Section -->
                <div>
                    <span class="delivery-address">Delivery Address:</span>
                    <div id="dlyadd" style="text-align:left; margin-left:30px;">
                        <?php echo $orderrow["delivery_address"]; ?>
                    </div>
                </div>
                <div style="text-align: right;">
                    <a class="change-address-link"
                        href="DeliveryAdd.php?odid=<?php echo $orderrow["order_id"] ?>">Change Delivery Address</a>
                </div>

                <!-- Order Summary Section -->
                <div class="order-summary">
                    <div class="table-heading" style="text-align: center;">Order Summary</div>
                    <?php
                    $cselQry = "select * from tbl_cart c inner join tbl_product p on c.product_id=p.product_id where order_id=" . $oid . "";
                    $cres = $conn->query($cselQry);
                    while ($row = $cres->fetch_assoc()) {
                        ?>
                        <div style="margin-top:20px;display:flex; justify-content: space-evenly;align-items: center; ">
                            <div class="table-cell">
                                <img class="product-image"
                                    src="../Assets/File/seller/Products/<?php echo $row["prod_img"] ?>" width="100"
                                    height="100" />
                            </div>
                            <div class="table-cell product-name">
                                <?php echo $row['prod_name']; ?>
                            </div>
                            <div class="table-cell cart-quantity">
                                <?php echo $row['cart_quantity']; ?>
                            </div>
                            <div class="table-cell prod-price">
                                <?php echo $row['prod_price'] . "/-"; ?>
                            </div>
                        </div>
                        <?php
                        $count = $count + $row['cart_quantity'];
                        $upqry = "update tbl_order set order_quantity=" . $count . " where  order_id=" . $oid . "";
                        $conn->query($upqry);
                    }
                    // Your PHP code for displaying order items here
                    ?>
                </div>


                    <div class="table-cell table-heading" style="text-align: center; margin-top:30px;">Price details
                    </div>
                    <div style="display:flex; justify-content:space-between;">
                    <div class="table-cell" style="text-align:left;">
                        <?php echo "Total Price (" . $count . " items)"; ?>
                    </div>
                    <div class="table-cell total-price" style="margin-right:40px;">
                        <?php echo $sum."/-"; ?>
                    </div>
                    </div>

                <!-- Confirm Order Link -->
                <div style="text-align: center; margin-top:25px;">
                    <a class="btn btn-primary" style="background-color:#2865AF;border-radius: 20px;"
                        href="Payment.php?oid=<?php echo $oid ?>">Confirm Order</a>
                </div>
            </div>

    </center>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>