<?php
	require_once("dbcontroller.php");
	$db_handle = new DBController();

	if(!empty($_POST['b_id'])) {
		$id = $_POST['b_id'];

		echo "<script>
    		alert('Successfull!');
    	</script>";

		$sql1 = "DELETE FROM  owns WHERE b_id = '$id' ";
		$sql2 = "DELETE FROM  book WHERE b_id = '$id' ";

		$db_handle->executeQuery($sql1);
		$db_handle->executeQuery($sql2);
	}
?>