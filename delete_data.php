<?php
require_once('conn/config.php');
if(isset($_POST['delete_data'][0])){
	foreach ($_POST['delete_data'] as $data) {
		$id = mysqli_real_escape_string($conn,$data);
		$delete_query = "DELETE FROM users WHERE id = $id";
		mysqli_query($conn,$delete_query);
	}

}

?>