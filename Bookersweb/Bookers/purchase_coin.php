<?php
  // Create database connection
   
  $db = mysqli_connect('localhost', 'root', '', 'bookers');
  // Initialize message variable
  $msg = "";

  session_start();

  $u_id = $_SESSION['u_id'];

  // If sbmt button is clicked ...
  if (isset($_POST['submit'])) {
    
    $email = mysqli_real_escape_string($db,$_POST['form_email']);
    $transaction = mysqli_real_escape_string($db,$_POST['form_tid']);
    $coin_amount=mysqli_real_escape_string($db,$_POST['coin_amount']);
    
    $date = date("Y/m/d");

    $sql ="INSERT INTO p_coin_info(tx_id,u_id,amount,date_time) VALUES ('$transaction','$u_id','$coin_amount','$date')";
    // execute query
    if(mysqli_query($db, $sql)){
        echo "<script>alert('Your request was sent successfully!');window.location.href='logged-home.php';</script>";
    }
    else{
        echo "<script>alert('Failed. Please try again!')</script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Purchase Coin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
	<script src="js/jquery.js" type="text/javascript" ></script>
		<script src="js/jquery.ui.core.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script src="js/pcmain.js"></script>

    <link rel="stylesheet" type="text/css" href="stylesheets/pcstyle.css" />
    <script type="text/javascript" language="javascript" src="javascripts/pcjquery.js"></script>
   <script type="text/javascript" language="javascript" src="javascripts/pcscript.js"></script>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="pccss/pcutil.css">
	<link rel="stylesheet" type="text/css" href="pccss/pcmain.css">
<!--===============================================================================================-->
</head>
<body style="background-color: 'gray'">

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/icons/coin.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" id="user_form" method="POST" action="purchase_coin.php" enctype="multipart/form-data" >
				<span class="contact1-form-title">
					Purchase Coin
				</span>

				<table>
                 <tr>
                    <td>Email: </td>
                </tr>
                <tr>
                   <td>
                      <input type="text" class="input1" name= "form_email" id="form_email" required>
                   </td>
                </tr>
                <tr>
                   <td><span class="error_form" id="email_error_message"></span></td>
               </tr>
               
                <tr>
                <td>Transaction id: </td>
                </tr>
                <tr>
                  <td>
                    <input type="password" class="input1" id="form_tid" name="form_tid" required>
                  </td>
                </tr>
                <tr>
                  <td>
                      <span class="error_form" id="retype_password_error_message"></span>
                   </td>
                </tr>
                  
                <tr>
                <td>Coin Amount:</td>
               </tr>
               <tr>
                <td>
                  <input type="Number" class="input1" name="coin_amount" id="form_username">
                </td>
                </tr>

                <tr>
                  <td>
                    <span class="error_form" id="username_error_message"></span>
                  </td>
                </tr>

                <tr>
                <td>
                  <input type="submit" class="sbmt_btn" name="submit" value="Confirm">
                </td>
                </tr>
               </table>


			</form>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>
