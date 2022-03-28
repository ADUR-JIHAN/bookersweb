<?php
  // Create database connection
   
  $db = mysqli_connect('localhost', 'root', '', 'bookers');
  // Initialize message variable
  $msg = "";

  session_start();

  function randomNumber($length) {
	    $result = '';
	    for($i = 0; $i < $length; $i++) {
	        $result .= mt_rand(1, 9);
	    }
	    return $result;
	}

	
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {

  	$u_id = $_SESSION['u_id'];
  	$b_id=randomNumber(8);
    // Get image name
    $image = $_FILES['image']['name'];
    $title = mysqli_real_escape_string($db,$_POST['title2']);
    $author = mysqli_real_escape_string($db,$_POST['author']);
    $catagory=mysqli_real_escape_string($db,$_POST['category']);
    $location=mysqli_real_escape_string($db,$_POST['address']);
    $price=mysqli_real_escape_string($db,$_POST['price']);
    $state=mysqli_real_escape_string($db,$_POST['state']);

  
    // image file directory
    $target = "images/".basename($image);


    $sql ="INSERT INTO book(b_id,b_title,a_name,state,catagory,price,b_pic) VALUES ('$b_id','$title','$author','$state','$catagory','$price','$image')";
    // execute query
    mysqli_query($db, $sql);

    $sql ="INSERT INTO owns(b_id,u_id,location) VALUES ('$b_id','$u_id','$location')";
    // execute query
    mysqli_query($db, $sql);


    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    	
     echo "<script>
    		alert('Successfull!');
    	</script>";

    	header('location:mycollection.php');
    	exit();
    }else{
      echo "<script>
    		alert('Failed!');
    	</script>";
    }
  }
  $result = mysqli_query($db, "SELECT * FROM book");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blog Detail</title>
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
<body class="animsition">
	
	
	


	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo" style="color:gray;" >
						<h1>BOOKERS</h1>
						<!--<img src="images/icons/logo-02.png" alt="IMG-LOGO">-->
					</a>
				</nav>
			</div>	
		</div>
	</header>


	<!-- Content page -->
	<section class="bg0 p-t-52 p-b-20">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-45 p-r-0-lg">
						

						<!--  -->
						<div class="p-t-40">
							<h5 class="mtext-113 cl2 p-b-12">
								Add Post:-
							</h5>

							<p class="stext-107 cl6 p-b-40">
								
							</p>

							<form method="POST" action="addbookfinal.php" enctype="multipart/form-data">

								<div class="bor19 size-230 m-b-20">
									<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="file" name="image" id='name'>
								</div>
								<div class="bor19 size-230 m-b-20">
									<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" id="name" name="title2" placeholder="title" title="Please enter a Valid Title" required

									>
								</div>


								<div class="bor19 size-230 m-b-20">
									<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" id="name" name="author" placeholder="author" title="Please enter an authon name" required

									>
								</div>
								<div class="bor19 size-230 m-b-20">
									<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" id="name" name="address" placeholder="Address" title="Please enter your Address" required="" 

									>
								</div>
								<div class="bor19 size-230 m-b-20">
									<select class="stext-111 cl2 plh3 size-116 p-lr-18" id="name" name="state" required>
		                              <option value="">Select A Condition</option>
		                              <option value="Old">Old</option>
		                              <option value="New">New</option>
	                              	</select>
								</div>
								
                               <div class="bor19 size-230 m-b-20">
                              <select class="stext-111 cl2 plh3 size-116 p-lr-18" id="name" name="category" required>
                              <option value="">Select A category:-</option>
                              <option value="College">College</option>
                              <option value="University">University</option>
                              <option value="School">Job Books</option>
                              <option value="Others">Others</option>
                              </select>
                               </div>
								<div class="bor19 size-230 m-b-20">
									<input class="stext-111 cl2 plh3 size-116 p-lr-18" type="text" id="name" name="price" placeholder="price" title="Price" required=""

									>
								</div>
								<button class="flex-c-m stext-101 cl0 size-125 bg3 bor2 hov-btn3 p-lr-15 trans-04" type="submit" name="upload" value="Submit">
									Submit
								</button>
							</form>
						</div>
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
						About
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
						<p> Nagad </p>
					</a>
                    <p>@nbsp</p>
					<a href="#" class="m-all-1">
						<p> Bkash </p>
					</a>

				</div>
			</div>
			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					
				<p> Bookers Team</p>

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
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
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