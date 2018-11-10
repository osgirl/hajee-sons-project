
	<?php 
include 'db_connect.php';
$point ='';
session_start();
$user=$_SESSION['user'];


if ($_SESSION['type'] != 'ADMIN') 
{
	header('location:login.php');
} 
else
{
	?>	
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Employee Mangement</title>

		<?php include 'header2.php' ?>
		<style>
			body{
      
    background-image:url("image/bg1.jpg");
    font-family: 'Open Sans', sans-serif;
}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php include 'header.php' ?>
				</div>
			</div>
			<div class="row" align="center">
				<div class="col-md-12">
					<style>.s{background-color:#0c2929}</style>
					<a href="add_employee.php"><button class="btn s btn-success" >ADD NEW EMPLOYEE</button></a>
					<a href="view_employee.php"<a href="add_employee.php"<button class="btn s btn-success" >VIEW ALL EMPLOYEE</button></a>
					<a href="give_salary.php"<button class="btn s btn-success" >GIVE SALARY</button></a>
				</div>
			</div>
			<div class="row">
				<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/jquery.dataTables.min.css">
	<table class="table table-bordered table-hover table-responsive mytable">
		<thead>
			<th>ID</th>
			<th>Name</th>
			<th>Job Title</th>
			<th>Location</th>
			<th>Phone</th>
			<th>Salary</th>
			<th>Join Date</th>
			<th>Details</th>
		</thead>
		<tbody>
			<?php
				include 'db_connect.php';
				$query = "SELECT * FROM employee";
				$exe = mysqli_query($conn,$query);
				while($row = mysqli_fetch_array($exe))
				{
					$id = $row['id'];
					$name = $row['name'];
					$job_title = $row['job_title'];
					$job_location = $row['job_location'];
					$salary = $row['salary'];
					$phone = $row['mobile'];
					$join_date = $row['join_date'];

					?>
						<tr>
							<td><?php echo $id ?></td>
							<td><?php echo $name ?></td>
							<td><?php echo $job_title ?></td>
							<td><?php echo $job_location ?></td>
							<td><?php echo $salary ?></td>
							<td><?php echo $phone ?></td>
							<td><?php echo $join_date ?></td>
							<td><a href="update.php?del=<?php echo $row['id']; ?>" class="btn btn-info" >Details</a></td>
						</tr>
					<?php
				}
			?>
		</tbody>
	</table>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script>
		$('.mytable').dataTable();
	</script>
			</div>
		</div>
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script>
			

			  
		</script>
	</body>
	</html>
	<?php
}
?>









