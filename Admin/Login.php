<?php
include("Databaseinc.php");
session_start();

if(isset($_SESSION["log_in"]) && $_SESSION["log_in"] === true){
    header("location: home.php");
    exit;
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
   $name = mysqli_real_escape_string($conn,$_POST['username']);
   $pass = mysqli_real_escape_string($conn,$_POST['password']); 

   $sql = "SELECT id FROM users WHERE username = '$name' and password = '$pass'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $id = $row['id'];
   $has_row = mysqli_num_rows($result);
   echo $id;
   if($has_row == 1)
   {
   	$_SESSION['log_in'] = $id;

   	header("location: home.php");
   }
   else
   {
   	$error = "Username and password incorrect";
   }
}
?>

<html>
 <head>
 	<title>Login </title>
 	    <link rel = "stylesheet" type = "text/css" href = "../assets/css/style1.css" />
  </head>

  <body>
    <img src="../assets\images\1.png" id="bg" alt="">
  	<div class="loginform">
         <div>
            <div class="login_form1"><b>Login</b></div>
				
            <div class = "from2">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" id="button1" value = " Submit "/><br /><br>
                  
               </form>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
