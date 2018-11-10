<?php 
include 'db_connect.php';
$point ='';
session_start();
$user=$_SESSION['user'];

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
		<title>আমদানি</title>		
</head>
<body>
	<!-- header area -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php include 'header.php' ?>
				</div>
				
			</div>
		</div>
	</section>
	<section>
		<div class="">
			<div class="row">
				<div class="col-md-4 col-md-offset-1">
					<style>form{margin-left: 0px}</style>
					<?php include 'form/import_form.php' ?>
				</div>
				<div class="col-md-4">
					<table id="tabledit" class="table table-bordered table-striped ">
						<caption style="text-align:center;">
							<a type="submit" href="" class="btn btn-warning">Refresh</a>
							<a type="submit" href="import_record.php" class="btn btn-info">Import History</a>
						</caption>
						<caption style="color:green;text-align:center;font-size:18px  ">
							যেসব প্রডাক্ট লিস্টে অ্যাড করা হয়েছে
						</caption>
						<thead>
							<tr>
								<th>আইডি</th>
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
									<td><?php echo $row['id'] ?></td>
									<td><?php echo $row['product'] ?></td>
									<td><?php echo $row['quantity'] ?></td>
									<td><?php echo $row['price'] ?></td>
									<td><?php echo $row['tprice'] ?></td>
									<td><a href="import_added_list_dilete.php?del_list=<?php echo $row['id']; ?>" class="btn btn-info" >Delete</a></td>
								</tr>
								<?php
							}
							?>
						</tbody><br>
					</table>
				</div>
				<div class="col-md-3 " style="margin-top:40px">
					<p style="color:red;text-align:center;font-size:18px;text-decoration:underline; ">
						শিপমেন্ট অ্যাকাউন্ট
					</p>
					<form style="background-color: #6389c4;margin-left: 0%;padding: 15px;color:black;" method="post">
						<div class="">
							<label >কি কি প্রোডাক্ট আসলো</label>
							<input  id="product" type="text" class="form-control" name="product" placeholder="product..."  

							<?php

							
							$qk="SELECT product FROM list_check ";
							$ak=mysqli_query($conn,$qk);
							$print = '';
							while($row=mysqli_fetch_array($ak))
							{
								$product=$row['product'];
								$print = $print.$product.',';
							}
							?> value="<?php  echo $print; ?>" <?php 
							?> >
						</div>
						<div class="">
							<label >মোট মূল্য</label>
							<input  id="total" type="text" class="form-control" name="total" placeholder="Total..."  

							<?php
							
							$q="SELECT sum(tprice) FROM list_check";
							$a=mysqli_query($conn,$q);
							while($row=mysqli_fetch_array($a))
							{
								$name=$row[0];
								?> value="<?php  echo round($name,2); ?>" <?php 

							} ?> >

						</div>
						<div class="">
							<label >পেমেন্ট পদ্ধতি</label>
							<select id="payment_type" name="payment_type" class="form-control" required>
								<option value="CASH">ক্যাশ</option>
								<option value="BANK">ব্যাংক</option>
								<option value="Bkash">বিকাশ</option>
							</select>
						</div>
						<div  id="show1" class="" >
							<label class="col-form-label ">ব্যাংকের</label>
							<select class="form-control" id="bank" name="bank">
								<option value="BRAC">ব্র্যাক ব্যাংক</option>
								<option value="DBBL">ডাচ বাংলা ব্যাংক</option>
								<option value="CITY">সিটি ব্যাংক</option>
							</select>
						</div>
						<div class="show2" id="show2">
							<label class="col-form-label">বিকাশ নাম্বার</label>
							<input type="number" class="form-control" id="bkash" name="bkash" placeholder="">
						</div>
						<div class="">
							<label class="col-form-label">পাঠানো টাকার পরিমান </label>
							<input type="text" class="form-control" id="paid" name="paid" placeholder="" required>
						</div>
						<div class="">
							<label class="col-form-label">বাকি থাকলো</label>
							<input type="text" class="form-control" id="due" name="due" placeholder=""  required>
						</div>
						<div class="">
							<label class="col-form-label">তারিখ</label>
							<input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" id="date" >
						</div>

						<button type="submit" name="conf" class="btn btn-success">Confirm !</button>
						
					</form>
					<?php 
					if(isset($_POST['conf']))
					{

						$product = $_POST['product'];
						$total = $_POST['total'];
						$paid = $_POST['paid'];
						$payment_type = $_POST['payment_type'];
						$bank_name = $_POST['bank'];
						$bkash_num = $_POST['bkash'];
						$due = $_POST['due'];
						$date = $_POST['date'];
						
						
						$query = "INSERT INTO import_account(product,total,paid,payment_type,bank_name,bkash_num,due,date)VALUES('$product','$total','$paid','$payment_type','$bank_name','$bkash_num','$due','$date')";

						$q =mysqli_query($conn,$query);
						if($q>0)
						{
							$query2 = "DELETE FROM LIST_CHECK";
							$q2 =mysqli_query($conn,$query2) ;
							// if($q2>0)
							// {
							// 	header('location:import.php');
							// }

						}
					}
					?>
				</div>
			</div>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
				</div>
				
			</div>
		</div>
	</section>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div id="inv">
					
				</div>
			</div>
		</div>
	</div>
<?php include 'footer.php' ?>

	<script  type="text/javascript">

		$(document).ready(function(){
			$("#show1").hide();
			$("#show2").hide();
			$("#inv").hide();

			
			$("#payment_type").change(function() {
				var a=$("#payment_type").val();
				if(a=="BANK")

				{
					$("#show1").show();
					$("#show2").hide();
				}
				else if(a=="Bkash"){
					$("#show2").show();
					$("#show1" ).hide();
				}
				else{
					$("#show2").hide();
					$("#show1").hide();
					
				}});

			$("#paid").change(function() {
				var paid = $("#paid").val();
				var total = $("#total").val();
				var due = total-paid;
				$('#due').val(due);
			});
			$("#paid").keyup(function() {
				var paid = $("#paid").val();
				var total = $("#total").val();
				var due = total-paid;
				var d = due.toFixed(2);
				$('#due').val(d);
			});
		});

		function print_invoice(){
			var paid = $('#paid').val();
			var due = $('#due').val();
			$(document).getElementsById('#inv').innerHTML = "sdadddddddddddddddddddddddddddddddddddddd";
			$("#inv").show();
			$("#inv").print();

		};
		

	</script>
</body>
</html>
<?php
}
?>
