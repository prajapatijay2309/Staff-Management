<?php
   include('Databaseinc.php');
   session_start();
   
   $id = $_SESSION['log_in'];
   
   $ses = mysqli_query($conn,"select * from users where id = '$id' ");
   
   $row = mysqli_fetch_array($ses,MYSQLI_ASSOC);
   
   $login_session_Admin = $row['id'];
   $login_username_Admin = $row['username'];
   
   if(!isset($_SESSION['log_in']))
   {
      header("location:Login.php");
      die();
   }
?>