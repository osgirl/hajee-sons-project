<?php 
include 'db_connect.php';
$point ='';$date1='';$date2='';$sum=0;
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
				<div class="col-md-12">
					<div align="center"><h2>পয়েন্টে পাঠানোর রেকর্ড</h2></div>
					<?php include 'search_de.php' ;?>
					<style>
						.dataTables_filter {display:none;}
					</style>
					<table id="tab" class="table table-bordered table-hover " style="text-align:center;font-size:14px;background-color:#ededed">
						<thead>
							<tr>
								<th>সিরিয়াল</th>
								<th>পয়েন্ট</th>
								<th>প্রোডাক্ট</th>
								<th>পরিমান</th>
								<th>প্রতি হাজারের মূল্য</th>
								<th>মোট মূল্য</th>
								<th>তারিখ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_POST['search_de'])) {

                $date1=$_POST['date1'];
                $date2=$_POST['date2'];

							$q="select * from distribute WHERE date between '$date1' and '$date2' ORDER BY id DESC";
							$exe=mysqli_query($conn,$q);
							$id=0;
							while($row=mysqli_fetch_array($exe))
							{
								$id++;

								$point=$row['point'];
								$name=$row['product'];
								$quantity=$row['quantity'];
								$date=$row['date'];
								$price=$row['price'];
								$total=$row['total'];
								$sum +=$total;
								?>
								<tr>
									<td><label for="Price"><?php echo $id; ?></label></td>
									<td><label for="Price"><?php echo $point; ?></label></td>
									<td><label for="Price"><?php echo $name; ?></label></td>
									<td><label for="Price"><?php echo $quantity;?></label></td>
									<td><label for="Price"><?php echo $price;?></label></td>
									<td><label for="Price"><?php echo $total;?></label></td>
									<td><label for="Price"><?php echo $date; ?></label></td>


								</tr>
								<?php  } 



							}
							else{

							$q="select * from distribute ORDER BY id DESC";
							$exe=mysqli_query($conn,$q);
							$id=0;
							while($row=mysqli_fetch_array($exe))
							{
								$id++;

								$point=$row['point'];
								$name=$row['product'];
								$quantity=$row['quantity'];
								$date=$row['date'];
								$price=$row['price'];
								$total=$row['total'];
								$sum +=$total;
								?>
								<tr>
									<td><label for="Price"><?php echo $id; ?></label></td>
									<td><label for="Price"><?php echo $point; ?></label></td>
									<td><label for="Price"><?php echo $name; ?></label></td>
									<td><label for="Price"><?php echo $quantity;?></label></td>
									<td><label for="Price"><?php echo $price;?></label></td>
									<td><label for="Price"><?php echo $total;?></label></td>
									<td><label for="Price"><?php echo $date; ?></label></td>


								</tr>
								<?php  } 
							}
							 ?> 
							
						</tbody>
						<tfoot>
							<tr align="center">
								<th colspan="7" ><label style="font-size:20px;color:red; ">মোট:<?php echo $sum ; ?> টাকা</label></th>
							</tr>
						</tfoot>
					</table>
				</div>
				</div>
			</div>
<?php include 'footer.php' ?>
		<script>
			$('#tab').dataTable();
		</script>
</body>
</html>

		<?php
}
?>
