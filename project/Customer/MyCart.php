<?php
ob_start();
include('Head.php');   
include("../Assets/Connection/Connection.php");
$cusid = $_SESSION['uid'];


if (isset($_POST["btn_checkout"]) != "") {

    $amt = $_POST["carttotalamt"];

    $selQry = "select * from tbl_order where customer_id='" . $_SESSION['uid'] . "' and order_status='0'";
    $result = $conn->query($selQry);
    if ($srow = $result->fetch_assoc()) {

        $selcusQry = "select * from tbl_customer u inner join tbl_city c on u.city_id=c.city_id inner join tbl_district d on c.district_id=d.district_id where customer_id='" . $cusid . "'";
        $res = $conn->query($selcusQry);
        $row = $res->fetch_assoc();
        $deliveryadd = $row['cus_name']."<br>".$row['cus_contact']."<br>".$row['cus_address']."<br>".$row['city_name'] . "<br>".$row['pincode']."<br>".$row['district_name'];


        $upQry = "update tbl_order set order_date=curdate(),delivery_address='" . $deliveryadd . "',order_price='" . $amt . "' where customer_id='" . $_SESSION['uid'] . "'and order_id='" . $srow["order_id"] . "'";

        if ($conn->query($upQry)) {
            $_SESSION['sum'] = $amt;
            ?>
            <script>
                window.location = "PlaceOrder.php"
            </script>
            <?php


        }

        $_SESSION["oid"] = $srow["order_id"];

    }






}


?>


<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>My Cart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
    
        <style>
            .product-image {
                float: left;
                width: 15%;
                text-align: center;

            }

            .product-details {
                float: left;
                width: 15%;
                text-align: center;

            }

            .product-price {
                float: left;
                width: 14%;
                text-align: center;

            }

            .product-quantity {
                float: left;
                width: 14%;
                text-align: center;

            }

            .product-removal {
                float: left;
                width: 13%;
                text-align: center;

            }

            .product-line-price {
                float: left;
                width: 14%;
                text-align: center;
            }
            

            /* This is used as the traditional .clearfix class */
            .group:before,
            .shopping-cart:before,
            .column-labels:before,
            .product:before,
            .totals-item:before,
            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .product:after,
            .totals-item:after {
                content: "";
                display: table;
            }

            .group:after,
            .shopping-cart:after,
            .column-labels:after,
            .product:after,
            .totals-item:after {
                clear: both;
            }

            .group,
            .shopping-cart,
            .column-labels,
            .product,
            .totals-item {
                zoom: 1;
            }

            /* Apply clearfix in a few places */
            /* Apply dollar signs */
            .product .product-price:before,
            .product .product-line-price:before,
            .totals-value:before {
                content: "₹";
            }

            /* Body/Header stuff */
            body {
                padding: 0px 30px 30px 20px;
                font-family: "HelveticaNeue-Light", "Helvetica Neue Light",
                    "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-weight: 100;
            }

            h1 {
                font-weight: 100;
            }

            label {
                color: #aaa;
            }

            .shopping-cart {
                margin-top: -45px;
            }

            /* Column headers */
            .column-labels label {
                padding-bottom: 15px;
                margin-bottom: 15px;
                border-bottom: 1px solid #eee;
            }
            /* .column-labels .product-image,
            .column-labels .product-details,
            .column-labels .product-removal {
                text-indent: -9999px;
            } */

            /* Product entries */
            .product {
                margin-bottom: 20px;
                padding-bottom: 10px;
                border-bottom: 1px solid #eee;
            }
            .product .product-image {
                float: left;
                width: 16%;
                text-align: center;

            }

            .product  .product-details {
                float: left;
                width: 16%;
                text-align: right;

            }

            .product .product-price {
                float: left;
                width: 16%;
                text-align: right;

            }

            .product .product-quantity {
                float: left;
                width: 16%;
                text-align: right;

            }

            .product  .product-removal {
                float: left;
                width: 16%;
                text-align: right;

            }

            .product .product-line-price {
                float: left;
                width: 16%;
                text-align: right;
            }
           

            /* .product .product-image,
            .product .product-details,
            .product .product-quantity,
            .product .product-removal,
            .product .roduct-line-price
             {
                text-align: center;
            } */
            .product .product-image img {
                width: 100px;
            }
            .product .product-details .product-title {
                margin-right: 20px;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }
            .product .product-details .product-description {
                margin: 5px 20px 5px 0;
                line-height: 1.4em;
            }
            .product .product-quantity input {
                width: 40px;
            }
            .product .remove-product {
                border: 0;
                padding: 4px 8px;
                background-color: #c66;
                color: #fff;
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
                font-size: 12px;
                border-radius: 3px;
            }
            .product .remove-product:hover {
                background-color: #a44;
            }

            /* Totals section */
            .totals .totals-item {
                float: right;
                clear: both;
                width: 100%;
                margin-bottom: 10px;
            }
            .totals .totals-item label {
                float: left;
                clear: both;
                width: 79%;
                text-align: right;
            }
            .totals .totals-item .totals-value {
                float: right;
                width: 21%;
                text-align: right;
            }
            .totals .totals-item-total {
                font-family: "HelveticaNeue-Medium", "Helvetica Neue Medium";
            }

            .checkout {
                float: right;
                border: 0;
                margin-top: 20px;
                padding: 6px 25px;
                background-color: #101b82;
                color: #fff;
                font-size: 25px;
                border-radius: 3px;
            }

            .checkout:hover {
                background-color: #186bc5;
            }

            /* Make adjustments for tablet */
            @media screen and (max-width: 650px) {
                .shopping-cart {
                    margin: 0;
                    padding-top: 20px;
                    border-top: 1px solid #eee;
                }

                .column-labels {
                    display: none;
                }

                .product-image {
                    float: right;
                    width: auto;
                }
                .product-image img {
                    margin: 0 0 10px 10px;
                }

                .product-details {
                    float: none;
                    margin-bottom: 10px;
                    width: auto;
                }

                .product-price {
                    clear: both;
                    width: 70px;
                }

                .product-quantity {
                    width: 100px;
                }
                .product-quantity input {
                    margin-left: 20px;
                }

                .product-quantity:before {
                    content: "x";
                }

                .product-removal {
                    width: auto;
                }

                .product-line-price {
                    float: left	;
                    width: 70px;
                }
            }
            /* Make more adjustments for phone */
            @media screen and (max-width: 350px) {
                .product-removal {
                    float: right;
                }

                .product-line-price {
                    float: right;
                    clear: left;
                    width: auto;
                    margin-top: 10px;
                }

                .product .product-line-price:before {
                    content: "Item Total: ₹";
                }

                .totals .totals-item label {
                    width: 60%;
                }
                .totals .totals-item .totals-value {
                    width: 40%;
                }
            }


            label{
                margin: 0px 14px;
            }



            /*SWITCH 2 ------------------------------------------------*/
            .switch2{
                position: relative;
                display: inline-block;
                width: 60px;
                height: 32px;
                border-radius: 27px;
                background-color: #bdc3c7;
                cursor: pointer;
                transition: all .3s;
            }
            .switch2 input{
                display: none;
            }
            .switch2 input:checked + div{
                left: calc(100% - 40px);
            }
            .switch2 div{
                position: absolute;
                width: 40px;
                height: 40px;
                border-radius: 25px;
                background-color: white;
                top: -4px;
                left: 0px;
                box-shadow: 0px 0px 0.5px 0.5px rgb(170,170,170);
                transition: all .2s;
            }

            .switch2-checked{
                background-color: #2ecc71;
            }

        /* Styles for the modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 10, 40, 0.7);
        }

        /* Styles for the modal content */
        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #C0CBFE;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            width: 300px;

        }

        .closebutton {
            background-color: #0093D9;
            border: none;
            color: white;
            border-radius: 10px;
            float: right;
            padding: 12px 14px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            transition-duration: 0.4s;
            cursor: pointer;
            margin-top: 20px;
        }

        .closebutton:hover {
            background-color: #004F75;
            color: white;
        }
    </style>
</head>

<body onLoad="recalculateCart()" style="padding:0px;">

    <div id="customModal" class="modal">
        <div class="modal-content">
            <h3>Are you sure ?</h3>

            <label>
            </label>
            <button id="MoveModal" class="closebutton">Move to wishlist</button>
            <button id="RemoveModal" class="closebutton">Remove</button>
        </div>
    </div>
    <h1>Cart</h1>
    <form method="post">
        <div class="shopping-cart" style="margin-top: 50px">
            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="product-details">Product</label>
                <label class="product-price">Price</label>
                <label class="product-quantity">Quantity</label>
                <label class="product-removal">Remove</label>
                <label class="product-line-price">Total</label>
            </div>
            <?php
            $sel = "select * from tbl_order b inner join tbl_cart c on c.order_id=b.order_id where b.customer_id='" . $_SESSION['uid'] . "' and order_status=0";
            $rs = $conn->query($sel);
            while ($rss = $rs->fetch_assoc()) {
                $selProd = "select * from tbl_product where product_id='" . $rss["product_id"] . "'";
                $rselt = $conn->query($selProd);

                $prorow = $rselt->fetch_assoc();


                ?>

                <div class="product">
                    <div class="product-image">
                        <a href="ViewProducts.php?spid=<?php echo $prorow["product_id"]; ?>"><img
                                src="../Assets/File/seller/Products/<?php echo $prorow["prod_img"] ?>" /></a>
                    </div>
                    <div class="product-details">
                        <div class="product-title">
                            <?php echo $prorow["prod_name"] ?>
                        </div>
                        <!-- <p class="product-description"> -->
                        <!-- </p> -->
                    </div>
                    <div class="product-price">
                        <?php echo $prorow["prod_price"] ?>
                    </div>
                    <div class="product-quantity">
                    <?php
                        $orderedstock=0;
                        $addedstock=0; 
                        $selstock="select *from tbl_stock where product_id=".$prorow["product_id"] ."";
                        $restock=$conn->query($selstock);
                        while($rowstock=$restock->fetch_assoc())
                        {
                            $addedstock=$addedstock+$rowstock['stock_count'];
                        }
                    
                        $selcart="select * from tbl_cart where ( cart_status in (1,3,4) and product_id=".$prorow["product_id"].")";
                        $rescart=$conn->query($selcart);
                        while($rowcart=$rescart->fetch_assoc())
                        {
                            $orderedstock=$orderedstock+$rowcart['cart_quantity'];
                        }

                        $stock=$addedstock- $orderedstock;
                        ?>
                        <input style="display:inline; border: 1px;" alt="<?php echo $rss["cart_id"] ?>" type="number" value="<?php echo $rss["cart_quantity"] ?>"
                            min="1" max="<?php echo $stock ?>" />
                    </div>
                    <div class="product-removal">
                        <button class="remove-product" onClick="moveWish(this.value)"
                            value="<?php echo $rss["cart_id"] ?>">Remove</button>
                    </div>


                    <div class="product-line-price">
                        <?php
                        $pr = $prorow["prod_price"];
                        $qty = $rss["cart_quantity"];
                        $tot = (float) $pr * (float) $qty;
                        echo $tot;
                        ?>
                    </div>
                </div>
                <?php

            }
            ?>

            <div class="totals">
                <div class="totals-item totals-item-total">
                    <label>Grand Total</label>
                    <div class="totals-value" id="cart-total">0</div>
                    <input type="hidden" id="cart-totalamt" name="carttotalamt" value="<?php echo $tot; ?>" />
                </div>
            </div>

            <button type="submit" class="checkout" name="btn_checkout">Checkout</button>
            <!-- <a class="checkout" href="PlaceOrder.php?sum">Checkout</a>-->


        </div>
    </form>
    <!-- partial -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        /* Set rates + misc */
        var fadeTime = 300;

        /* Assign actions */
        $(".product-quantity input").change(function () {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxActionCart.php?action=Update&id=" + this.alt + "&qty=" + this.value
            });
            updateQuantity(this);

        });



        /* Recalculate cart */
        function recalculateCart() {
            var subtotal = 0;
            console.log('hi');
            /* Sum up row totals */
            $(".product").each(function () {
                subtotal += parseFloat(
                    $(this).children(".product-line-price").text()
                );
            });

            /* Calculate totals */
            var total = subtotal;

            /* Update totals display */
            $(".totals-value").fadeOut(fadeTime, function () {
                $("#cart-total").html(total.toFixed(2));
                document.getElementById("cart-totalamt").value = total.toFixed(2);
                if (total == 0) {
                    $(".checkout").fadeOut(fadeTime);
                } else {
                    $(".checkout").fadeIn(fadeTime);
                }
                $(".totals-value").fadeIn(fadeTime);
            });
        }

        /* Update quantity */
        function updateQuantity(quantityInput) {
            /* Calculate line price */
            var productRow = $(quantityInput).parent().parent();
            var price = parseFloat(productRow.children(".product-price").text());
            var quantity = $(quantityInput).val();
            var linePrice = price * quantity;
            /* Update line price display and recalc cart totals */
            productRow.children(".product-line-price").each(function () {
                $(this).fadeOut(fadeTime, function () {
                    $(this).text(linePrice.toFixed(2));
                    recalculateCart();
                    $(this).fadeIn(fadeTime);
                });
            });
        }


        /* Remove item from cart */
        function removeItem(removeButton) {
            /* Remove row from DOM and recalc cart total */
            var productRow = $(removeButton).parent().parent();
            productRow.slideUp(fadeTime, function () {
                productRow.remove();
                recalculateCart();
            });

        }

        $('.switch2 input').on('change', function () {
            var dad = $(this).parent();
            if ($(this).is(':checked'))
                dad.addClass('switch2-checked');
            else
                dad.removeClass('switch2-checked');
        });

        function moveWish(did) {
            var id = did;

            const modal = document.getElementById('customModal');
            const MoveModalButton = document.getElementById('MoveModal');
            const RemoveModalButton = document.getElementById('RemoveModal');

            modal.style.display = 'block';

            function move() {
                modal.style.display = 'none';
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxActionCart.php?action=Move&id=" + id
                });
                removeItem(this);
				window.location="MyCart.php";

            }
            function remove() {
                modal.style.display = 'none';
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxActionCart.php?action=Delete&id=" + id
                });
                removeItem(this);
				window.location="MyCart.php";


            }
            MoveModalButton.addEventListener('click', move)
            RemoveModalButton.addEventListener('click', remove)
			 event.preventDefault(); // Add this line

        };


        // Attach the closeModal function as the click event handler

    </script>
</body>
<?php
ob_end_flush();
include('Foot.php');
?>

</html>