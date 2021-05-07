<?php
	require_once 'Databaseinc.php';

	date_default_timezone_set('Asia/karachi');
    $time = date('h:i:s');
    $date = date("Y/m/d");
    $id1 = $_GET['id'];

   $get=$conn->query("SELECT * FROM `attendance` where employee_id ='$id1' AND date1='$date'") or die(mysqli_error());


  if($get->num_rows > 0){
  	$row1 = $get->fetch_assoc();
  	$time2 = $row1['IN_time'];
  	$checkTime = strtotime($time2);
  	$out_time1 = strtotime($time);
  	$diff = $checkTime - $out_time1;
  	$diff1 = abs($diff)/3600;
  	$diff1 = round($diff1);
  	$a = '-';
  	$b = '-';
  	if($diff1 < 9){
  		$a = '$100';
  	}
  	if($diff1 > 12){
  		$b = '$200';
  	}




			 $save=$conn->query("UPDATE `attendance` set Out_time = '$time' , time_diff = '$diff1' , Deduction = '$a' , Incentive ='$b' where employee_id = '$id1' AND date1='$date'") or die(mysqli_error());	
	}	
