<?php 
include 'db_connect.php';
$point ='';
session_start();
$user=$_SESSION['user'];
$date1='';$date2='';
if (isset($_POST['search_de'])) {
	$date1=$_POST['date1'];
	$date2=$_POST['date2'];}
	$amount = 0;
	if ($_SESSION['type'] != 'ADMIN') 
	{
		header('location:login.php');
	} 
	else{
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>পয়েন্ট</title>
			<style>

			#list3 ul { list-style-image: url("image/ls.png"); color:#000; font-size:18px; }

		</style>

	</head>
	<body>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php include 'header.php' ?>
				</div>
				
			</div>
		</div>


		<div class="container">
			<div class="row">

				<div class="col-md-3">
					<div class="row">
						<div class="col-md-12">

							<form method="POST" class="form" style="padding: 10px 9px 0px 10px;padding-bottom: 1px;margin-top:45px">
								<h4 style="text-align:center;color:white;">REPORT</h4>
								<div class="">
									<div class="">
										<div class="form-group" style="margin-bottom:5px;" >
											<select name="point_s" id="point_s" class="form-control">
												<?php 
												$pd = "SELECT  name from point_list ";
												$p = mysqli_query($conn,$pd);
												while($row = mysqli_fetch_array($p)){
													$point_s = $row[0];
													?> <option value="<?php echo $point_s ?>"><?php echo $point_s ?></option><?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group" style="margin-bottom:-5px;">
												<input type="date" name="date1"    class="form-control" value="<?php echo date('Y-m-d') ;?>">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group" style="margin-bottom:-5px;">
												<input type="date" name="date2"  class="form-control" value="<?php echo date('Y-m-d') ;?>">
											</div>
										</div>
										

									</div>
									
									<div class="form-group" align="center" >
										
										<button type="submit" name="print_de" class="btn btn-success">Print</button><button type="submit" name="print_de" class="btn btn-info">Excel</button>
										
									</div>

								</div>
							</form>
						</div>
					</div>
					<h3 style="text-align:center;color:red;text-decoration:underline;">সকল পয়েন্ট</h3>
					<div id="list3">
						<ul class="list-group">
							<?php
							$q="select name from point_list";
							$a=mysqli_query($conn,$q);
							while($row=mysqli_fetch_array($a))
							{
								$name=$row[0];

								?>
								<a href="#"><li class="list-group-item"><?php  echo $name; ?></li></a>

								<?php  }  ?>
							</ul>
						</div>
					</div>

					<div class="col-md-9" >

						<?php include 'search_de.php' ?>
						<div id="info">
							
						</div>


					</div>
				</div>
			</div>
			<input type="text" id="dt1" style="display:none;" value="<?php echo $date1 ?>" >
			<input type="text" id="dt2" style="display:none;" value="<?php echo $date2 ?>" >
			<?php
			if(isset($_POST['print_de']))
			{
				$point_s = $_POST['point_s'];
				$date1 = $_POST['date1'];
				$date2 = $_POST['date2'];
				$query = "SELECT distribute_ok.date,take_due.date,distribute_ok.total,take_due.paid,take_due.bank_name FROM distribute_ok,take_due WHERE distribute_ok.point = take_due.point = '$point_s ' AND distribute_ok.date AND take_due.date  BETWEEN '$date1' AND '$date2' ";
				$exe = mysqli_query($conn,$query);
				while ($row = mysqli_fetch_array($exe)) {
					?>
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h4 style="text-align:center;color:red;"><?php echo $point_s; ?></h4>
								<table class="table table-bordered table-hover">
									<thead>
										<tr><th>তারিখ</th><th>বিবরণ</th><th>টাকা জমা</th><th>সিগারেট টাকা</th><th>অবশিষ্ট</th></tr>
										<tr><th>ইজা</th><th></th><th></th><th></th><th>423424</th></tr>
									</thead>
									<tbody>
										<?php 
										if ($row[0]==$row[1]) {
											?>
											<tr>
												<td><?php echo $row[0] ?></td>
												<td>সিগারেট</td>
												<td></td>
												<td><?php echo $row[2] ?></td>
												<td>অবশিষ্ট</td>
											</tr>
											<tr>
												<td><?php echo $row[0] ?></td>
												<td><?php echo $row[4] ?></td>
												<td><?php echo $row[3] ?></td>
												<td></td>
												<td>অবশিষ্ট</td>
											</tr>
											<?php
										}
										else{
											?>
											<tr>
												<td><?php echo $row[0] ?></td>
												<td>সিগারেট</td>
												<td></td>
												<td><?php echo $row[2] ?></td>
												<td>অবশিষ্ট</td>
											</tr>
											<tr>
												<td><?php echo $row[1] ?></td>
												<td><?php echo $row[4] ?></td>
												<td><?php echo $row[3] ?></td>
												<td></td>
												<td>অবশিষ্ট</td>
											</tr>
											<?php
										}
										?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>
			
			<?php include 'footer.php' ?>

			<!--================SCRIPT================-->

			<script>
				$(document).ready(function () {
					$("li").click(function(){

						var point =	$(this).text();
						var dt1 =	$('#dt1').val();
						var dt2 =	$('#dt2').val();


						if (point != '') {
							$.ajax({
								url:"point_ajax.php",
								method:"POST",
								data:{point:point,dt1:dt1,dt2:dt2},
								success:function(data){
									// alert(data);
									$('#product_list').fadeIn();
									$('#info').html(data);
								}
							});
						}
					});
				});
			</script>
		</body>

		</html>
		<?php
	}
	?>
