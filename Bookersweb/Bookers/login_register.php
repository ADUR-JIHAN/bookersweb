<?php 

	include('connection.php');
	// variable declaration
	session_start();
	$errors = array();
	$reset = "";
	$_SESSION['success'] = "";

	function randomNumber($length) {
	    $result = '';

	    for($i = 0; $i < $length; $i++) {
	        $result .= mt_rand(0, 9);
	    }
	    return $result;
	}

	function sendtoken($mailto,$token){

		$mailSub = "Confirm Email";
	    $mailMsg = "Enter the below code to confirm the email :<br>".$token;

	    require 'PHPMailer-master/PHPMailerAutoload.php';

	    $mail = new PHPMailer();
	    $mail ->IsSmtp();
	    $mail ->SMTPDebug = 0;
	    $mail ->SMTPAuth = true;
	    $mail ->SMTPSecure = 'ssl';
	    $mail ->Host = "smtp.gmail.com";
	    $mail ->Port = 465; // or 587
	    $mail ->IsHTML(true);
	    $mail ->Username = "username"; #replaced
	    $mail ->Password = "password"; #replaced
	    $mail ->SetFrom("tempdrive68@gmail.com");
	    $mail ->Subject = $mailSub;
	    $mail ->Body = $mailMsg;
	    $mail ->AddAddress($mailto);

	   $mail->Send();
	    /*if(!)
	    {
	      echo "Mail Not Sent.<br>Please contact at bookers@gmail.com";
	    }
	    else
	    {*/
	      header("Location: confirm_email.php");
	    //}
  }

	// REGISTER USER
	if (isset($_POST['reg'])) {
		// receive all input values from the form
		$mobile = mysqli_real_escape_string($db, $_POST['mobile']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$c_password = mysqli_real_escape_string($db, $_POST['c_password']);
		
		if ($password != $c_password) {
			array_push($errors, "The two passwords do not match!");		  
		}
		else{

			$query = "SELECT * FROM user WHERE email='$email'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) > 0) {
				array_push($errors, "Email is already taken!");
			}
			else{

				$password = md5($password);//encrypt the password before saving in the database
				$token=randomNumber(6); 

				$query2 = "INSERT INTO user(email, pass, token, u_name, mobile) 
						  VALUES('$email', '$password', '$token', '$name', '$mobile')";
				
				$result = mysqli_query($db, $query2);
		    
		        if( $result ){
		        	echo "<script type='text/javascript'>
							alert('Registration successful!');
						  </script>";

					$_SESSION['email'] = $email;
					$_SESSION['success'] = "true"; 

					sendtoken($email,$token);
	   
		            exit();
	        	}
			}
		}
	}

	// LOGIN USER
	if (isset($_POST['log'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if( $email=="admin@bookers.com" && $password=="book123"){
			header('location:admin/index_admin.html');
			exit();
		}

		$password = md5($password);
		$query = "SELECT * FROM user WHERE email='$email' AND pass='$password'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {

			$row = mysqli_fetch_array($results);
			$status = $row['status'];
			$u_id = $row['u_id'];

			$_SESSION['email'] = $email;
			$_SESSION['success'] = "true";
			$_SESSION['u_id']= $u_id;

			if( $status=='1' ){
				header('location: logged-home.php');
			}
			else{
				header('location: confirm_email.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination!");
		}
	}

	//Reset Pass
	if (isset($_POST['res'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);

		$query = "SELECT * FROM user WHERE email='$email'";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {
			$reset = "em_ok";
			$code = mysqli_real_escape_string($db, $_POST['r_code']);
		}
		else{
			$reset = "em_in";
		}
	}
?>