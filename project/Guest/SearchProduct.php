<?php
include("../Assets/Connection/Connection.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../A.png " />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="../Assets/Template/Main/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="../Assets/Template/Main/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="../Assets/Template/Main/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/css/util.css">

    <link rel="stylesheet" type="text/css" href="../Assets/Template/Main/css/main.css">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


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




    <!--===============================================================================================-->
</head>

<body class="animsition" onload="productCheck()">
    <div class="custom-alert-box">
        <div class="alert-box success">Successful Added to Cart !!!</div>
        <div class="alert-box failure">Failed to Add Cart !!!</div>
        <div class="alert-box warning">Already Added to Cart !!!</div>
        <div class="alert-box added"> Added to Wishlist !!!</div>
        <div class="alert-box removed">removed From Wishlist !!!</div>
    </div>

    <!-- Header -->
    <header>
		<!-- Header desktop -->
		<div class=" fix-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar" style="background-color:#234A6F;">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar" style="color:#fff;">
						Best handmade products
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">

					<!-- Logo desktop -->
					<a href="../index.php" class="logo">
						<img src="../Assets/File/Admin/A.png" alt="IMG-LOGO">
						<span style="font-family:garmond;color:#234A6F; font-size:25px; padding-left:5px;">
							ARTISANAL</span>
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">


							<li>
								<a href="../index.php">Home</a>
							</li>

							<li>
								<a href="searchProduct.php">Shop</a>
							</li>

							<li>
								<a href="ViewSeller.php">Sellers</a>
							</li>

						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<a href="Login.php"
							class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" >
              Sign in
						</a>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		

	</header>
    <!-- Cart -->


    <!-- Product -->
    <div class="bg0 m-t-23 p-b-140"  style="margin-top:90px;">

        <div class="container" style="min-height: 2000px;">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" onclick="productCheck()">
                        <?php echo 'ALL' ?>
                    </button>
                    <?php
                    $selQry2 = "select * from tbl_type";
                    $res2 = $conn->query($selQry2);
                    while ($row2 = $res2->fetch_assoc()) {

                        ?>

                        <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1"
                            onclick="productCheck(<?php echo $row2['type_id']; ?>)">
                            <?php echo $row2["type_name"]; ?>
                        </button>
                        <?php
                    }
                    ?>


                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div
                        class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Filter
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        Search
                    </div>
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" onkeyup="productCheck()"
                            name="search-product" placeholder="Search" id="txt_name">
                    </div>
                </div>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15">
                                Categories
                            </div>

                            <ul>
                                <?php
                                $selQry = "select * from tbl_category";
                                $res = $conn->query($selQry);
                                $i = 0;
                                while ($row = $res->fetch_assoc()) {
                                    $i++;
                                    ?>


                                    <li class="p-b-6 d-flex ">

                                        <input type="checkbox" onclick="changeubcat(),productCheck()"
                                            class="ilter-link stext-106 trans-0 " value="<?php echo $row["category_id"]; ?>"
                                            id="category"><span style="padding-left: 10px;">
                                            <?php echo $row["category_name"]; ?>
                                        </span>

                                    </li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>

                        <div class="filter-col2 p-r-15 p-b-27">


                            <ul id="selsubcat">

                            </ul>
                        </div>




                    </div>
                </div>
            </div>
            <div style="padding: 20px;min-height: 1000px">
                <div class="row " id="result">
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">

                    </div>
                </div>
            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Load More
                </a>
            </div>
        </div>
    </div>


   <!-- Footer -->
		<footer class=" p-t-75 p-b-32" style="background-color:#234A6F;margin-top:50px;">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 p-b-50" style="max-width:600px;">
						<h4 class="stext-301 cl0 p-b-30">
							About us
						</h4>

						<div><span style="color:#ddd;">The Objective of Artisanal is to support small handicraft
								business
								and
								make a website that is fully dedicated to handmade products which attracts customer who
								like
								or
								prefer unique handmade
								products over machine made mass produced products. Artisanal sells a wide range of
								handmade
								products like paintings, bags, wallets, hats, key chains, cups, home decors etc.
								And simple cloths like scarves, mufflers, sweaters, Beanies etc. Artisanal wants to give
								an
								amazing online shopping experience to everyone who visits the site.

							</span></div>
					</div>

					<div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">
							GET IN TOUCH
						</h4>

						<p class="stext-107 cl7 size-201">
							Any questions? Let us know in artisanalhelp@gmail.com or call us on (+91) 6235009367
						</p>

					</div>

					<div class="col-sm-6 col-lg-3 p-b-50">
						<h4 class="stext-301 cl0 p-b-30">
							connect with us
						</h4>

						<form>
							<div class="wrap-input1 w-full p-b-4">
								<a class="input1 bg-none plh1 stext-107 cl7" target="_blank"
									href="https://www.linkedin.com/in/sinju-mathews-1042a7292"><i
										class="zmdi zmdi-linkedin" style="font-size:23px;color:#fff;"></i> <span
										style="margin-left:10px;font-size:17px;color:#fff;">LinkedIn</span></a>
								<div class="focus-input1 trans-04"></div>
							</div>

							<div class="p-t-18">
								<a class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04"
									href="Login.php">
									feedback
								</a>
							</div>
						</form>
					</div>
				</div>

				<div class="p-t-40">
					<div class="flex-c-m flex-w p-b-18">
						<span class="m-all-1">
							<img src="../Assets/Template/Main/images/icons/icon-pay-01.png" alt="ICON-PAY">
						</span>

						<span class="m-all-1">
							<img src="../Assets/Template/Main/images/icons/icon-pay-02.png" alt="ICON-PAY">
						</span>

						<span class="m-all-1">
							<img src="../Assets/Template/Main/images/icons/icon-pay-03.png" alt="ICON-PAY">
						</span>

						<span class="m-all-1">
							<img src="../Assets/Template/Main/images/icons/icon-pay-04.png" alt="ICON-PAY">
						</span>

						<span class="m-all-1">
							<img src="../Assets/Template/Main/images/icons/icon-pay-05.png" alt="ICON-PAY">
						</span>
					</div>

					<p class="stext-107 cl6 txt-center">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i
							class="fa fa-heart-o" aria-hidden="true"></i> by Sinju

					</p>
				</div>
			</div>
		</footer>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->


    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/bootstrap/js/popper.js"></script>
    <script src="../Assets/Template/Main/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function () {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/daterangepicker/moment.min.js"></script>
    <script src="../Assets/Template/Main/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/slick/slick.min.js"></script>
    <script src="../Assets/Template/Main/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
    <script>
        $('.gallery-lb').each(function () { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/sweetalert/sweetalert.min.js"></script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
        $('.js-pscroll').each(function () {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function () {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="../Assets/Template/Main/js/main.js"></script>


    <script>
        function changeubcat() {
            var cat = get_filter_text('category');
            if (cat.length !== 0) {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxSearchSubCategory.php?data=" + cat,
                    success: function (response) {
                        $("#selsubcat").html(response);
                    }
                });

            }
            else {
                $("#subcat").html("");
            }


            function get_filter_text(text_id) {
                var filterData = [];

                $('#' + text_id + ':checked').each(function () {
                    filterData.push("\'" + $(this).val() + "\'");
                });
                return filterData;
            }
        }

        function productCheck(typeno = 0) {
            // $("#loder").show();

            var action = 'data';
            var subcat = get_filter_text('subcat');
            var category = get_filter_text('category');
            var name = document.getElementById('txt_name').value;
            var type = typeno;
            console.log(type);



            $.ajax({
                url: "../Assets/AjaxPages/AjaxSearch.php?action=" + action + "&subcat=" + subcat + "&category=" + category + "&name=" + name + "&typeNo=" + type,
                success: function (response) {
                    $("#result").html(response);
                    // $("#loder").hide();
                    $("#textChange").text("Filtered Products");
                }
            });


        }
        function get_filter_text(text_id) {
            var filterData = [];

            $('#' + text_id + ':checked').each(function () {
                filterData.push($(this).val());
            });
            return filterData;
        }

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
        function addWish(id, count) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxWishlist.php?id=" + id,
                success: function (response) {
                    if (response.trim() === "added to Wishlist") {
                        $("div.added").fadeIn(300).delay(1500).fadeOut(400);
                        $("#checkwish" + count).html('<i class="zmdi zmdi-favorite" style="font-size:25px;color:red;"></i>');
                    }
                    else if (response.trim() === "removed from Wishlist") {
                        $("div.removed").fadeIn(300).delay(1500).fadeOut(400);
                        $("#checkwish" + count).html('<i class="zmdi zmdi-favorite-outline" style="font-size:25px;color:black;"></i>');
                    }

                }
            });
        }

    </script>

</body>

</html>