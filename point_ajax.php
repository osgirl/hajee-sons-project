<?php 
include 'db_connect.php';
if (isset($_POST["point"])) 
{
	$sp=0;
	$sq=0;
	$point = $_POST["point"];
	$date1 = $_POST["dt1"];
	$date2 = $_POST["dt2"];

	?><!DOCTYPE html>
	<html>
	<head>
	<style>
		table{text-align:center;font-size:14px;background-color:#fff};
	</style>

</head>
<body>

		<div class="container">
			<div class="row">
				<div class="col-md-9">
					
				<div align="center">
						<marquee class="" style="color:red;font-size:18px"><img src="image/tr.png" style="width:111px" ><?php echo $point ?><img src="image/tr.png" style="width:111px" ></marquee>
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
		<?php 
			if ($date1!='' && $date1!='') 
	{
				
   ?>
   	<p  style="color:blue;text-align:center;"><?php echo $date1 ?> তারিখ থেকে <?php echo $date2 ?> তারিখের ভিতর </p >
			<div class="container" id="sales">
			<div class="row">
				<div class="col-md-9">
				<table  class="table table-striped table-bordered table-hover mydata" id="tabledit">
						<thead>
							<tr>
								<th>সিরিয়াল</th>
								<th>পণ্যের নাম</th>
								<th>বিক্রয় পরিমান</th>
								<th>মোট টাকা</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php

							
							$q="select sum(price),sum(quantity),product,quantity,price,date from point_sale where point='$point' and date between '$date1' and '$date2' ";
							$exe=mysqli_query($conn,$q);
							$id=0;
							
							while($row=mysqli_fetch_array($exe))
							{
								$id++;
								$sp=$row[0];;
								$sq=$row[1];;
								$product=$row[2];
								$quantity=$row[3];
								$price=$row[4];
								$date=$row[5];
								?>
								<tr>
									<td> <label for="Price"><?php echo $id; ?></label></td>
									<td> <label for="Price"><?php echo $product;  ?></label></td>
									<td> <label for="Price"><?php echo round($quantity,2);  ?></label></td>
									<td> <label for="Price"><?php echo round($price,2);  ?></label></td>
									<td> <label for="Price"><?php echo $date;  ?></label></td>
								</tr>
								<?php  }  ?> 
							</tbody>
							<!-- <tfoot>
								<tr>
									<th colspan="">মোট:- <?php echo $sq;  ?></th>
									<th >মোট:- <?php echo $sp;  ?></th>
								</tr>
							</tfoot> -->
						</table>
			</div>
		</div>
	</div>
		<div class="container" id="inv" >
				<div class="row">
					<div class="col-md-9">
					<table  class="table  table-bordered table-hover mydata" id="tabledit">
							<thead>
								<tr>
									<th>সিরিয়াল</th>
									<th>পনের নাম</th>
									<th>পরিমান</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$q="select * from point_inventory where point='$point' ";
								$exe=mysqli_query($conn,$q);
								$id=0;
								while($row=mysqli_fetch_array($exe))
								{
									$id++;

									$product=$row['product'];
									$quantity=$row['quantity'];
									?>
									<tr>
										<td> <label for="Price"><?php echo $id; ?></label></td>
										<td> <label for="Price"><?php echo $product;  ?></label></td>
										<td> <label for="Price"><?php echo round($quantity,2);  ?></label></td>
									</tr>
									<?php  }  ?>
								</tbody>
								<tfoot>
									<tr>
										<th>সিরিয়াল</th>
										<th>পনের নাম</th>
										<th>পরিমান</th>
									</tr>
								</tfoot>
							</table>
					</div>
				</div>
		</div>
		<div class="container" id="acc" >
					<div class="row" >
						<div class="col-md-9">
							<table id="tabledit" class="table table-bordered table-hover ">
								<thead>
									<tr>

										<th>হিসাব </th>
										<th>টাকার পরিমান</th>
									</tr>
								</thead>
								<tbody>
									<?php

									$sale=0; $import=0;$expense=0;$duep=0;
									$q="SELECT  sum(total) FROM distribute WHERE point='$point' AND date BETWEEN  '$date1' and '$date2' ";
									$exe=mysqli_query($conn,$q);
									while($row1=mysqli_fetch_array($exe))
									{
										$import=$row1[0];

									}

									$qq="SELECT  sum(price) FROM point_sale WHERE point='$point' AND date between '$date1' and '$date2' ";
									$exeq=mysqli_query($conn,$qq);
									while($row2=mysqli_fetch_array($exeq))
									{
										$sale=$row2[0];

									}

									$qqq="SELECT  sum(amount) FROM expense WHERE user='$point' AND date between '$date1' AND '$date2' ";
									$exeqq=mysqli_query($conn,$qqq);
									while($row3=mysqli_fetch_array($exeqq))
									{
										$exp=$row3[0];
									}

									$l="SELECT  sum(paid) FROM take_due WHERE point='$point' AND date between '$date1' and '$date2' ";
									$ll=mysqli_query($conn,$l);
									while($row4=mysqli_fetch_array($ll))
									{
										$duep=$row4[0];
									}

									?>
									<tr>
										<td> <label for="Price"> সেলস হয়েছে</label></td>
										<td> <label for="Price"><?php echo round($sale,2);  ?>৳</label></td>
									</tr>
									<tr>
										<td> <label for="Price"> মাল পাঠানো হয়েছে</label></td>
										<td> <label for="Price"><?php echo round($import,2);  ?>৳</label></td>
									</tr>
									<tr>
										<td> <label for="Price"> খরচ হয়েছে</label></td>
										<td> <label for="Price"><?php echo round($exp,2);  ?>৳</label></td>
									</tr>
									<tr>
										<td> <label for="Price">টাকা পাঠিয়েছ</label></td>
										<td> <label for="Price"><?php echo round($duep,2);  ?>৳</label></td>
									</tr>

									<?php  

									?>
								</tbody>
								<tfoot>
									<!-- <tr>
										<td colspan="5" style="text-align:center;font-size: 25px;  ">এই মুহূর্তে ক্যাশে আছে <span style="color:red"><?php echo $sale-($exp+$duep) ?></span> টাকা </td>
									</tr> -->
								</tfoot>
							</table>
							</div>
						</div>
		</div>


   <?php

   }




   else{
   	?>


		<div class="container" id="sales">
				<div class="row">
				<div class="col-md-9">
				<table  class="table table-striped table-bordered table-hover mydata" id="tabledit">
						<thead>
							<tr>
								<th>সিরিয়াল</th>
								<th>পণ্যের নাম</th>
								<th>বিক্রয় পরিমান</th>
								<th>মোট টাকা</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php

							
							$q="select sum(price),sum(quantity),product,quantity,price,date from point_sale where point='$point' ";
							$exe=mysqli_query($conn,$q);
							$id=0;
							
							while($row=mysqli_fetch_array($exe))
							{
								$id++;
								$sp=$row[0];;
								$sq=$row[1];;
								$product=$row[2];
								$quantity=$row[3];
								$price=$row[4];
								$date=$row[5];
								?>
								<tr>
									<td> <label for="Price"><?php echo $id; ?></label></td>
									<td> <label for="Price"><?php echo $product;  ?></label></td>
									<td> <label for="Price"><?php echo round($quantity,2);  ?></label></td>
									<td> <label for="Price"><?php echo round($price,2);  ?></label></td>
									<td> <label for="Price"><?php echo $date;  ?></label></td>
								</tr>
								<?php  }  ?> 
							</tbody>
							<!-- <tfoot>
								<tr>
									<th>সিরিয়াল</th>
									<th>পণ্যের নাম</th>
									<th>মোট:- <?php echo $sq;  ?></th>
									<th>মোট:- <?php echo $sp;  ?></th>
									<th>Date</th>
								</tr>
							</tfoot> -->
						</table>
				</div>
			</div>
		</div>
		<div class="container" id="inv" >
				<div class="row">
					<div class="col-md-9">
					<table  class="table table-striped table-bordered table-hover mydata" id="tabledit">
							<thead>
								<tr>
									<th>সিরিয়াল</th>
									<th>পনের নাম</th>
									<th>পরিমান</th>
								</tr>
							</thead>
							<tbody>
								<?php

								include'db_connect.php';
								$q="select * from point_inventory where point='$point' ";
								$exe=mysqli_query($conn,$q);
								$id=0;
								while($row=mysqli_fetch_array($exe))
								{
									$id++;

									$product=$row['product'];
									$quantity=$row['quantity'];
									?>
									<tr>
										<td> <label for="Price"><?php echo $id; ?></label></td>
										<td> <label for="Price"><?php echo $product;  ?></label></td>
										<td> <label for="Price"><?php echo round($quantity,2);  ?></label></td>
									</tr>
									<?php  }  ?>
								</tbody>
								<!-- <tfoot>
									<tr>
										<th>সিরিয়াল</th>
										<th>পনের নাম</th>
										<th>পরিমান</th>
									</tr>
								</tfoot> -->
							</table>
					</div>
				</div>
		</div>
		<div class="container" id="acc" >
					<div class="row" >
						<div class="col-md-9">
							<table id="tabledit" class="table table-bordered table-hover ">
								<thead>
									<tr>

										<th>হিসাব </th>
										<th>টাকার পরিমান</th>
									</tr>
								</thead>
								<tbody>
									<?php

									include'db_connect.php';
									$sale=0; $import=0;$expense=0;$duep=0;
									$q="SELECT  sum(total) FROM distribute WHERE point='$point' AND date = DATE(NOW()) ";
									$exe=mysqli_query($conn,$q);
									while($row=mysqli_fetch_array($exe))
									{
										$import=$row[0];

									}

									$qq="SELECT  sum(price) FROM point_sale WHERE point='$point' AND date = DATE(NOW()) ";
									$exeq=mysqli_query($conn,$qq);
									while($row=mysqli_fetch_array($exeq))
									{
										$sale=$row[0];

									}

									$qqq="SELECT  sum(amount) FROM expense WHERE user='$point' AND date = DATE(NOW()) ";
									$exeqq=mysqli_query($conn,$qqq);
									while($row=mysqli_fetch_array($exeqq))
									{
										$exp=$row[0];
									}

									$l="SELECT  sum(paid) FROM take_due WHERE point='$point' AND date = DATE(NOW()) ";
									$ll=mysqli_query($conn,$l);
									while($row=mysqli_fetch_array($ll))
									{
										$duep=$row[0];
									}

									?>
									<tr>
										<td> <label for="Price">আজ সেলস হয়েছে</label></td>
										<td> <label for="Price"><?php echo round($sale,2);  ?>৳</label></td>
									</tr>
									<tr>
										<td> <label for="Price">আজ মাল পাঠানো হয়েছে</label></td>
										<td> <label for="Price"><?php echo round($import,2);  ?>৳</label></td>
									</tr>
									<tr>
										<td> <label for="Price">পয়েন্টে খরচ হয়েছে</label></td>
										<td> <label for="Price"><?php echo round($exp,2);  ?>৳</label></td>
									</tr>
									<tr>
										<td> <label for="Price">টাকা পাঠিয়েছ</label></td>
										<td> <label for="Price"><?php echo round($duep,2);  ?>৳</label></td>
									</tr>

									<?php  

									?>
								</tbody>
								<tfoot>
									<!-- <tr>
										<td colspan="5" style="text-align:center;font-size: 25px;  ">এই মুহূর্তে ক্যাশে আছে <span style="color:red"><?php echo $sale-($exp+$duep) ?></span> টাকা </td>
									</tr> -->
								</tfoot>
							</table>
							</div>
						</div>
		</div>



   	<?php
   }
		?>
		



	<script>
				$(document).ready(function () {
					$('#inv').hide();
					$('#sales').hide();
					$('#acc').fadeIn();

					$('.acc').click(function(){
						$('#inv').hide();
						$('#acc').fadeIn();
						$('#sales').hide();
					});
					$('.sales').click(function(){
						$('#inv').hide();
						$('#acc').hide();
						$('#sales').fadeIn();
					});
					$('.inv').click(function(){
						$('#inv').fadeIn();
						$('#acc').hide();
						$('#sales').hide();
					});

				});
			</script>
		</body>
		</html>
		<?php 
	}?>
