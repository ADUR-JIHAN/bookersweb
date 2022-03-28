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
  $date = date("Y-m-d");

  if( isset($_POST['submit'])){
  	$book_code = $_POST['b_code'];

  	$sql = "SELECT b_id FROM book where b_id='$book_code' and status='Available' ";

  	

  	if(mysqli_num_rows(mysqli_query($db, $sql))>0){
  		$sql = "UPDATE owns SET buyer_id='$u_id',date = '$date' WHERE b_id='$book_code' ";
  		mysqli_query($db, $sql);

  		$sql = "UPDATE book SET status='$u_id',status = 'In Rent' WHERE b_id='$book_code' ";
  		mysqli_query($db, $sql);
  	
  		echo "<script>alert('Successfully Rented!')</script>";
  	}
  	else{
  		echo "<script>alert('Failed. Please try again!')</script>";
  	}
  }
  
  // Initialize message variable
  $sql = "SELECT * FROM book,owns where owns.buyer_id='$u_id' AND book.b_id=owns.b_id";
  $result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
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
				</nav>
			</div>	
		</div>		

	</header>

	<pre>


	</pre>

	<div style="background: rgb(255,255,255);">
					<form action="rents.php" method="post">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Submit Book Code
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="b_code" placeholder="Book Code..">
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="submit">
							Submit
						</button>
					</form>
	</div>

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

								        	$price = $row['price']*1;
								        	$date2 = date_create($row['date']);
								        	$date1 = date_create($date);
								        	$diff = date_diff($date2,$date1);
								        	$month = ($diff->format("%R%a")*1)/30;
								        	$rent = 1;
								        	if( $month<= 2){
								        		$rent = $price * 0.1;
								        	}else if( $month <=4 ){
								        		$rent = $price * 0.2;
								        	}else if($month<=6){
								        		$rent = $price * 0.3;
								        	}
								        	else{
								        		$rent = $price;
								        	}


											echo "<td class='column-1'>".$rent." BDT</td>";
									    	
	                                    }
                                     
                                 	?>
                                 </tr>
							</table>
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