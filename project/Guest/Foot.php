
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

</body>

</html>