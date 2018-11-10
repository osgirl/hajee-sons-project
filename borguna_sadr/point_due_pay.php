
<?php 
include '../db_connect.php';
session_start();
$user=$_SESSION['user'];
$am=0;$date1 ='';$date2 ='';

if (!isset($_SESSION['username'])) {
	header('location:../login.php');
} 
else{
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>ACCOUNT</title>
		
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php include 'point_menu.php' ?>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-7">
					<div class="c1">
						<h1>DUE HISTORY</h1>
						<table  class="table table-striped table-bordered table-hover mydata" style="border:3px solid #ccc;background-color:#e6cce7;font-size:20px">
							<thead>
								<tr>
									<th>POINT</th>
									<th>DUE</th>
									<th>PAID</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$qr = "SELECT  * FROM point_account where point = '$user'";
								$e = mysqli_query($conn,$qr);
								while($row = mysqli_fetch_array($e)){
									$point = $row['point'];
									$due = $row['due'];
									$paid = $row['paid'];
									?> <tr><td><?php echo $point ?></td>
										<td><?php echo $due ?></td>
										<td><?php echo $paid ?></td></tr><?php
									}
									?>
								</tbody>
							</table>
						</div>
						<div class="c2"></div>
					</div>
					<div class="col-md-4 col-md-offset-1">
						<p style="color:red;text-align:center;font-size:18px;text-decoration:underline; ">
							Take Due
						</p>
						<form style="background-color: #6389c4;margin-left: 0%;padding: 15px;color:black;" method="post">
							<div class="">
								<label >SELECT POINT</label>
								<input type="text" id="point" name="point" value="<?php echo $user ?>" class="form-control">
								
							</div>
							<div class="">
								<label >Total Amount</label>
								<input  id="total" type="text" class="form-control" name="total" placeholder="Total..." readonly="true" >

							</div>
							<div class="">
								<label >Payment Method</label>
								<select id="payment_type" name="payment_type" class="form-control" required>
									<option value="CASH">CASH</option>
									<option value="BANK">BANK</option>
									<option value="Bkash">Bkash</option>
								</select>
							</div>
							<div  id="show1" class="" >
								<label class="col-form-label ">Bank Name</label>
								<select class="form-control" id="bank" name="bank">
									<option value="BRAC">BRAC</option>
									<option value="DBBL">DBBL</option>
									<option value="CITY">CITY</option>
								</select>
							</div>
							<div class=" show2" id="show2">
								<label class="col-form-label">Bkash Number</label>
								<input type="number" class="form-control" id="bkash" name="bkash" placeholder="">
							</div>
							<div class="">
								<label class="col-form-label">Paid Amount</label>
								<input type="text" class="form-control" id="paid" name="paid" placeholder="" required>
							</div>
							<div class="">
								<label class="col-form-label">Due Amount</label>
								<input type="text" class="form-control" id="due" name="due" placeholder=""  required>
							</div>
							<div class="">
								<label class="col-form-label">Date</label>
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
			
			<script>
				$(document).ready(function(){
					
					$("#show1").hide();
					$("#show2").hide();
					var p = $('#point').val();
						if (p != '') {
							$.ajax({
								url:"../search.php",
								method:"POST",
								data:{due:p},
								success:function(data){
									$('#total').val(data);
								}
							});
						}
						else{}


					
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

					
				});
			</script>
		</body>
		</html>
		<?php

	}

	?>
