<?php
	include 'Session.php';
	if($_SERVER["REQUEST_METHOD"] == "POST")
{
   $date1 = mysqli_real_escape_string($conn,$_POST['date']);
   $save=$conn->query("INSERT INTO `request` VALUES('', '$login_session_employee','$date1','Pending')") or die(mysqli_error());

}
?>
<html lang="eng">
	<head>
		<title>Simple Employee Attendance Record System</title>
		<?php include 'header.php'; ?>
	</head>
	<body>
		<?php include 'nav_bar.php' ?>
		<div class = "container-fluid admin">
			
			<div class = "alert alert-primary">Dashboard</div>
			<h5>Welcome <?php echo $login_username_employee ?> !</h5>

				<br>

		<br>

		<button class="start" data-id="<?php echo $row['id']?>" type="button"style ="float: left;background-color: red;"> Start Work </button>

		<button class="end" data-id="<?php echo $row['id']?>" type="button" style ="float: right; margin-right: 500px;background-color: red;"> Closing Work </button>
<br>
<br>
<br>

           <form method="post">
             <h1>Send a request for leave to Admin</h1><br>
             <input type = "date" placeholder="date" name="date">
             <button>Request</button>
           </form>

           <div class = "well col-lg-12">
				<table id="table" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Employee Number</th>
							<th>Name</th>
							<th>Date</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$request_qry = $conn->query("SELECT * from request where employee_id = '$login_session_employee'") or die(mysqli_error());
						while($row = $request_qry->fetch_array()){

				    $id3 = $row['employee_id'];
					$request_qry1 = $conn->query("SELECT firstname from employee where id='$id3' ") or die(mysqli_error());
					$row2 = $request_qry1->fetch_array();
							
					?>	
					
						<tr>
							<td><?php echo $row['employee_id']?></td>
							<td><?php echo $row2['firstname']?></td>
							<td><?php echo $row['Date']?></td>
							<td><center><button class = "btn btn-sm btn-outline-danger Approve" type="button"><?php echo $row['Status']?> </button></center></td>
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


		</div>

		<script type="text/javascript">

			$(document).ready(function(){
			$('#table').DataTable();
		});
		$(document).ready(function(){

			$('.start').click(function(){
				var id=$(this).attr('data-id');
				var _conf = confirm("Are you sure start the work?");
				if(_conf == true){
					$.ajax({
						url:'add_time.php?id='+id,
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

				$('.end').click(function(){
				var id=$(this).attr('data-id');
				var _conf = confirm("Are you sure end the work for today ?");
				if(_conf == true){
					$.ajax({
						url:'end_time.php?id='+id,
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

	</body>
	
	
</html>