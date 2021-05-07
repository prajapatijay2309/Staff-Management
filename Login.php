<?php
include("Databaseinc.php");
session_start();

if(isset($_SESSION["log_in_employee"]) && $_SESSION["log_in_employee"] === true){
    header("location: Employee_home.php");
    exit;
}


if($_SERVER["REQUEST_METHOD"] == "POST")
{
   $name = mysqli_real_escape_string($conn,$_POST['username']);
   $pass = mysqli_real_escape_string($conn,$_POST['password']); 

   $sql = "SELECT id FROM employee WHERE firstname = '$name' and lastname = '$pass'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $id = $row['id'];
   $has_row = mysqli_num_rows($result);
   echo $id;
   if($has_row == 1)
   {
   	$_SESSION['log_in_employee'] = $id;

   	header("location: Employee_home.php");
   }
   else
   {
   	
   }
}
?>

<html>
 <head>
 	<title>Login </title>
 	      <style type = "text/css">
       <?php
include('style.css');
?>
      </style>
  </head>

  <body>
    <img src="assets\images\1.png" id="bg" alt="">
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
