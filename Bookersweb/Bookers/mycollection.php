<?php
  // Create database connection 
  $db = mysqli_connect('localhost', 'root', '', 'bookers');

  //checking logged in or not
  session_start();

  if( $_SESSION['success'] != "true" ){
  		header('location:dupindex.php');
  		exit();
  }
  
  $u_id = $_SESSION['u_id'];

  $result = mysqli_fetch_array(mysqli_query($db,"SELECT coin from user where u_id='$u_id'"));
  $coin = $result['coin'];

  // Initialize message variable
  $sql = "SELECT * FROM book,owns where owns.u_id='$u_id' AND book.b_id=owns.b_id";
  $result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Collection</title>
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

					<div class="wrap-icon-header flex-w flex-r-m">

						<a href="purchase_coin.php" class="icon-header-item cl0 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="<?php echo $coin;?>">
							<img src="images/icons/coin.png" height="35px" width="35px">
						</a>
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							
						</div>
					</div>
					<div>
					</div>

				</nav>
			</div>	
		</div>		

	</header>

	<pre>


	</pre>

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
							
								<tr class="table_head">
									<th class="column-1">Picture</th>
									<th class="column-1">Author</th>
									<th class="column-1">Price</th>
									<th class="column-1">Title</th>
									<th class="column-1">Rent</th>

								</tr>


	         						<?php
	         						   while ($row = mysqli_fetch_array($result)) {
                                       echo "<tr class='table_row'>";
									 echo "<td class='column-1'>";
										echo "<div class='how-itemcart1'>";
											echo "<img src='images/".$row['b_pic']."'>";
										echo "</div>";
									echo "</td>";
									echo "<td class='column-1'>".$row['a_name']."</td>";
									echo "<td class='column-1'>".$row['price']."</td>";
							        echo "<td class='column-1'>".$row['b_title']."</td>";
									//echo "<td class='column-1'>".$row['state']."</td>";
								    echo "</tr>";
                                       }
                                     
                                 ?>

								<!--<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="images/item-cart-05.jpg" alt="IMG">
										</div>
									</td>
									<td class="column-2">Lightweight Jacket</td>
									<td class="column-3">$ 16.00</td>
									<<td class="column-4"> 3</td>
									<td class="column-5">$ 16.00</td>
								</tr>-->
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								<a href="addbookfinal.php" class="stext-109 cl8 hov-cl1 trans-04">
								Add Collection
							    </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
		
	
		

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
								College
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								University
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Job
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Fictional
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions? Let us know in store at 3th floor, It building, University of Chittagong or call us on (+1) 96 716 6879
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
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					
					<a href="#" class="m-all-1">
						<p> Naghad </p>
					</a>
                    <p>@nbsp</p>
					<a href="#" class="m-all-1">
						<p> Bkash </p>
					</a>

				</div>
			</div>
		</div>
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
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>