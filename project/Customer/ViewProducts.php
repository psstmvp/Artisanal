<?php
ob_start();
include('Head.php');
include("../Assets/Connection/Connection.php");
$_SESSION['uid'];
$prodid = $_GET['spid'];

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Products</title>
    <style>
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
        <?php

        $selQry = "select * from tbl_product p inner join tbl_subcategory s on p.subcat_id=s.subcat_id inner join tbl_category c on s.category_id=c.category_id where product_id='" . $prodid . "'";
        $res = $conn->query($selQry);
        $row = $res->fetch_assoc();


        ?>
        <!-- content -->
        <section class="py-5">
            <div class="container" >
                <div class="row gx-5">
                    <aside class="col-lg-6">
                        <div class=" rounded-4 mb-3 d-flex justify-content-center">


                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" style="width: 350px;height: 480px;overflow: hidden;">
                                        <img class="d-block w-100" style="width: 100%;height: 100%;object-fit: cover;"
                                            src="../Assets/File/seller/Products/<?php echo $row["prod_img"] ?>">
                                    </div>
                                    <?php $sel = "select * from tbl_product_gallery where product_id='" . $prodid . "'";
                                    $gres = $conn->query($sel); ?>
                                    <?php while ($grow = $gres->fetch_assoc()) { ?>
                                        <div class="carousel-item"  style="width: 350px;height: 480px;overflow: hidden;">
                                            <img class="d-block w-100" style="width: 100%;height: 100%;object-fit: cover;"
                                                src="../Assets/File/seller/Products/<?php echo $grow["product_img"] ?>" />
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <!-- thumbs-wrap.// -->
                        <!-- gallery-wrap .end// -->
                    </aside>
                    <main class="col-lg-6">
                        <div class="ps-lg-3">
                            <h4 class="title text-dark">
                                <?php echo $row['prod_name']; ?>
                            </h4>
                            <div class="d-flex flex-row my-3" style="justify-content:center;">
                                <div class="text-warning mb-1 me-2">
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
                                </div>
                            </div>

                            <div class="mb-3">
                                <span class="h5">
                                    <?php echo "₹" . $row['prod_price'] . " /-"; ?>
                                </span>
                                <span class="text-muted"> </span>
                            </div>

                            <p>
                                <?php echo $row['prod_description']; ?>
                            </p>
                            <br>
                            <div class="row">
                            <dt class="col-3">Type</dt>
                            <dd class="col-9">
                                <?php $typeid = explode(",", $row['type_id']);
                        for ($i = 0; $i < sizeof($typeid); $i++) {
                          $tySelQry = "select * from tbl_type where type_id= " . $typeid[$i] . "";
                          $tyres = $conn->query($tySelQry);
                          while ($tyrow = $tyres->fetch_assoc()) {
                            ?>
                            <?php echo $tyrow['type_name'] . ", "; ?>
                            <?php
                          }

                        }
                        ?></dd>

                                <dt class="col-3">Color</dt>
                                <dd class="col-9">
                                    <?php echo $row['prod_color']; ?>
                                </dd>

                                <dt class="col-3">Material</dt>
                                <dd class="col-9">
                                    <?php echo $row['prod_material']; ?>
                                </dd>

                                <dt class="col-3">category</dt>
                                <dd class="col-9">
                                    <?php echo $row['category_name']; ?>
                                </dd>
                            </div>

                            <hr />
                            <div style="display:flex; justify-content:center; align-items:center">
                                <?php
                                $orderedstock = 0;
                                $addedstock = 0;
                                $stock = 0;
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
                                if ($stock < 1) {
                                    ?>

                                    <span class="btn btn-primary"
                                        style="background-color:#861313;color:#fff; border-radius: 10px; width:160px;height: 40px;">
                                        Out of Stock</span>


                                    <?php
                                } else {
                                    ?>
                                    <a class="btn btn-warning shadow-0"
                                        onclick="addCart(<?php echo $row['product_id'] ?>,1)"
                                        style="color:#fff; border-radius: 10px; width:130px;height: 40px;"> Buy now </a>

                                    <a class="btn btn-primary" onclick="addCart(<?php echo $row['product_id'] ?>)"
                                        style=" margin-left:10px; background-color:#2865AF;color:#fff; border-radius: 10px; width:130px;height: 40px;">
                                        add to cart
                                        <i class="zmdi zmdi-shopping-cart" style="font-size: 20px; color:#fff;"></i></a>

                                <?php } ?>

                                <?php

                                $selqry = "select * from tbl_wishlist where customer_id=" . $_SESSION['uid'] . " and product_id=" . $prodid . "";
                                $resw = $conn->query($selqry);
                                ?>
                                <a style="margin-left:20px;" onClick="addWish(<?php echo $row['product_id'] ?>)">
                                    <span id="checkwish">
                                        <?php if ($roww = $resw->fetch_assoc()) { ?>
                                            <i class="zmdi zmdi-favorite" style="font-size:45px;color:red;"></i>
                                        <?php } else { ?>
                                            <i class="zmdi zmdi-favorite-outline" style="font-size:45px;color:black;"></i>
                                        <?php } ?>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </section>
        <!-- content -->

        <section class="bg-light border-top py-4">
            <div class="container">
                <div class="row gx-4">
                    <div class="col-lg-8 mb-4" style="display:flex;">


                        <div class="card"
                            style="width:100%;border-radius:12px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                            <div style="padding-top:10px;">
                                <h4 style="color:#2865AF;margin-top:10px;">Ratings</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                        <h1 class="text-warning mt-4 mb-4">
                                            <b><span id="average_rating">0.0</span> / 5</b>
                                        </h1>
                                        <div class="mb-3">
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                        </div>
                                        <h3><span id="total_review">0</span> Review</h3>
                                    </div>
                                    <div class="col-sm-4">
                                        <p>
                                        <div class="progress-label-left"><b>5</b> <i
                                                class="fas fa-star text-warning"></i>
                                        </div>

                                        <div class="progress-label-right">(<span id="total_five_star_review">0</span>)
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                        </div>
                                        </p>
                                        <p>
                                        <div class="progress-label-left"><b>4</b> <i
                                                class="fas fa-star text-warning"></i>
                                        </div>

                                        <div class="progress-label-right">(<span id="total_four_star_review">0</span>)
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                        </div>
                                        </p>
                                        <p>
                                        <div class="progress-label-left"><b>3</b> <i
                                                class="fas fa-star text-warning"></i>
                                        </div>

                                        <div class="progress-label-right">(<span id="total_three_star_review">0</span>)
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                        </div>
                                        </p>
                                        <p>
                                        <div class="progress-label-left"><b>2</b> <i
                                                class="fas fa-star text-warning"></i>
                                        </div>

                                        <div class="progress-label-right">(<span id="total_two_star_review">0</span>)
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                        </div>
                                        </p>
                                        <p>
                                        <div class="progress-label-left"><b>1</b> <i
                                                class="fas fa-star text-warning"></i>
                                        </div>

                                        <div class="progress-label-right">(<span id="total_one_star_review">0</span>)
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0"
                                                aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                        </div>
                                        </p>
                                    </div>
                                </div>


                            </div>
                        </div>



                    </div>




                    <div class="col-lg-4  mb-4" style="display:flex;">
                        <div class="card"
                            style="width:300px;border-radius:12px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                            <div class="card-body">
                                <?php $selbio = "select * from tbl_seller_bio where seller_id=" . $row['seller_id'] . "";
                                $resbio = $conn->query($selbio);
                               if( $rowbio = $resbio->fetch_assoc()) {
                                ?>
                                <h3 style="margin-top:10px;">Product Seller</h3>
                                <span style="color:gray">support your fav sellers</span><br>
                                <a style="text-decoration:none;"
                                    href="EachSeller.php?siid=<?php echo $rowbio['seller_bio_id']; ?>">see more</a>

                                <div class="d-flex justify-content-center">
                                    <span
                                        style="width: 150px;height: 150px;overflow: hidden;border-radius: 50%; margin-top:30px;margin-bottom:20px;">
                                        <img src="../Assets/File/Seller/SellerBio/<?php echo $rowbio['sell_profilepic']; ?>"
                                            style="width: 100%;height: 100%;object-fit: cover;"> </span>
                                </div>
                                <div class="text-center my-6">
                                    <!-- Title -->
                                    <span class="d-block h4" style="margin-bottom:10px;">
                                        <?php echo $rowbio['bio_nickname']; ?>
                                    </span>
                                    <!-- Subtitle -->
                                    <span class="d-block text text-muted">
                                        <?php echo $rowbio['bio_email']; ?>
                                    </span>
                                    <span class="d-block text text-muted">
                                        <?php echo $rowbio['bio_details']; ?>
                                    </span>

                                </div>
                                <?php
                               } else { echo "seller has not made a public profile..!"; }?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="mt-5" id="review_content"></div>
                <input type="hidden" name="txt_pid" id="txt_pid" value="<?php echo $row["product_id"] ?>" />
            </div>
            </div>
        </section>


        <script src="../Assets/Template/Search/jquery.min.js"></script>
        <script>


            load_rating_data();

            function load_rating_data() {
                var product_id = $('#txt_pid').val();

                $.ajax({
                    url: "../Assets/AjaxPages/AjaxRating.php",
                    method: "POST",
                    data: { action: 'load_data', pid: product_id },
                    // dataType:"JSON",
                    success: function (data) {
                        var data = JSON.parse(data);

                        $("#review_content").html(data);


                        $('#average_rating').text(data.average_rating);
                        $('#total_review').text(data.total_review);

                        var count_star = 0;

                        $('.main_star').each(function () {
                            count_star++;
                            if (Math.ceil(data.average_rating) >= count_star) {
                                $(this).addClass('text-warning');
                                $(this).addClass('star-light');
                            }
                        });

                        $('#total_five_star_review').text(data.five_star_review);

                        $('#total_four_star_review').text(data.four_star_review);

                        $('#total_three_star_review').text(data.three_star_review);

                        $('#total_two_star_review').text(data.two_star_review);

                        $('#total_one_star_review').text(data.one_star_review);

                        $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

                        $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

                        $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

                        $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

                        $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

                        if (data.review_data.length > 0) {
                            var html = '';

                            for (var count = 0; count < data.review_data.length; count++) {
                                html += '<div class="row mb-3">';

                                html += '<div class="col-sm-1" style="max-width: 7%;"><div class="rounded-circle bg-info text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_name.charAt(0) + '</h3></div></div>';

                                html += '<div class="col-sm-11">';

                                html += '<div class="card" style="border-radius:12px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">';

                                html += '<div style="text-align:left; padding-left:30px;"><b>' + data.review_data[count].user_name + '</b></div>';

                                html += '<div class="card-body">';

                                for (var star = 1; star <= 5; star++) {
                                    var class_name = '';

                                    if (data.review_data[count].rating >= star) {
                                        class_name = 'text-warning';
                                    }
                                    else {
                                        class_name = 'star-light';
                                    }

                                    html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
                                }

                                html += '<br />';

                                html += data.review_data[count].user_review;

                                html += '</div>';

                                html += '<div class="text-right" style="padding-right:30px;color:gray;">On ' + data.review_data[count].datetime + '</div>';

                                html += '</div>';

                                html += '</div>';

                                html += '</div>';
                            }

                            $('#review_content').html(html);
                        }
                    }
                })
            }
            function addCart(id, buy) {
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
                        if (buy) {
                            window.location = "MyCart.php";
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
                            $("#checkwish").html('<i class="zmdi zmdi-favorite" style="font-size:45px;color:red;"></i>');
                        }
                        else if (response.trim() === "removed from Wishlist") {
                            $("div.removed").fadeIn(300).delay(1500).fadeOut(400);
                            $("#checkwish").html('<i class="zmdi zmdi-favorite-outline" style="font-size:45px;color:black;"></i>');
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
