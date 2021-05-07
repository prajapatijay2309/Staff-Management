<!DOCTYPE html>
<?php
	require_once 'Session.php';
?>
<html lang = "eng">
	<head>
		<title>Attendance List | Employee Attendance Record System</title>
		<?php include('header.php') ?>
	</head>
	<body>
		<?php include('nav_bar.php') ?>
		<div class = "container-fluid admin" >
			<div class = "alert alert-primary">Attendance List</div>
			<div class = "modal fade" id = "delete" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				
			</div>
			<div class = "well col-lg-12">
				<table id="table" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Employee Number</th>
							<th>Name</th>
							<th>Date</th>
							<th>IN time</th>
							<th>OUT time</th>

							<th>Total Working hour</th>
							<th>Deduction</th>
							<th>Incentive</th>
						</tr>

					</thead>
					<tbody>
					<?php
						$attendance_qry = $conn->query("SELECT a.*,concat(e.firstname,' ',e.middlename,' ',e.lastname) as name, e.employee_no FROM `attendance` a inner join employee e on a.employee_id = e.id where employee_id='$login_session_employee' ") or die(mysqli_error());
						while($row = $attendance_qry->fetch_array()){
							
					?>	
						<tr>
							<td><?php echo $row['employee_no']?></td>
							<td><?php echo htmlentities($row['name'])?></td>
							<td><?php echo $row['date1']?></td>
							<td><?php echo $row['IN_time']?></td>
							<td><?php echo $row['Out_time']?></td>
							<td><?php echo $row['time_diff']?></td>
							<td><?php echo $row['Deduction']?></td>
							<td><?php echo $row['Incentive']?></td>
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
			<br />
			<br />	
			<br />	
			</div>
		</div>
		
	</body>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
</html>