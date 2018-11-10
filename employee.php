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
				
			</div>
		</div>
		<?php include 'footer.php' ?>
		<script>
			

			  
		</script>
	</body>
	</html>
	<?php
}
?>
