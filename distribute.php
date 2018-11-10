<?php 
include 'db_connect.php';
$point ='';
session_start();
$user=$_SESSION['user'];


if ($_SESSION['type'] != 'ADMIN') 
{
	header('location:login.php');
} 
else{
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>ডিস্ট্রিবিউট</title>
		
		<style>
		

	</style>
</head>
<body >
	<?php include 'header.php' ?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					
					<?php include 'distribute_form.php' ?>
				</div>
				<div class="col-md-4">
					<table id="tabledit" class="table table-bordered table-hover " style="text-align:center;font-size:16px;background-color:#ededed  ">

						<caption style="color:green;text-align:center;font-size:18px  ">
							<a type="submit" href="" class="btn btn-warning">Refresh</a>
						</caption>
						<caption style="color:green;text-align:center;font-size:18px  ">
							যেসব প্রডাক্ট সিলেক্ট করা হয়েছে 
						</caption>
						<thead>
							<tr>
								
								<th>প্রোডাক্ট</th>
								<th>পরিমান</th>
								<th>হাজার</th>
								<th>মোট</th>
								<th>ডিলিট</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query4list = "SELECT * FROM list_check";
							$exe4list = mysqli_query($conn,$query4list);
							while($row = mysqli_fetch_array($exe4list)){
								?>
								<tr>
									
									<td><?php echo $row['product'] ?></td>
									<td><?php echo $row['quantity'] ?></td>
									<td><?php echo $row['price'] ?></td>
									<td><?php echo $row['tprice'] ?></td>
									<td><a href="distribute_added_list_dilete.php?del_list=<?php echo $row['id']; ?>" class="btn btn-info" >Delete</a></td>
								</tr>
								<?php
							}
							?>
						</tbody><br>
					</table>
				</div>
				<div class="col-md-3" style="margin-top:40px">
					<p style="color:red;text-align:center;font-size:18px;text-decoration:underline; ">
						লেন-দেন
					</p>
					<form style="background-color: #6389c4;margin-left: 0%;padding: 15px;color:black;" method="post">
						<div class="">
							<labe>পয়েন্ট এর নাম</label>
								<input  id="point" type="text" class="form-control"  name="point" placeholder="point..."  

								<?php

								$q="SELECT point FROM list_check";
								$a=mysqli_query($conn,$q);
								while($row=mysqli_fetch_array($a))
								{
									$point=$row['point'];
									?> value="<?php  echo $point; ?>" <?php 

								} ?> readonly required>

							</div>

							<div class="">
								<label >যেসব প্রোডাক্ট পাঠানো হচ্ছে</label>
								<input  id="product" type="text" class="form-control" name="product" placeholder="product..."  

								<?php


								$qk="SELECT product FROM list_check where point='$point'";
								$ak=mysqli_query($conn,$qk);
								$print = '';
								while($row=mysqli_fetch_array($ak))
								{
									$product=$row['product'];
									$print = $print.$product.',';
								}
								?> value="<?php  echo $print; ?>" <?php 
								?> required>
							</div>
							<div class="">
								<label >মোট  টাকার পরিমান</label>
								<input  id="total" type="text" class="form-control" name="total" placeholder="Total..."  

								<?php

								$q="SELECT sum(tprice) FROM list_check";
								$a=mysqli_query($conn,$q);
								while($row=mysqli_fetch_array($a))
								{
									$name=$row[0];
									?> value="<?php  echo round($name,2); ?>" <?php 

								} ?> readonly required>

							</div>
							<div class="">
								<label class="col-form-label">তারিখ</label>
								<input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" id="date" required>
							</div>

							<div align="center" class="">
								<button type="submit" name="confirm" onclick="myFunction()"  class="btn btn-success">Confirm </button>
							</div>
						</form>
						<?php 
						if(isset($_POST['confirm']))
						{

							$product = $_POST['product'];
							$point = $_POST['point'];
							$due = $_POST['total'];
							$date = $_POST['date'];

							$dist = "INSERT INTO distribute_ok (point,total,date)VALUES('$point','$due','$date')";

							$di =mysqli_query($conn,$dist) ;

							$duee = "SELECT * FROM point_account where point = '$point' ";

							$d =mysqli_query($conn,$duee) ;
							if(mysqli_num_rows($d) > 0)
							{
								$due_old= 0;
								while($row = mysqli_fetch_array($d)){
									$due_old = $row['due'];
								}
								$query = "UPDATE point_account set due = '$due'+'$due_old' WHERE point = '$point' ";

								$q =mysqli_query($conn,$query) ;
								if($q>0)
								{
									$query2 = "DELETE FROM list_check";
									$q2 =mysqli_query($conn,$query2) ;
								}

							}
							else{
								$query = "INSERT INTO point_account (point,product,due,date)VALUES('$point','$product','$due','$date')";

								$q =mysqli_query($conn,$query) ;
								if($q>0)
								{
									$query2 = "DELETE FROM list_check";
									$q2 =mysqli_query($conn,$query2) ;



								}
							}


						}
						
						?>
					</div>
				</div>
			</div>
		</section>
		<?php include 'footer.php' ?>
	</body>
	</html>
	<script>
		function myFunction() {
			location.reload();
		}
	</script>

	<?php
}
?>