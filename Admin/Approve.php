<?php
	require_once 'Databaseinc.php';
    $id1 = $_GET['id'];
    $a = 'Approve';

    $save=$conn->query("UPDATE `request` set Status = '$a' where id = '$id1'") or die(mysqli_error());

?>	
