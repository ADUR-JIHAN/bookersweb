<?php include('connection.php')?>
<?php 
	session_start();
	$errors = array();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Confirm Email</title>
	<link href="css/loginstyle.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>

	<div class="login-wrap2">

		<div>
			<article style="margin-top: 15%;">
				<form method="post" action="confirm_email.php">
					<h3 class="legend last">Confirm Email</h3>
					<p style="text-align: center; color: white;">Enter your confirmation code to get the full access.<br> Check spam folder too!</p>
					<div class="input">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
						<input type="text" name="token" placeholder="Confirmation Code" required>
					</div>
					<div> <?php include('errors.php')?></div>
					<button type="submit" class="btn submit last-btn" name="confirm">Submit</button>
				</form>
			</article>					
						
		</div>
	</div>

	<?php

		if(isset($_POST['confirm'])){
			$token = mysqli_real_escape_string($db, $_POST['token']);
			$email = $_SESSION['email'];

			$query = "SELECT token FROM user WHERE email='$email'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1 ) {
				$row = mysqli_fetch_array($results);
				$token2 = $row['token'];
				if( $token == $token2 ){
					$query2 = "UPDATE user SET status='1' WHERE email='$email'";
					mysqli_query($db, $query2);
					header('location: logged-home.php');
				}
				else{
					array_push($errors, "Please give the correct code!");
					echo "<script type='text/javascript'>
								alert('Wrong Code!');
							  </script>";
				}
			}
			else{
				echo "<script type='text/javascript'>
								alert('Something went wrong.Contact at bookers@gmail.com');
							  </script>";
				echo "Something went wrong.Contact at bookers@gmail.com";
			}
		}
	?> 

</body>
</html>