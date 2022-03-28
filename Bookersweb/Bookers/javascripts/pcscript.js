$(function() {

	$("#username_error_message").hide();
	$("#password_error_message").hide();
	$("#retype_password_error_message").hide();
	$("#email_error_message").hide();

	var error_username = false;
	var error_password = false;
	var error_retype_password = false;
	var error_email = false;

	$("#form_username").focusout(function() {

		check_mn();
		
	});

	$("#form_password").focusout(function() {

		check_tid();
		
	});

	$("#form_retype_password").focusout(function() {

		check_tid();
		
	});

	$("#form_email").focusout(function() {

		check_email();
		
	});

	function check_mn() {
	
		var coin = $("#form_username").val();
		
		if(coin % 50 !== 0) {
			$("#username_error_message").html("Should be multiple of 50");
			$("#username_error_message").show();
			error_username = true;
		} else {
			$("#username_error_message").hide();
		}
	
	}

	function check_tid() {
	
		var password_length = $("#form_tid").val().length;
		
		if(password_length < 2) {
			$("#password_error_message").html("can not be empty");
			$("#password_error_message").show();
			error_password = true;
		} else {
			$("#password_error_message").hide();
		}
	
	}


	function check_email() {

		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	
		if(pattern.test($("#form_email").val())) {
			$("#email_error_message").hide();
		} else {
			$("#email_error_message").html("Invalid email address");
			$("#email_error_message").show();
			error_email = true;
		}
	
	}

	$("#registration_form").submit(function() {
											
		error_username = false;
		error_password = false;
		error_retype_password = false;
		error_email = false;
											
		check_username();
		check_password();
		check_retype_password();
		check_email();
		
		if(error_username == false && error_password == false && error_retype_password == false && error_email == false) {
			return true;
		} else {
			return false;	
		}

	});

});