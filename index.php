<?php 
include 'db_connect.php';
session_start();
$user=$_SESSION['user'];


if ($_SESSION['type'] != 'ADMIN') {
	header('location:login.php');
} 
else{
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="stylesheet" href="css/bstyle.css">
		<link rel="stylesheet" href="css/bar.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php include 'header.php' ; ?>
				</div>
			</div>
		</div>
		<marquee style="font-size:20px;color:#6b1b1b;" ><img src="image/has.gif" alt="" style="width:150px">Hajee & Sons<img src="image/has.gif" alt="" style="width:150px"></marquee>
		
<div class="container" >
		<div class="row">
			<div class="col-md-6">
					<div id="wrapper" style="position:relative;">
					<div class="chart">
						
						<table id="data-table" border="1" cellpadding="10" cellspacing="0"
						summary="">
						<thead>
							<tr>
								<td>&nbsp;</td>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">BENSON</th>
								<td>85</td>
							</tr>
							<tr>
								<th scope="row">GOLDLIEF</th>
								<td>99</td>
							</tr>
							<tr>
								<th scope="row">MERIS</th>
								<td>70</td>
							</tr>
							<tr>
								<th scope="row">NEVY</th>
								<td>60</td>
							</tr>
							<tr>
								<th scope="row">PALMAL</th>
								<td>85</td>
							</tr>
							<tr>
								<th scope="row">SHEKH</th>
								<td>60</td>
							</tr>
							<tr>
								<th scope="row">MALBRO</th>
								<td>50</td>
							</tr>
							<tr>
								<th scope="row">BLACK</th>
								<td>60</td>
							</tr>
							<tr>
								<th scope="row">STAR</th>
								<td>90</td>
							</tr>
							<tr>
								<th scope="row">OTHERS</th>
								<td>90</td>
							</tr>
						</tbody>
					</table>
				</div>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-2">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<label for="" class="control-label">Import</label>
							<div class="progress">
								<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
								aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
								60%
								</div>
								
							</div>
								<label for=""  class="control-label">Sales</label>
							<div class="progress">
								<div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar"
								aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">
								50%
								</div>
							</div>
								<label for=""  class="control-label">Stock</label>
							<div class="progress">
								<div class="progress-bar progress-bar-sky progress-bar-striped active" role="progressbar"
								aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="width:55%">
								55%
								</div>
							</div>
								<label for=""   class="control-label">Expense</label>
							<div class="progress">
								<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar"
								aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width:25%">
								25%
								</div>
								
							</div>
						</div>
					</div>
				
			</div>
			
		</div>
</div>
<?php include 'footer.php' ?>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/graph.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>

</script>
</body>
</html>
<?php
}
?>
