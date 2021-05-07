<!DOCTYPE html>
<?php
	require_once 'Session.php';
?>
<html lang = "eng">
	<head>
		<title>Request List | Employee Attendance Record System</title>
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
							<th>Approve</th>
							<th>Reject</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$request_qry = $conn->query("SELECT * from request where Status='pending' ") or die(mysqli_error());
						while($row = $request_qry->fetch_array()){

				    $id3 = $row['employee_id'];
					$request_qry1 = $conn->query("SELECT firstname from employee where id='$id3' ") or die(mysqli_error());
					$row2 = $request_qry1->fetch_array();
							
					?>	
					
						<tr>
							<td><?php echo $row['employee_id']?></td>
							<td><?php echo $row2['firstname']?></td>
							<td><?php echo $row['Date']?></td>
							<td><center><button data-id = "<?php echo $row['id']?>" class = "btn btn-sm btn-outline-danger Approve" type="button">Approve</button></center></td>
							<td><center><button data-id = "<?php echo $row['id']?>" class = "btn btn-sm btn-outline-danger Reject" type="button">Reject</button></center></td>
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
			$('.Approve').click(function(){
				var id=$(this).attr('data-id');
				var _conf = confirm("Are you sure to Approve the Leave ?");
				if(_conf == true){
					$.ajax({
						url:'Approve.php?id='+id,
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

			$('.Reject').click(function(){
				var id=$(this).attr('data-id');
				var _conf = confirm("Are you sure to Reject the Leave ?");
				if(_conf == true){
					$.ajax({
						url:'Reject.php?id='+id,
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