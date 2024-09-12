<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");

$_SESSION['uid'];
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>My Wishlist</title>
    <link rel="stylesheet" href="../Assets/Template/Search/bootstrap.min.css">
    <style>
        .container-wish {
            width: 350px;
            background-color: #ffffff;
            padding-top: 40px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            margin-top: 30px;
            margin-left: 30px;
        }

        .custom-alert-box {
            z-index: 1;
            width: 20%;
            height: 10%;
            position: fixed;
            bottom: 0;
            right: 0;
            left: auto;
        }

        .success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
            display: none;
        }

        .failure {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            display: none;
        }

        .warning {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
            display: none;
        }

        .added {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
            display: none;
        }

        .removed {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            display: none;
        }
    </style>
</head>

<body>
    <div class="custom-alert-box">
        <div class="alert-box success">Successful Added to Cart !!!</div>
        <div class="alert-box failure">Failed to Add Cart !!!</div>
        <div class="alert-box warning">Already Added to Cart !!!</div>
        <div class="alert-box added"> Added to Wishlist !!!</div>
        <div class="alert-box removed">removed From Wishlist !!!</div>

    </div>
    <center>
        <h2 style="color:#2865a4" align="left">WISHLIST</h2>
        <div class=row>
            <?php
            $wselQry = "select * from tbl_wishlist where customer_id=" . $_SESSION['uid'] . "";
            $wres = $conn->query($wselQry);
            while ($wrow = $wres->fetch_assoc()) {
                $prodid = $wrow['product_id'];

                $selQry = "select * from tbl_product where product_id=" . $prodid . "";
                $res = $conn->query($selQry);
                while ($row = $res->fetch_assoc()) {

                    ?>

                    <div class=container-wish>

                        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women" style="max-width:100%;">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-pic hov-img0">
                                    <img src="../Assets/File/seller/Products/<?php echo $row["prod_img"] ?>" alt="IMG-PRODUCT"
                                        style="width: 300px;height: 300px; object-fit: fill; border-radius:15px;">

                                    <a href="ViewProducts.php?spid=<?php echo $row["product_id"]; ?>"
                                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                        View more
                                    </a>
                                </div>

                                <div class="block2-txt flex-w flex-t p-t-14">
                                    <div class="block2-txt-child1 flex-col-l ">
                                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                            <?php echo $row["prod_name"]; ?>
                                        </a>
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

                                            while ($rowr = $result->fetch_assoc()) {


                                                if ($rowr["rating_value"] == '5') {
                                                    $five_star_review++;
                                                }

                                                if ($rowr["rating_value"] == '4') {
                                                    $four_star_review++;
                                                }

                                                if ($rowr["rating_value"] == '3') {
                                                    $three_star_review++;
                                                }

                                                if ($rowr["rating_value"] == '2') {
                                                    $two_star_review++;
                                                }

                                                if ($rowr["rating_value"] == '1') {
                                                    $one_star_review++;
                                                }

                                                $total_review++;

                                                $total_user_rating = $total_user_rating + $rowr["rating_value"];

                                            }


                                            if ($total_review == 0 || $total_user_rating == 0) {
                                                $average_rating = 0;
                                            } else {
                                                $average_rating = $total_user_rating / $total_review;
                                            }

                                            ?>
                                            <p align="center" style="color:#F96;font-size:20px">
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

                                        <span class="stext-105 cl3">
                                            <?php echo $row["prod_price"]; ?>/-
                                        </span>

                                    </div>
                                </div>



                                <div class="block2-txt-flex-w flex p-t-14" style="text-align: center;">
                                    <?php

                                    $orderedstock = 0;
                                    $addedstock = 0;
                                    $stock = 0;
                                    $selstock = "select *from tbl_stock where product_id=" . $row['product_id'] . "";
                                    $restock = $conn->query($selstock);
                                    while ($rowstock = $restock->fetch_assoc()) {
                                        $addedstock = $addedstock + $rowstock['stock_count'];
                                    }

                                    $selcart = "select * from tbl_cart where ( cart_status in (1,3,4) and product_id=" . $row['product_id'] . ")";
                                    $rescart = $conn->query($selcart);
                                    while ($rowcart = $rescart->fetch_assoc()) {
                                        $orderedstock = $orderedstock + $rowcart['cart_quantity'];
                                    }

                                    $stock = $addedstock - $orderedstock;
                                    if ($stock < 1) {
                                        ?>
                                        <div>
                                        <span style="color:red;"> Out of Stock</span>
                                        <?php
                                    } else {
                                        ?>
                                        <div>
                                            <div style="text-align:center;">
                                                <a class="btn btn-primary" onclick="addCart(<?php echo $row['product_id'] ?>)"
                                                    style="background-color:#2865AF;color:#fff; border-radius: 20px; width:160px;height: 50px;">
                                                    add to cart
                                                    <i class="zmdi zmdi-shopping-cart" style="font-size: 30px; color:#fff;"></i></a>
                                            </div>
                                            <?php
                                    }
                                    ?>
                                        <div style="margin-top:15px;text-align:center;">
                                            <a onClick="addWish(<?php echo $row['product_id'] ?>)" class="btn"
                                                style="background-color:#C5F1FF;color:#2865AF; border-radius: 20px; width:200px;height: 50px;">
                                                remove from wishlist<i class="zmdi zmdi-favorite"
                                                    style="font-size:25px;color:#2865AF;"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                }
            } ?>
        </div>
        <script src="../Assets/Template/Search/jquery.min.js"></script>
        <script>
            function addCart(id) {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxCart.php?id=" + id,
                    success: function (response) {
                        if (response.trim() === "Added to Cart") {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart") {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }
        </script>
        <script>
            function addWish(id) {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxWishlist.php?id=" + id,
                    success: function (response) {
                        if (response.trim() === "added to Wishlist") {
                            $("div.added").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "removed from Wishlist") {
                            $("div.removed").fadeIn(300).delay(1500).fadeOut(400);
                            window.location = "MyWishlist.php"
                        }

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