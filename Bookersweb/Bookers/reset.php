<?php
	if($reset=="em_in"){
		echo "<div class='error'>		
			<p><?php echo 'No user found with this email!' ?></p>
		</div>";
	}
	else if($reset=="em_ok"){
		echo "<div class='input'>
			<span class='fa fa-envelope-o' aria-hidden='true'></span>
			<input type='text' placeholder='Reset Code' name='r_code' required />
			</div>";
	}
?>