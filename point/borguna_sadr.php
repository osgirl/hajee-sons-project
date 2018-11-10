<!DOCTYPE html>
<html>
<head>
	<title>বরগুনা সদর</title>
	<style>
	.mycss
	{
		text-shadow:-3px 1px 2px rgba(193,112,255,1);font-weight:normal;color:#000000;letter-spacing:1pt;word-spacing:2pt;font-size:22px;text-align:center;font-family:impact, sans-serif;line-height:1;
	}
	body {
		margin: auto;
		background: #fff;  
		font-family: 'Open Sans', sans-serif;
	}
	h1{margin:0px}
	table { width: 100%;border-collapse: collapse;}
	tr:nth-of-type(odd) {background: #eee;}
	th {background: #333;color: white; font-weight: bold;}
	td, th {padding: 6px;border: 1px solid #ccc;text-align: left;}
</style>
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php include '../header.php' ?>
				</div>
				
			</div>
		</div>
	</section><!-- header section end -->

	<section >
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div align="center">
						<p class="mycss">বরগুনা সদর</p>
						<ul class="menu">
							<li>
								<div class="dropdown">
									<a href="#"><button class="dropbtn sales" style="background-color: #1d44cc;">সেলস</button></a>
								</div>
							</li>
							<li>
								<div class="dropdown">
									<a href="#"><button class="dropbtn inv" style="background-color: #2d2424;">স্টক</button></a>
								</div>
							</li>
							<li>
								<div class="dropdown">
									<a href="#"><button class="dropbtn acc" style="background-color: #c14c4c;">একাউন্ট</button></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
				
			</div>
		</div>
	</section><!-- submenu section end -->
	
	<section id="sales"><!-- sales section start -->
		<div class="container" id="sales">
			<div class="row">
				<div class="col-md-12">
					<h1>সেলস</h1>
					<table  class="table table-striped table-bordered table-hover mydata" id="tabledit">
						<thead>
							<tr>
								<th>সিরিয়াল</th>
								<th>পণ্যের নাম</th>
								<th>বিক্রয় পরিমান</th>
								<th>মোট টাকা</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
						<tfoot>
							<tr>
								<th>সিরিয়াল</th>
								<th>পণ্যের নাম</th>
								<th>বিক্রয় পরিমান</th>
								<th>মোট টাকা</th>
							</tr>
						</tfoot>
					</table>
				</div>
				
			</div>
		</div>
	</section><!-- sales section end -->

	<section id="inv"><!-- inventory section start -->
		<div class="container" >
			<div class="row">
				<div class="col-md-12">
					<h1>স্টক</h1>
					<table  class="table table-striped table-bordered table-hover mydata" id="tabledit">
						<thead>
							<tr>
								<th>সিরিয়াল</th>
								<th>পনের নাম</th>
								<th>পরিমান</th>
								<th>টাকা</th>
							</tr>
						</thead>
						<tbody>
							<?php

							include'../db_connect.php';
							$q="select * from point_inventory where point='Borguna Sadr' ";
							$exe=mysqli_query($conn,$q);
							$id=0;
							while($row=mysqli_fetch_array($exe))
							{
								$id++;

								$product=$row['product'];
								$quantity=$row['quantity'];
								$price=$row['price'];
								?>
								<tr>
									<td> <label for="Price"><?php echo $id; ?></label></td>
									<td> <label for="Price"><?php echo $product;  ?></label></td>
									<td> <label for="Price"><?php echo $quantity;  ?></label></td>
									<td> <label for="Price"><?php echo $price;  ?></label></td>
								</tr>
								<?php  }  ?>
						</tbody>
						<tfoot>
							<tr>
								<th>সিরিয়াল</th>
								<th>পনের নাম</th>
								<th>পরিমান</th>
								<th>টাকা</th>
							</tr>
						</tfoot>
					</table>
				</div>

			</div>
		</div>
	</section><!-- inventory section end -->

	<section  id="acc" ><!-- acc section start -->
		<div class="container" >
			<div class="row" >
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<h1>অ্যাকাউন্ট</h1>
					<table  class="table table-striped table-bordered table-hover" id="tabledit">
						<thead>
							<tr>
								<th>শিরনাম</th>
								<th>টাকা</th>
							</tr>
						</thead>
						<tbody>
							<tr><td><label>বিক্রয়</label></td><td>২৩৪২৪২৩৪</td></tr>
							<tr><td ><label >খরচ</label></td><td>২৩৪৩</td></tr>

						</tbody>
						<tfoot>
							<tr>
								<td style="text-align:right;"><label>মোট</label></td><td>২৩৪৫৪৫৩</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="col-md-4"></div>

			</div>
		</div>
	</section><!-- acc section end -->
		<script src="../js/dataTables.bootstrap.min.js"></script>
		<script src="../js/jquery.dataTables.min.js"></script>
		<script>
			$(document).ready(function(){
				$('.mydata').dataTable();
				$('#inv').hide();
				$('#sales').hide();
				$('#acc').show();

				$('.acc').click(function(){
					$('#inv').hide();
					$('#acc').show();
					$('#sales').hide();
				});
				$('.sales').click(function(){
					$('#inv').hide();
					$('#acc').hide();
					$('#sales').show();
				});
				$('.inv').click(function(){
					$('#inv').show();
					$('#acc').hide();
					$('#sales').hide();
				});
			});

		</script>
	</body>
	</html>