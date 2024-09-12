<?php
include("Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="shortcut icon" href="A.png"> 
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="Assets/Template/Main/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="Assets/Template/Main/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css"
		href="Assets/Template/Main/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/css/util.css">
	<link rel="stylesheet" type="text/css" href="Assets/Template/Main/css/main.css">

	<!--===============================================================================================-->
	<style>
	</style>
</head>


<body >

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
					<a href="index.php" class="logo">
						<img src="Assets/File/Admin/A.png" alt="IMG-LOGO">
						<span style="font-family:garmond;color:#234A6F; font-size:25px; padding-left:5px;">
							ARTISANAL</span>
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">


							<li>
								<a href="index.php">Home</a>
							</li>

							<li>
								<a href="Guest/SearchProduct.php">Shop</a>
							</li>

							<li>
								<a href="Guest/ViewSeller.php">Sellers</a>
							</li>

						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<a href="Guest/Login.php"
							class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
              Sign in
						</a>
					</div>
				</nav>
			</div>
		</div>

		<!-- Header Mobile -->
		

	</header>
	<!-- Slider -->
	<section class="section-slide p-t-70">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image:  url(Assets/File/Admin/uff2.webp);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2" style="color:#fff;">
									amazing
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="color:#fff;">
									Crochet Amigurumi
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="Guest/SearchProduct.php"
									class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image:  url(Assets/File/Admin/ssaa.webp);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2" style="color:#fff;">
									men & women

								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn"
								data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="color:#fff;">
									Keychains
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="Guest/SearchProduct.php"
									class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image:  url(Assets/File/Admin/jewel.webp);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft"
								data-delay="0">
								<span class="ltext-101 cl2 respon2 " style="color:#fff;">
									Handmade
								</span>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight"
								data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1" style="color:#fff;">
									Jewellery
								</h2>
							</div>

							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="Guest/SearchProduct.php"
									class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="container">

		<div class="row m-t-50" style="justify-content: space-evenly;align-content: center;align-items: center;">


			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<div class="p-b-10">
					<h4 class="ltext-103 cl5" style="margin-top:40px; font-size:25px; padding-left:35px">
						Our Sellers
					</h4>
				</div>
				<div class="carousel-inner">

					<?php $selbio = "select * from tbl_seller_bio";
					$i = 0;
					$resbio = $conn->query($selbio);
					while ($rowbio = $resbio->fetch_assoc()) {
						$i++; ?>

						<div class="carousel-item <?php if ($i == 1) { ?>active<?php } ?>"
							style="width: 350px;height: 400px;overflow: hidden;">

							<img class="d-block w-100"
								style="border-radius:20px;width: 100%;height: 100%;object-fit: cover;"
								src="Assets/File/Seller/SellerBio/<?php echo $rowbio['sell_profilepic'] ?>" />
							<div class="carousel-caption d-none d-md-block">
								<h5>
									<?php echo $rowbio['bio_nickname'] ?>
								</h5>
								<p>
									<?php echo $rowbio['bio_email'] ?>
								</p>
								<a href="Guest/Login.php">See
									More</a>
							</div>
						</div>
						<?php
					}
					?>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>



			<div id="carouselExample" class="carousel slide" data-ride="carousel" 
			style="margin-top:52px; margin-bottom:-28px;">
				<div class="carousel-inner">

					<div class="carousel-item active" style="width: 780px;height: 400px;overflow: hidden;">
						<img class="d-block w-100"
							style="border-radius:20px;width: 100%;height: 100%;object-fit: cover;"
							src="Assets/File/Admin/q1.png" />
					</div>
					<div class="carousel-item " style="width: 780px;height: 400px;overflow: hidden;">
						<img class="d-block w-100"
							style="border-radius:20px;width: 100%;height: 100%;object-fit: cover;"
							src="Assets/File/Admin/q2.png" />
					</div>
					<div class="carousel-item" style="width: 780px;height: 400px;overflow: hidden;">
						<img class="d-block w-100"
							style="border-radius:20px;width: 100%;height: 100%;object-fit: cover;"
							src="Assets/File/Admin/q3.png" />
					</div>

				</div>
				<a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

		</div>


	</div>
		<!-- Product -->


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
									href="Guest/Login.php">
									feedback
								</a>
							</div>
						</form>
					</div>
				</div>

				<div class="p-t-40">
					<div class="flex-c-m flex-w p-b-18">
						<span class="m-all-1">
							<img src="Assets/Template/Main/images/icons/icon-pay-01.png" alt="ICON-PAY">
						</span>

						<span class="m-all-1">
							<img src="Assets/Template/Main/images/icons/icon-pay-02.png" alt="ICON-PAY">
						</span>

						<span class="m-all-1">
							<img src="Assets/Template/Main/images/icons/icon-pay-03.png" alt="ICON-PAY">
						</span>

						<span class="m-all-1">
							<img src="Assets/Template/Main/images/icons/icon-pay-04.png" alt="ICON-PAY">
						</span>

						<span class="m-all-1">
							<img src="Assets/Template/Main/images/icons/icon-pay-05.png" alt="ICON-PAY">
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
		<script src="Assets/Template/Main/vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="Assets/Template/Main/vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="Assets/Template/Main/vendor/bootstrap/js/popper.js"></script>
		<script src="Assets/Template/Main/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="Assets/Template/Main/vendor/select2/select2.min.js"></script>
		<script>
			$(".js-select2").each(function () {
				$(this).select2({
					minimumResultsForSearch: 20,
					dropdownParent: $(this).next('.dropDownSelect2')
				});
			})
		</script>
		<!--===============================================================================================-->
		<script src="Assets/Template/Main/vendor/daterangepicker/moment.min.js"></script>
		<script src="Assets/Template/Main/vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="Assets/Template/Main/vendor/slick/slick.min.js"></script>
		<script src="Assets/Template/Main/js/slick-custom.js"></script>
		<!--===============================================================================================-->
		<script src="Assets/Template/Main/vendor/parallax100/parallax100.js"></script>
		<script>
			$('.parallax100').parallax100();
		</script>
		<!--===============================================================================================-->
		<script src="Assets/Template/Main/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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
		<script src="Assets/Template/Main/vendor/isotope/isotope.pkgd.min.js"></script>
		<!--===============================================================================================-->
		<script src="Assets/Template/Main/vendor/sweetalert/sweetalert.min.js"></script>
		
	
		<!--===============================================================================================-->
		<script src="Assets/Template/Main/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
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
		<script src="Assets/Template/Main/js/main.js"></script>

</body>

</html>