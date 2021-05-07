<!DOCTYPE html>
<?php
	require_once 'Session.php';
?>
<html lang = "eng">
	<head>
		<title>Attendance List | Employee Attendance Record System</title>
		<?php include('header.php') ?>
	</head>
	<style type="text/css">
		.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
	</style>
	<body>
		<?php include('nav_bar.php') ?>
		<div class = "container-fluid admin" >
			<div class = "modal fade" id = "delete" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				
			</div>
<h2 style="text-align:center">User Profile Card</h2>
<br>


<div class="card">
  <img src="assets\images\4.jfif" alt="John" style="width:80px; height:80px;margin-left: 120px;">
  <br>

  <?php
							$employee_qry=$conn->query("SELECT * FROM employee where id = '$login_session_employee'") or die(mysqli_error());
							$row=$employee_qry->fetch_array()
						?>
  <h1><?php echo $row['firstname']?></h1>
  <p class="title">Position :<?php echo $row['position']?></p>
  <p class="title">Salary: <?php echo $row['Salary']?></p>
  <p class="title">Employee Number : <?php echo $row['employee_no']?></p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><button>Department:<?php echo $row['department']?></button></p>
</div>
		</div>
		
	</body>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
</html>