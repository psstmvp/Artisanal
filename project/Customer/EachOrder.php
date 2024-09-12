<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$cid = $_SESSION['uid'];
$cartid = $_GET['cartid'];
$msg = "";

$sel = "select * from tbl_cart c inner join tbl_product p on c.product_id=p.product_id where cart_id='" . $cartid . "'";
$res = $conn->query($sel);
$row = $res->fetch_assoc();
$prodid = $row['product_id'];
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../Assets/CssPages/EachOrderCss.css" />
    <link rel="stylesheet" href="../Assets/CssPages/ratingStar.css" />
    <title>Each Order</title>
    <style>
        .modal-dialog {
            min-width: 600px;
            position: sticky;
            top: 50%;
            margin-top:300px;
           
        }
    </style>
</head>

<body>
    <?php
    $sel = "select * from tbl_cart c inner join tbl_product p on c.product_id=p.product_id where cart_id='" . $cartid . "'";
    $res = $conn->query($sel);
    if ($row = $res->fetch_assoc()) {
        if ($row['cart_status'] == 1)
            $status = "Confirmed";
        else if ($row['cart_status'] == 2)
            $status = "Cancelled";
        else if ($row['cart_status'] == 3)
            $status = "Shipped";
        else if ($row['cart_status'] == 4)
            $status = "Delivered";
        ?>



        <div class="product-container">
            <div class="product-details">
                <div class="product-image-container" style="max-width:200px; max-height: 200px;">
                    <img class="product-image" src="../Assets/File/seller/Products/<?php echo $row["prod_img"] ?>"
                        alt="Product">
                </div>
                <div class="product-info">
                    <span class="product-name">
                        <?php echo $row["prod_name"] ?>
                    </span>
                    <span class="product-price">price: ₹
                        <?php echo $row["prod_price"] ?>/-
                    </span>
                    <span class="quantity">x
                        <?php echo $row["cart_quantity"] ?>
                    </span>
                    <span>
                        <?php
                        $average_rating = 0;
                        $total_review = 0;
                        $five_star_review = 0;
                        $four_star_review = 0;
                        $three_star_review = 0;
                        $two_star_review = 0;
                        $one_star_review = 0;
                        $total_user_rating = 0;
                        $review_content = array();

                        $query = "SELECT * FROM tbl_rating r inner join tbl_cart  ca on  ca.cart_id=r.cart_id where ca.product_id = '" . $row["product_id"] . "' ORDER BY rating_id DESC";

                        $result = $conn->query($query);

                        while ($row = $result->fetch_assoc()) {


                            if ($row["rating_value"] == '5') {
                                $five_star_review++;
                            }

                            if ($row["rating_value"] == '4') {
                                $four_star_review++;
                            }

                            if ($row["rating_value"] == '3') {
                                $three_star_review++;
                            }

                            if ($row["rating_value"] == '2') {
                                $two_star_review++;
                            }

                            if ($row["rating_value"] == '1') {
                                $one_star_review++;
                            }

                            $total_review++;

                            $total_user_rating = $total_user_rating + $row["rating_value"];

                        }


                        if ($total_review == 0 || $total_user_rating == 0) {
                            $average_rating = 0;
                        } else {
                            $average_rating = $total_user_rating / $total_review;
                        }

                        ?>
                        <p style="color:#F96;font-size:15px">
                            <?php
                            if ($average_rating == 5 || $average_rating == 4.5) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <?php
                            }
                            if ($average_rating == 4 || $average_rating == 3.5) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <?php
                            }
                            if ($average_rating == 3 || $average_rating == 2.5) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <?php
                            }
                            if ($average_rating == 2 || $average_rating == 1.5) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <?php
                            }
                            if ($average_rating == 1) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#FC3"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <?php
                            }
                            if ($average_rating == 0) {
                                ?>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <i class="fas fa-star star-light mr-1 main_star" style="color:#999"></i>
                                <?php
                            }
                            ?>

                        </p>
                        <?php

                        $output = array(
                            'average_rating' => number_format($average_rating, 1),
                            'total_review' => $total_review,
                            'five_star_review' => $five_star_review,
                            'four_star_review' => $four_star_review,
                            'three_star_review' => $three_star_review,
                            'two_star_review' => $two_star_review,
                            'one_star_review' => $one_star_review,
                            'review_data' => $review_content
                        );
                        ?>


                    </span>
                </div>

            </div>
            <div class="order-status-container">
                <span class="order-status">Order Status:
                    <?php echo $status ?>

                </span>
            </div>

            <?php if ($status === "Confirmed" || $status === "Shipped") { ?>
                <div class="button-container">
                    <button class="cancel-button" onclick="showConfirmationModal()">cancel</button>
                </div>
            <?php } ?>
            <div id="confirmationModal" class="modal">
                <div class="modal-content">
                    <p>Do you want to cancel this order?</p>
                    <button value="<?php echo $cartid ?>" onclick="cancelOrder(this.value)">Yes</button>
                    <button onclick="closeModal()">No</button>
                </div>
            </div>

            <?php if ($status === "Delivered") {

                $selrating = "select * from tbl_rating where cart_id=" . $cartid . " ";
                $ratres = $conn->query($selrating);
                if (!($ratrow = $ratres->fetch_assoc())) {
                    ?>
                    <div class="button-container">
                        <button class="cancel-button" type="button" name="add_review" id="add_review"> review</button>
                    </div>
                    <?php
                } else { ?>
                    <div class=rating-container>
                        <h4>Your Rating </h4>
                        <div class="rating">
                            <?php
                            $rating = $ratrow['rating_value']; // Replace with the actual rating value from your database
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<span class="star">&#9733;</span>'; // Filled star
                                } else {
                                    echo '<span class="star">&#9734;</span>'; // Empty star
                                }
                            }
                            ?>
                        </div>
                        <div>

                            <?php
                }
            }

            ?>


                </div>
                <?php
    }
    ?>

        </div>
    </div>


    <div id="review_modal" class="modal" tabindex="-1" style="z-index: 99999 !important;" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="position:relative;">
                <div class="modal-header">
                    <h5 class="modal-title"data-dismiss="modal">Submit Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center mt-2 mb-4">
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                    </h4>
                    <div class="form-group">

                        <input type="hidden" name="txtpid" id="txtpid" value="<?php echo $prodid ?>" />
                        <input type="hidden"  name="txtcart" id="txtcart" value="<?php echo $cartid ?>" />

                    </div>
                    <div class="form-group">
                        <textarea name="user_review" id="user_review" class="form-control"
                            placeholder="Type Review Here"></textarea>
                    </div>
                    <div class="form-group text-center mt-4">
                        <button  type="button" class="cancel-button" id="save_review" data-dismiss="modal" aria-label="Close">Submit</button>
                    </div>
                </div>
            </div>
        </div>
</body>

<script src="../Assets/JQ/jQuery.js "></script>
<script>

    $(document).ready(function () {

        var rating_data = 0;

        $('#add_review').click(function () {

            $('#review_modal').modal('show');

        });

        $(document).on('mouseenter', '.submit_star', function () {

            var rating = $(this).data('rating');

            reset_background();

            for (var count = 1; count <= rating; count++) {

                $('#submit_star_' + count).addClass('text-warning');

            }

        });

        function reset_background() {
            for (var count = 1; count <= 5; count++) {

                $('#submit_star_' + count).addClass('star-light');

                $('#submit_star_' + count).removeClass('text-warning');

            }
        }

        $(document).on('mouseleave', '.submit_star', function () {

            reset_background();

            for (var count = 1; count <= rating_data; count++) {

                $('#submit_star_' + count).removeClass('star-light');

                $('#submit_star_' + count).addClass('text-warning');
            }

        });

        $(document).on('click', '.submit_star', function () {

            rating_data = $(this).data('rating');

        });

        $('#save_review').click(function () {

            var user_name = $('#user_name').val();

            var user_review = $('#user_review').val();

            var product_id = $('#txtpid').val();

            var cart_id = $('#txtcart').val();

            if (user_review == '') {
                alert("Please Fill Both Field");
                return false;
            }
            else {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxRating.php",
                    method: "POST",
                    data: { rating_data: rating_data, user_review: user_review, product_id: product_id,cart_id: cart_id, check: 'check' },
                    success: function (data) {
                        $('#review_modal').modal('hide');
                        alert(data);
                        window.location = "EachOrder.php?cartid=<?php echo $cartid; ?>";

                        // load_rating_data();
                        // $("#review_content").html(data);
                       
                    }
                })
            }

        });



    });




    function showConfirmationModal() {
        var modal = document.getElementById("confirmationModal");
        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById("confirmationModal");
        modal.style.display = "none";
    }


    function cancelOrder(ca) {
        $.ajax({
            url: "../Assets/AjaxPages/AjaxOrderCancel.php?caid=" + ca,
            success: function (html) { }
        });
        closeModal();
        alert("Order has been cancelled.");
        window.location = "EachOrder.php?cartid=<?php echo $cartid; ?>";
    }


    document.getElementById('reviewbutton').addEventListener('click', function () {
        // Get references to the div elements
        var div1 = document.getElementById('review');

        // Toggle their visibility
        if (div1.style.display === 'none') {
            div1.style.display = 'block'; // Show div1
        } else {
            div1.style.display = 'none'; // Hide div1
        }
    });
</script>
<?php
ob_end_flush();
include('Foot.php');
?>
</html>