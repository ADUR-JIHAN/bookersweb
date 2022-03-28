<?php
	require_once("dbcontroller.php");
	$db_handle = new DBController();

	$sql = "SELECT b_id, u_id, b_title from owns NATURAL JOIN book";
	$posts = $db_handle->runSelectQuery($sql);
?>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<script>
	function deleteRecord(b_id) {
		if(confirm("Are you sure you want to delete this post?"+b_id)) {
			$.ajax({
				url: "delete.php",
				type: "POST",
				data:'b_id='+b_id,
				success: function(data){
				  $("#table-row-"+b_id).remove();
				}
			});
		}
	}
</script>

<style>
	body{width:615px;}
	.tbl-qa{width: 98%;font-size:0.9em;background-color: #f5f5f5;}
	.tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
	.tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;}
	.ajax-action-links {color: #09F; margin: 10px 0px;cursor:pointer;}
	.ajax-action-button {border:#094 1px solid;color: #09F; margin: 10px 0px;cursor:pointer;display: inline-block;padding: 10px 20px;}
</style>

<table class="tbl-qa">
  <thead>
	<tr>
	  <th class="table-header">User Id</th>
	  <th class="table-header">Book Id</th>
	  <th class="table-header">Book Title</th>
	  <th class="table-header">Action</th>
	</tr>
  </thead>
  <tbody id="table-body">
	<?php
		if(!empty($posts)) { 
			foreach($posts as $k=>$v) {
			  ?>
			  <tr class="table-row" id="table-row-<?php echo $posts[$k]["b_id"]; ?>">
				<td contenteditable="true"><?php echo $posts[$k]["u_id"]; ?></td>
				<td contenteditable="true"><?php echo $posts[$k]["b_id"]; ?></td>
				<td contenteditable="true"><?php echo $posts[$k]["b_title"]; ?></td>
				<td><a class="ajax-action-links" onclick="deleteRecord(<?php echo $posts[$k]["b_id"]; ?>);">Delete</a></td>
			  </tr>
			  <?php
			}
		}
	?>
  </tbody>
</table>