<!DOCTYPE html>
<?php
	include 'Session.php';
?>
<html lang = "eng">
<style>
* {box-sizing: border-box;}
ul {list-style-type: none;}
body {font-family: Verdana, sans-serif;}

.calender{
	width : 200px;
	height :20px;
	float : right;
	margin-top: -200px;

}
.month {
  padding: 70px 25px;
  width: 100%;
  background: #1abc9c;
  text-align: center;
}

.month ul {
  margin: 0;
  padding: 0;
}

.month ul li {
  color: white;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 3px;
}

.month .prev {
  float: left;
  padding-top: 10px;
}

.month .next {
  float: right;
  padding-top: 10px;
}

.weekdays {
  margin: 0;
  padding: 10px 0;
  background-color: #ddd;
}

.weekdays li {
  display: inline-block;
  width: 13.6%;
  color: #666;
  text-align: center;
}

.days {
  padding: 10px 0;
  background: #eee;
  margin: 0;
}

.days li {
  list-style-type: none;
  display: inline-block;
  width: 13.6%;
  text-align: center;
  margin-bottom: 5px;
  font-size:12px;
  color: #777;
}

.days li .active {
  padding: 5px;
  background: #1abc9c;
  color: white !important
}
#clock { 
            font-size: 50px; 
            width: 300px; 
            text-align: center; 
            border: 2px solid black; 
            border-radius: 20px; 
        } 

	</style>
	<head>
		<title>Simple Employee Attendance Record System</title>
		<?php include 'header.php'; ?>
	</head>

	<body>
		<?php include 'nav_bar.php' ?>
		<div class = "container-fluid admin">
			
			<div class = "alert alert-primary">Dashboard</div>
			<h5>Welcome <?php echo $login_username_Admin ?> !</h5><br><br>
			<div id="clock">8:10:45</div> 

<div class= "calender">
<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      March<br>
      <span style="font-size:18px">2021</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">  
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li><span class="active">10</span></li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
  <li>31</li>
</ul>
</div>

<div class="well col-lg-9">
				
				<br />
				<br />
				<table id="table" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Employee No</th>
							<th>Firstname</th>
							<th>Lastname</th>
							<th>Salary</th>
							
						</tr>
					</thead>
					<tbody>
						<?php
							$employee_qry=$conn->query("SELECT * FROM employee`") or die(mysqli_error());
						
							while($row=$employee_qry->fetch_array()){
						?>
						<tr>
							<td><?php echo $row['employee_no']?></td>
							<td><?php echo $row['firstname']?></td>
							
							<td><?php echo $row['lastname']?></td>
							<td><?php echo $row['Salary']?></td>
							
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
				
		</div>
			</div>
		</div>
		<script> 
        setInterval(showTime, 1000); 
        function showTime() { 
            let time = new Date(); 
            let hour = time.getHours(); 
            let min = time.getMinutes(); 
            let sec = time.getSeconds(); 
            am_pm = "AM"; 
  
            if (hour > 12) { 
                hour -= 12; 
                am_pm = "PM"; 
            } 
            if (hour == 0) { 
                hr = 12; 
                am_pm = "AM"; 
            } 
  
            hour = hour < 10 ? "0" + hour : hour; 
            min = min < 10 ? "0" + min : min; 
            sec = sec < 10 ? "0" + sec : sec; 
  
            let currentTime = hour + ":"  
                + min + ":" + sec + am_pm; 
  
            document.getElementById("clock") 
                .innerHTML = currentTime; 
        } 
  
        showTime(); 
    </script> 

	</body>
	
	
</html>