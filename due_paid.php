<?php 
include 'db_connect.php';
$point ='';
session_start();
$user=$_SESSION['username'];

$due = 0;
if ($_SESSION['type'] != 'ADMIN') 
{
  header('location:login.php');
} 
else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>বাকি পরিশোধ</title>

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
			<div class="col-md-7">
				<button type="submit" id="payment" class="btn btn-primary">পেমেন্ট লিস্ট</button>
				<button type="submit" id="due" class="btn btn-danger">বাকি</button>
				<div class="c1">
					<h1>খুলনা সাথে লেনদেন</h1>
					<table  class="table table-striped table-bordered table-hover mydata" style="font-size:18px">
						<thead>
							<tr>
								<th>মোট মাল আনা হয়েছে</th>
								<th>পরিশোধ করা হয়েছে</th>
								<th>বাকি আছে</th>
							</tr>
						</thead>
						<tbody>
							<?php 
									$qr = "SELECT  sum(total),sum(paid) FROM import_account ";
									$e = mysqli_query($conn,$qr);
									while($row = mysqli_fetch_array($e)){
									$total = $row[0];
									$paid = $row[1];
									$due = $total-$paid;
									?> <tr><td><?php echo round($total,2) ?> টাকা</td>
									<td style="color:green"><?php echo round($paid,2) ?> টাকা</td>
									<td style="color:red"><?php echo round($due,2) ?> টাকা</td></tr><?php
								}
								?>
						</tbody>
					</table>
				</div>
				<div class="c2">
					<h1 style="color: #204d74;">পেমেন্ট লিস্ট</h1>
					<table  class="table table-striped table-bordered table-hover mydata" style="font-size:18px">
						<thead>
							<tr>
								<th>প্রেরক</th>
								<th>পরিশোধ</th>
								<th>মাধ্যম</th>
								<th>ব্যাংকের নাম</th>
								<th>বিকাশ নাম্বার</th>
								<th>বাকি আছে</th>
								<th>পেমেন্ট তারিখ</th>
							</tr>
						</thead>
						<tbody>
							<?php 

									$qr = "SELECT  * FROM send_money ";
									$e = mysqli_query($conn,$qr);
									while($row = mysqli_fetch_array($e))
									{
									$user = $row['user'];
									$paid = $row['paid'];
									$payment_type = $row['payment_type'];
									$bank_name = $row['bank_name'];
									$bkash_num = $row['bkash_num'];
									$due = $row['due'];
									$date = $row['date'];
									?> 
									<tr>
										<td><?php echo $user ?></td>
										<td><?php echo round($paid,2) ?></td>
										<td><?php echo $payment_type ?></td>
										<td><?php echo $bank_name ?></td>
										<td><?php echo $bkash_num ?></td>
										<td><?php echo round($due,2) ?></td>
										<td><?php echo $date ?></td>
									</tr>
									<?php
								}
								?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-5">
				<p style="color:red;text-align:center;font-size:18px;text-decoration:underline; ">
					    খুলনায় টাকা পাঠানো
					</p>
					<form style="background-color: #6389c4;margin-left: 0%;padding: 15px;color:black;font-size:18px" method="post" autocomplete="off">
						<div class="">
							<label >প্রেরক</label>
							<input type="text" class="form-control" name="prerok" value="<?php echo $user ?>" readonly>
							
						</div>
						<div class="">
							<label >মোট বাকি আছে</label>
							<input  id="total" type="text" class="form-control" name="total" placeholder="Total..."  value="<?php echo round($due,2) ?>" readonly>

						</div>
						<div class="">
							<label >পাঠানোর মাধ্যম</label>
							<select id="payment_type" name="payment_type" class="form-control" required>
								<option value="CASH">ক্যাশে</option>
								<option value="BANK">ব্যাঙ্কে</option>
								<option value="Bkash">বিকাশে</option>
							</select>
						</div>
						<div  id="show1" class="" >
							<label class="col-form-label ">ব্যাংকের নাম</label>
							<select class="form-control" id="bank" name="bank">
								<option value="BRAC">ব্র্যাক ব্যাংক</option>
								<option value="DBBL">ডাচ বাংলা ব্যাংক</option>
								<option value="CITY">সিটি ব্যাংক</option>
							</select>
						</div>
						<div class=" show2" id="show2">
							<label class="col-form-label">বিকাশ নাম্বার</label>
							<input type="number" class="form-control" id="bkash" name="bkash" placeholder="+880">
						</div>
						<div class="">
							<label class="col-form-label">কত টাকা পাঠানো হচ্ছে</label>
							<input type="text" class="form-control" id="paid" name="paid" placeholder="" required>
						</div>
						<div class="">
							<label class="col-form-label">বাকি থাকছে</label>
							<input type="number" id="d" class="form-control"  name="due"   required readonly>
						</div>
						<div class="">
							<label class="col-form-label">পাঠানোর তারিখ</label>
							<input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" id="date" >
						</div>
						<div align="center">
							<button type="submit" name="submit"  class="btn btn-success">Confirm </button>
						</div>
					</form>
					<?php 
					if(isset($_POST['submit']))
					{

						$prerok = $_POST['prerok'];
						$total = $_POST['total'];
						$paid = $_POST['paid'];
						$payment_type = $_POST['payment_type'];
						$bank_name = $_POST['bank'];
						$bkash_num = $_POST['bkash'];
						$due = $_POST['due'];
						$date = $_POST['date'];

						$query = "INSERT INTO send_money(user,paid,payment_type,bank_name,bkash_num,due,date)VALUES('$prerok','$paid','$payment_type','$bank_name','$bkash_num','$due','$date')";

						$q =mysqli_query($conn,$query);

						$query1 = "INSERT INTO import_account(paid,date)VALUES('$paid','$date')";

						$q1 =mysqli_query($conn,$query1);


					}
					?>
			</div>
		</div>
	</div>
ক
	<script>
		$(document).ready(function(){
			$('.mydata').dataTable();
			$("#show1").hide();
			$("#show2").hide();
			$(".c2").hide();


			$('#payment').click(function(){
				$(".c1").fadeOut();
				$(".c2").fadeIn();
			});

			$('#due').click(function(){
				
				$(".c1").fadeIn();
				$(".c2").fadeOut();
			});

			
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
				$('#d').val(due);
			});
			$("#paid").keyup(function() {
				var paid = $("#paid").val();
				var total = $("#total").val();
				var due = total-paid;
				$('#d').val(due);
			});

			$('#point').change(function(){
				var p = $('#point').val();
				if (p != '') {
					$.ajax({
						url:"search.php",
						method:"POST",
						data:{due:p},
						success:function(data){
								$('#total').val(data);
								}
							});
				}
				else{}
			});

		});
	</script>
</body>
</html>
  <?php
}
?>
