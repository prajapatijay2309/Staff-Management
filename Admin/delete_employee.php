<?php
	require_once 'Databaseinc.php';
	$delete = $conn->query("DELETE FROM `employee` WHERE `id` = '".$_GET['id']."'") or die(mysqli_error());
	if($delete){
		echo json_encode(array("status"=>1,'msg'=>"Data successfully deleted."));
	}
	$conn->close();