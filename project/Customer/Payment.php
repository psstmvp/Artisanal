<?php
ob_start();
include('Head.php');
?>
<html>

<head>
    <title>Payment gateway</title>
    <style>
        body {
            background: #f5f5f5
        }

        .rounded {
            border-radius: 1rem
        }

        .nav-pills .nav-link {
            color: #555
        }

        .nav-pills .nav-link.active {
            color: white
        }

        input[type="radio"] {
            margin-right: 5px
        }

        .bold {
            font-weight: bold
        }
        style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
  </style>
</head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href=" https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script>




        $(function () {
            $('[data-toggle="tooltip"]').tooltip()



        })
    </script>
    <?php
    include("../Assets/Connection/Connection.php");
    $sum = $_SESSION['sum'];
    $oid = $_GET['oid'];
    if (isset($_POST["btncod"]))
        $method = "Cash on Delivery";
    else if (isset($_POST["btnbank"]))
        $method = "Net Banking";
    else if (isset($_POST["btnpay"]))
        $method = "PAY PAL";
    else if (isset($_POST["btnconfirm"]))
        $method = "Credit Card";

    if (isset($_POST["btncod"]) || isset($_POST["btnbank"]) || isset($_POST["btnpay"]) || isset($_POST["btnconfirm"])) {
        $upcartqry = "update tbl_cart set cart_status=1 where order_id=" . $oid . "";
        $conn->query($upcartqry);
        $upqry = "update tbl_order set order_status=1 where order_id=" . $oid . "";
        $conn->query($upqry);
        $insPay = "insert into tbl_payment (order_id, pay_method,pay_amount,pay_time) values('" . $oid . "','" . $method . "','" . $sum . "',current_timestamp())";
        $conn->query($insPay);

        $selqry = "select * from tbl_customer cu inner join tbl_order o on o.customer_id=cu.customer_id inner join tbl_cart c on c.order_id=o.order_id inner join tbl_product p on c.product_id=p.product_id where c.order_id=" . $oid;
        $result = $conn->query($selqry);
        while ($row = $result->fetch_assoc()) {
            $message = "A new order  of product <b>" . $row['prod_name'] . "</b> was received from <b>" . $row['cus_name'] . "</b>";
            $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,seller_id,sent_on)values("order received","mdi mdi-package-variant","' . $message . '","' . $row['seller_id'] . '",current_timestamp())';
            $conn->query($Insqry);


            $orderedstock = 0;
            $addedstock = 0;
                $selstock = "select *from tbl_stock where product_id=" . $row["product_id"] . "";
                $restock = $conn->query($selstock);
                while ($rowstock = $restock->fetch_assoc()) {
                    $addedstock = $addedstock + $rowstock['stock_count'];
                }

                $selcart = "select * from tbl_cart where ( cart_status in (1,3,4) and product_id=" . $row["product_id"] . ")";
                $rescart = $conn->query($selcart);
                while ($rowcart = $rescart->fetch_assoc()) {
                    $orderedstock = $orderedstock + $rowcart['cart_quantity'];
                }

                $stock = $addedstock - $orderedstock;
                if ($stock == 1) {
                    $message = "<b>" . $row['prod_name'] . "</b> has only 1 stock left";
                    $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,seller_id,sent_on)values("Stock Alert!","mdi mdi-chart-line","' . $message . '","' .  $row['seller_id']. '",current_timestamp())';
                    $conn->query($Insqry);
                } else if ($stock == 0) {
                    $message = "<b>" . $row['prod_name'] . "</b> is out of stock";
                    $Insqry = 'insert into tbl_notification (notification_type,notification_class,message,seller_id,sent_on)values("Stock Alert!","mdi mdi-chart-line","' . $message . '","' .  $row['seller_id'] . '",current_timestamp())';
                    $conn->query($Insqry);

                }
            
        }

        ?>
        <script>
            alert(" your order is successfully placed \n thank you for ordering from us😊")
            window.location="OrderMail.php";
        </script>
        <?php
    }

    ?>
    <div class="container py-5">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="display-6"> choose Payment method</h3>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card"
                                        class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card
                                    </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i
                                            class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#cod" class="nav-link "> <i
                                            class="fa fa-truck mr-2"></i> Cash on Delivery </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i
                                            class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>

                            </ul>
                        </div> <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <form role="form" method="post">
                                    <div class="form-group"> <label for="username">
                                            <h6>Card Owner</h6>
                                        </label> <input type="text" name="username" placeholder="Card Owner Name"
                                            required class="form-control "pattern="[A-Za-z ]{0,30}"
                      title="Must contain only alphabets and length should be upto 30 characters."> </div>
                                    <div class="form-group"> <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group"> <input type="text" name="cardNumber"
                                                placeholder="Valid card number" class="form-control " required pattern="\d{12}" title="Must contain exactly 12 digits.">
                                            <div class="input-group-append"> <span class="input-group-text text-muted">
                                                    <i class="fab fa-cc-visa mx-1"></i> <i
                                                        class="fab fa-cc-mastercard mx-1"></i> <i
                                                        class="fab fa-cc-amex mx-1"></i> </span> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group"> <input type="number" placeholder="MM" name=""
                                                        class="form-control" required max="12" maxlength="2"> <input type="number"
                                                        placeholder="YY" name="" class="form-control" required max="99" maxlength="2"> </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">

                                            <div class="form-group mb-4"> <label data-toggle="tooltip"
                                                    title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text" required class="form-control"pattern="\d{3}" title="Must contain exactly 3 digits."> </div>
                                        </div>
                                    </div>
                                    <div class="card-footer"> <button type="submit"
                                            class="subscribe btn btn-primary btn-block shadow-sm" name="btnconfirm">
                                            Confirm Payment </button>
                                </form>
                            </div>
                        </div> <!-- End -->
                        <!-- Paypal info -->
                        <div id="paypal" class="tab-pane fade pt-3">
                            <form role="form" method="post">
                                <h6 class="pb-2">Select your paypal account type</h6>
                                <div class="form-group "> <label class="radio-inline"> <input type="radio"
                                            name="optradio" checked> Domestic </label> <label class="radio-inline">
                                        <input type="radio" name="optradio" class="ml-5">International </label></div>
                                <p> <button type="submit" class="btn btn-primary " name="btnpay"><i
                                            class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                                <p class="text-muted"> Note: After clicking on the button, you will be directed to a
                                    secure gateway for payment. After completing the payment process, you will be
                                    redirected back to the website to view details of your order. </p>
                            </form>
                        </div> <!-- End -->

                        <!-- bank transfer info -->
                        <div id="net-banking" class="tab-pane fade pt-3">
                            <form role="form" method="post">
                                <div class="form-group "> <label for="Select Your Bank">
                                        <h6>Select your Bank</h6>
                                    </label> <select class="form-control" id="ccmonth">
                                        <option value="" selected disabled>--Please select your Bank--</option>
                                        <option>Bank 1</option>
                                        <option>Bank 2</option>
                                        <option>Bank 3</option>
                                        <option>Bank 4</option>
                                        <option>Bank 5</option>
                                        <option>Bank 6</option>
                                        <option>Bank 7</option>
                                        <option>Bank 8</option>
                                        <option>Bank 9</option>
                                        <option>Bank 10</option>
                                    </select> </div>
                                <div class="form-group">
                                    <p> <button type="submit" class="btn btn-primary" name="btnbank"><i
                                                class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                                </div>
                                <p class="text-muted">Note: After clicking on the button, you will be directed to a
                                    secure gateway for payment. After completing the payment process, you will be
                                    redirected back to the website to view details of your order. </p>
                            </form>
                        </div> <!-- End -->
                        <!-- cod info -->
                        <div id="cod" class="tab-pane fade pt-3">
                            <form role="form" method="post">
                                <div class="form-group "> <label class="radio-inline"> <input type="radio"
                                            name="optradio" checked> Cash On Delivery </label></div>
                                <p> <input type="submit" class="btn btn-primary" name="btncod"
                                        value="confirm & continue"> </p>
                            </form>
                        </div> <!-- End -->
                        <!-- End -->
                    </div>
                </div>
            </div>
        </div>
        </form>
        </body>
        <?php
        ob_end_flush();
        include('Foot.php');
        ?>

</html>