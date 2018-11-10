<?php 
include 'db_connect.php';
$point ='';$date1='';$date2='';$sum=0;
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
	<html>
	<head>
		<title>আমদানি রেকর্ড</title>
	<style>
		table{text-align:center;font-size:14px;background-color:#ededed};
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
			<div class="col-md-12">
				<caption style="text-align:center;">
					<a type="submit" href="" class="btn btn-warning">Refresh</a>
					<a type="submit" href="import.php" class="btn btn-info">New Import</a>
				</caption>
				<div align="center"><h2>খুলনা থেকে মাল আনার রেকর্ড</h2></div>
				<?php include 'search_de.php';?>
				<style>
					.dataTables_filter {display:none;}
				</style>
				<table id="tabledit" class="table table-bordered table-hover" style="text-align:center;font-size:14px;background-color:#ededed">
					<thead>
						<tr>
							<th>সিরিয়াল</th>
							<th>তারিখ</th>
							<th>প্রোডাক্ট</th>
							<th>পরিমান(হাজার)</th>
							<th>হাজার প্রতি মূল্য</th>
							<th>মোট মূল্য</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_POST['search_de'])) {

                $date1=$_POST['date1'];
                $date2=$_POST['date2'];
                $q="select * from import where date between '$date1' and '$date2' ORDER BY id DESC ";
						$exe=mysqli_query($conn,$q);
						$id=0;
						while($row=mysqli_fetch_array($exe))
						{
							$id++;
							$date=$row['date'];
							$name=$row['name'];
							$quantity=$row['quantity'];
							$uprice=$row['price'];
							$tprice=$quantity*$uprice;
							$sum +=$tprice;
							?>
							<tr>
								<td> <label for="Price"><?php echo $id; ?></label></td>
								<td> <label for="Price"><?php echo $date; ?></label></td>
								<td> <label for="Price"><?php echo $name;  ?></label></td>
								<td> <label for="Price"><?php echo $quantity;  ?></label></td>
								<td> <label for="Price"><?php echo $uprice;  ?></label></td>
								<td> <label for="Price"><?php echo $tprice;  ?></label></td>

							</tr>
							<?php  }
              }
              else{
              	$q="select * from import ORDER BY id DESC ";
						$exe=mysqli_query($conn,$q);
						$id=0;
						while($row=mysqli_fetch_array($exe))
						{
							$id++;
							$date=$row['date'];
							$name=$row['name'];
							$quantity=$row['quantity'];
							$uprice=$row['price'];
							$tprice=$quantity*$uprice;
							$sum +=$tprice;
							?>
							<tr>
								<td> <label for="Price"><?php echo $id; ?></label></td>
								<td> <label for="Price"><?php echo $date; ?></label></td>
								<td> <label for="Price"><?php echo $name;  ?></label></td>
								<td> <label for="Price"><?php echo $quantity;  ?></label></td>
								<td> <label for="Price"><?php echo $uprice;  ?></label></td>
								<td> <label for="Price"><?php echo $tprice;  ?></label></td>

							</tr>
							<?php  }
              }
						  ?>
						</tbody>
						<tfoot>
							<tr align="center">
								<th colspan="6" ><label style="font-size:20px;color:red; ">মোট:<?php echo $sum ; ?> টাকা</label></th>
							</tr>
						</tfoot>
					</table>

					<script>
						$('#tabledit').dataTable();
					</script>
				</div>
				
			</div>
	</div>
	<?php include 'footer.php' ?>
	</body>
	</html>

<?php
}
?>
