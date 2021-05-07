<?php
	require_once 'Databaseinc.php';
	date_default_timezone_set('Asia/karachi');
    $time = date('h:i:s');
    $date = date("Y/m/d");
    $id1 = $_GET['id'];


    $get=$conn->query("SELECT * FROM `attendance` where employee_id='$id1' AND date1='$date'") or die(mysqli_error());
    if($get->num_rows == 0 ){

			 $save=$conn->query("INSERT INTO `attendance` VALUES('', '$id1','$date','$time', '', '', '', '')") or die(mysqli_error());	
	         $conn->close();
			
		}