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
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$attendance_qry = $conn->query("SELECT a.*,concat(e.firstname,' ',e.middlename,' ',e.lastname) as name, e.employee_no FROM `attendance` a inner join employee e on a.employee_id = e.id ") or die(mysqli_error());
						while($row = $attendance_qry->fetch_array()){
							
					?>	
						<tr>
							<td><?php echo $row['employee_no']?></td>
							<td><?php echo htmlentities($row['name'])?></td>
							<td><?php echo $row['date1']?></td>
							<td><?php echo $row['IN_time']?></td>
							<td><?php echo $row['Out_time']?></td>
							<td><center><button data-id = "<?php echo $row['id']?>" class = "btn btn-sm btn-outline-danger remove_log" type="button"><i class = "fa fa-trash"></i></button></center></td>
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
	<script type = "text/javascript">
		$(document).ready(function(){
			$('.remove_log').click(function(){
				var id=$(this).attr('data-id');
				var _conf = confirm("Are you sure to delete this data ?");
				if(_conf == true){
					$.ajax({
						url:'delete_log.php?id='+id,
						error:err=>console.log(err),
						success:function(resp){
							if(typeof resp != undefined){
								resp = JSON.parse(resp)
								if(resp.status == 1){
									alert(resp.msg);
									location.reload()
								}
							}
						}
					})
				}
			});
		});
	</script>
</html>