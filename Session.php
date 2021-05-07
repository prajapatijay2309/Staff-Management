<?php
   include('Databaseinc.php');
   session_start();
   
   $id = $_SESSION['log_in_employee'];
   
   $ses = mysqli_query($conn,"select * from employee where id = '$id' ");
   
   $row = mysqli_fetch_array($ses,MYSQLI_ASSOC);
   
   $login_session_employee = $row['id'];
   $login_username_employee = $row['firstname'];
   
   if(!isset($_SESSION['log_in_employee']))
   {
      header("location:Login.php");
      die();
   }
?>