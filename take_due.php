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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>বাকি আদায়</title>
	<?php include 'header2.php' ?>
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
				<button type="submit" id="payment" class="btn btn-primary">পয়েন্টের টাকা পাঠানোর লিস্ট</button>
				<button type="submit" id="duee" class="btn btn-danger">পয়েন্টের বাকির লিস্ট</button>
				<div class="c1">
					<h1     background-color: red;>বাকির লিস্ট</h1>
					<table  class="table table-striped table-bordered table-hover mydata" >
						<thead>
							<tr>
								<th>পয়েন্ট</th>
								<th>বাকি আছে</th>
								<th>পরিশোধ করেছে</th>
							</tr>
						</thead>
						<tbody>
							<?php 

									$qr = "SELECT  * FROM point_account ";
									$e = mysqli_query($conn,$qr);
									while($row = mysqli_fetch_array($e)){
									$point = $row['point'];
									$due = $row['due'];
									$paid = $row['paid'];
									?> <tr><td><?php echo $point ?></td>
									<td><?php echo round($due,2) ?></td>
									<td><?php echo round($paid,2) ?></td></tr><?php
								}
								?>
						</tbody>
					</table>
				</div>
				<div class="c2">
					<h1 style="color: #204d74;">পয়েন্টের টাকা পাঠানোর লিস্ট</h1>
					<table  class="table table-striped table-bordered table-hover mydata" >
						<thead>
							<tr>
								<th>পয়েন্ট</th>
								<th>পরিশোধ</th>
								<th>পরিশোধ মাধ্যম</th>
								<th>ব্যাংক</th>
								<th>বিকাশ</th>
								<th>বাকি</th>
								<th>তারিখ</th>
							</tr>
						</thead>
						<tbody>
							<?php 

									$qr = "SELECT  * FROM take_due ";
									$e = mysqli_query($conn,$qr);
									while($row = mysqli_fetch_array($e))
									{
									$point = $row['point'];
									$paid = $row['paid'];
									$payment_type = $row['payment_type'];
									$bank_name = $row['bank_name'];
									$bkash_num = $row['bkash_num'];
									$due = $row['due'];
									$date = $row['date'];
									?> 
									<tr>
										<td><?php echo $point ?></td>
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
			<div class="col-md-4">
				<p style="color:red;text-align:center;font-size:18px;text-decoration:underline; ">
					    বাকি আদায়
					</p>
					<form style="background-color: #6389c4;margin-left: 0%;padding: 15px;" method="post" autocomplete="off" >
						<div class="">
							<label >পয়েন্ট সিলেক্ট</label>
							<select name="point" id="point" class="form-control">
								<option style="background-color: #6669c4;">সিলেক্ট</option>
								<?php 
									include 'db_connect.php' ;
									$qr = "SELECT DISTINCT point FROM point_account where due>0 ";
									$e = mysqli_query($conn,$qr);
									while($row = mysqli_fetch_array($e)){
									$point = $row[0];
									?> <option value="<?php echo $point ?>"><?php echo $point ?></option><?php
								}
								?>
							</select>
							
						</div>
						<div class="">
							<label >মোট বাকি আছে</label>
							<input  id="total" type="text" class="form-control" name="total" placeholder="Total..."  readonly>

						</div>
						<div class="">
							<label >কিভাবে পাঠানো হচ্ছে</label>
							<select id="payment_type" name="payment_type" class="form-control" required>
								<option value="CASH">ক্যাশ</option>
								<option value="BANK">ব্যাংক</option>
								<option value="Bkash">বিকাশ</option>
							</select>
						</div>
						<div  id="show1" class="" >
							<label class="col-form-label ">কোন ব্যাংক</label>
							<select class="form-control" id="bank" name="bank">
								<option value="BRAC">ব্র্যাক</option>
								<option value="DBBL">ডাচ বাংলা</option>
								<option value="CITY">সিটি</option>
							</select>
						</div>
						<div class=" show2" id="show2">
							<label class="col-form-label">বিকাশ নাম্বার</label>
							<input type="number" class="form-control" id="bkash" name="bkash" placeholder="">
						</div>
						<div class="">
							<label class="col-form-label">কত টাকা পাঠানো হবে</label>
							<input type="text" class="form-control" id="paid" name="paid" placeholder="" required>
						</div>
						<div class="">
							<label class="col-form-label">বাকি থাকলো</label>
							<input type="text" class="form-control" id="due" name="due" placeholder=""  required readonly>
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

						$point = $_POST['point'];
						$total = $_POST['total'];
						$paid = $_POST['paid'];
						$payment_type = $_POST['payment_type'];
						$bank_name = $_POST['bank'];
						$bkash_num = $_POST['bkash'];
						$due = $_POST['due'];
						$date = $_POST['date'];

						$duee = "SELECT * FROM point_account where point = '$point' ";

						$d =mysqli_query($conn,$duee) ;
						if(mysqli_num_rows($d) > 0){
							$due_old= 0;
							while($row = mysqli_fetch_array($d)){
								$due_old = $row['due'];
							}
							$query = "UPDATE point_account set due = '$due_old'-'$paid',paid = paid+'$paid' WHERE point = '$point' ";

							$q =mysqli_query($conn,$query) ;
							if($q>0)
							{
								$query = "INSERT INTO take_due(point,paid,payment_type,bank_name,bkash_num,due,date)VALUES('$point','$paid','$payment_type','$bank_name','$bkash_num','$due','$date')";

								$q =mysqli_query($conn,$query);

							}

						}

					}
					?>
			</div>
		</div>
	</div>
<?php include 'footer.php' ?>
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

			$('#duee').click(function(){
				
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
				$('#due').val(due);
			});
			$("#paid").keyup(function() {
				var paid = $("#paid").val();
				var total = $("#total").val();
				var due = total-paid;
				$('#due').val(due);
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
