<?php
include("../Connection/Connection.php");
session_start();


if (isset($_GET["action"])) {

    $sqlQry = "SELECT * from tbl_product p inner join tbl_subcategory s on s.subcat_id =p.subcat_id inner join tbl_category c on c.category_id=s.category_id where true ";

    if ($_GET["subcat"] != null) {

        $subcat = $_GET["subcat"];

        $sqlQry = $sqlQry . " AND s.subcat_id IN(" . $subcat . ")";
    }
    if ($_GET["category"] != null) {

        $category = $_GET["category"];

        $sqlQry = $sqlQry . " AND c.category_id IN(" . $category . ")";
    }

    if ($_GET["name"] != null) {

        $name = $_GET["name"];

        $sqlQry = $sqlQry ." AND (p.prod_name LIKE '%" . $name . "%'
        OR p.prod_color LIKE '%" . $name . "%'
        OR p.prod_material LIKE '%" . $name . "%'
        OR p.prod_tag LIKE '%" . $name . "%'
        OR c.category_name LIKE '%" . $name . "%'
        OR s.subcat_name LIKE '%" . $name . "%')";
    }
    if ($_GET["typeNo"] != 0) {

        $typeNo = $_GET["typeNo"];

        $sqlQry = $sqlQry . " AND   FIND_IN_SET('" . $typeNo . "', p.type_id)";
    }
    $sqlQry = $sqlQry . " order by prod_date DESC";
    $resultS = $conn->query($sqlQry);



    if ($resultS->num_rows > 0) {
        $count=0;
        while ($rowS = $resultS->fetch_assoc()) {
            $count++;
            ?>

            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="../Assets/File/seller/Products/<?php echo $rowS["prod_img"] ?>" alt="IMG-PRODUCT"
                            style="width: 300px;height: 300px; object-fit: fill;">

                        <a href="ViewProducts.php?spid=<?php echo $rowS["product_id"]; ?>"
                            class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                            View more
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                <?php echo $rowS["prod_name"]; ?>
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

                                $query = "SELECT * FROM tbl_rating r inner join tbl_cart  ca on  ca.cart_id=r.cart_id where ca.product_id = '" . $rowS["product_id"] . "' ORDER BY rating_id DESC";

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
                                <?php echo $rowS["prod_price"]; ?>/-
                            </span>

                        </div>



                        <div class="block2-txt-child2 flex-r p-t-3">
                            <?php
                            if(isset($_SESSION['uid'])) {
                            $orderedstock = 0;
                            $addedstock = 0;
                            $stock = 0;
                            $selstock = "select *from tbl_stock where product_id=" . $rowS['product_id'] . "";
                            $restock = $conn->query($selstock);
                            while ($rowstock = $restock->fetch_assoc()) {
                                $addedstock = $addedstock + $rowstock['stock_count'];
                            }

                            $selcart = "select * from tbl_cart where ( cart_status in (1,3,4) and product_id=" . $rowS['product_id'] . ")";
                            $rescart = $conn->query($selcart);
                            while ($rowcart = $rescart->fetch_assoc()) {
                                $orderedstock = $orderedstock + $rowcart['cart_quantity'];
                            }

                            $stock = $addedstock - $orderedstock;
                            if ($stock < 1) {
                                ?>
                                <span style="color:red;"> Out of Stock</span>
                                <?php
                            } else {
                                ?>
                                <span style="margin-right: 25px;margin-top: 30px;">
                                    <a href="#" onclick="addCart(<?php echo $rowS['product_id'] ?>)">
                                        <i class="zmdi zmdi-shopping-cart" style="font-size: 30px;"></i></a></span>
                                <?php
                            }
                            ?> <span>
                                <?php
                                
                                $selqry = "select * from tbl_wishlist where customer_id=" . $_SESSION['uid'] . " and product_id=" . $rowS['product_id'] . "";
                                $resw = $conn->query($selqry);
                                ?>
                                <a onClick="addWish(<?php echo $rowS['product_id'] ?>,<?php echo $count ?>)">
                                    <span id="checkwish<?php echo $count ?>">
                                        <?php if ($roww = $resw->fetch_assoc()) { ?>
                                            <i class="zmdi zmdi-favorite" style="font-size:25px;color:red;"></i>
                                        <?php } else { ?>
                                            <i class="zmdi zmdi-favorite-outline" style="font-size:25px;color:black;"></i>
                                        <?php } ?>
                                    </span>
                                </a>
                                <?php }?> 
                            </span>

                        </div>

                    </div>
                </div>
            </div>



















            <?php
        }
    } else {
        echo "<h4 align='center'>Products Not Found!!!!</h4>";
    }
}

?>