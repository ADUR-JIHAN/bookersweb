<?php
  // Create database connection
  $db = mysqli_connect('localhost', 'root', '', 'bookers');
  // Initialize message variable
  $result = "";

  session_start();
  
  if (isset($_POST['book-id']) ) {
  	$book_id = mysqli_real_escape_string($db, $_POST['book-id']);
  	$result1= mysqli_query($db, "SELECT * FROM book natural join owns where b_id ='$book_id'");
  	$row1 = mysqli_fetch_array($result1);

  	$u_id = $row1['u_id'];
  	$result2= mysqli_query($db, "SELECT * FROM user where u_id ='$u_id'");
  	$row2 = mysqli_fetch_array($result2);

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition" style="background-color: rgba(0,0,0,0.5);">
	
	<!-- Header -->
	<header class="header-v3">
		<!-- Header desktop -->
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">
					
					<!-- Logo desktop -->		
					<a href="<?php if( $_SESSION['success'] == "true" ){ echo "logged-home.php";}else{echo "index.php";}?>" class="logo" style="color:white;" >
						<h1>BOOKERS</h1>
						<!--<img src="images/icons/logo-02.png" alt="IMG-LOGO">-->
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="<?php if( $_SESSION['success'] == "true" ){ echo "logged-home.php";}else{echo "index.php";}?>">Home</a>
							</li>

							<li class="label1" data-label1="hot">
								<a href="books.php">Books</a>
							</li>

							<li>
								<a href="mycollection.php">My Collection</a>
							</li>

							<li>
								<a href="contact.html">About</a>
							</li>
						</ul>
					</div>	
				</nav>
			</div>	
		</div>		

	</header>

	<pre>


	</pre>


		

	<!-- Product Detail -->

	<?php

	echo "<section class='sec-product-detail bg0 p-t-65 p-b-60'>
		<div class='container'>
			<div class='row'>
				<div class='col-md-6 col-lg-7 p-b-30'>
					<div class='p-l-25 p-r-30 p-lr-0-lg'>
						<div class='wrap-slick3 flex-sb flex-w'>
							<div class='wrap-slick3-dots'></div>
							<div class='wrap-slick3-arrows flex-sb-m flex-w'></div>

									<div class='wrap-pic-w pos-relative'>
										<img src='images/".$row1['b_pic']."'>
										<a class='flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04' href='images/".$row1['b_pic']."'>
											<i class='fa fa-expand'></i>
										</a>
									</div>

						</div>
					</div>
				</div>
					
				<div class='col-md-6 col-lg-5 p-b-30'>
					<div class='p-r-50 p-t-5 p-lr-0-lg'>
						<h4 class='mtext-105 cl2 js-name-detail p-b-14'>
							".$row1['b_title']."
						</h4>

						<h5 class='mtext-100 cl2 js-name-detail p-b-14'>
							Author: ".$row1['a_name']."
						</h5>

						<span class='mtext-106 cl2'>
							Price: ".$row1['price']." BDT
						</span><br>

						<p class='stext-102 cl3 p-t-23'>
							<h5 class='mtext-100 cl2 js-name-detail p-b-14'>
								Condition: ".$row1['state']."
							</h5>
							<h5 class='mtext-100 cl2 js-name-detail p-b-14'>
								Location: ".$row1['location']."
							</h5>

							<h5 class='mtext-100 cl2 js-name-detail p-b-14'>
								Book Status: ".$row1['status']."
							</h5>

						</p>

						<span class='mtext-106 cl2'>
							<u>Seller Info</u>
						</span><br>
						<p>
							<h5 class='mtext-100 cl2 js-name-detail p-b-14'>
								Name: ".$row2['u_name']."
							</h5>
							<h5 class='mtext-100 cl2 js-name-detail p-b-14'>
								Rating: ".$row2['rating']."
							</h5>
							<h5 class='mtext-100 cl2 js-name-detail p-b-14'>
								Contact: ".$row2['mobile']."
							</h5>

						</p>"; ?>

						<div>

							<form  action="rating.php" method="post">
								<u><h5 class="mtext-108 cl2 p-b-7">
									Rate the seller
								</h5></u>
								
									<span class="stext-102 cl3 m-r-16">
									Your Rating
									</span>

									<span class="wrap-rating fs-18 cl11 pointer">
										<i class="item-rating pointer zmdi zmdi-star-outline"></i>
										<i class="item-rating pointer zmdi zmdi-star-outline"></i>
										<i class="item-rating pointer zmdi zmdi-star-outline"></i>
										<i class="item-rating pointer zmdi zmdi-star-outline"></i>
										<i class="item-rating pointer zmdi zmdi-star-outline"></i>
										<input class="dis-none" type="number" name="rating">
									</span>
									<pre></pre>
								
								<button name="r-btn" href="logged-home.php" class="flex-c-m stext-101 cl0 size-105 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
								Submit
								</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</section>

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shipping
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>'
		
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
