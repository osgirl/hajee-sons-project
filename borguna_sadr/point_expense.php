<?php 
include '../db_connect.php';
$point ='';
session_start();
$user=$_SESSION['user'];


if (!isset($_SESSION['username'])) 
{
	header('location:../login.php');
} 
else{
	?>
	<!DOCTYPE HTML>
	<html>
	<head>
	</head>

	<body >


		<?php include 'point_menu.php' ?>
		
		<p></p>

		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form method="post">
						<h1 style="text-align:center; ">NEW  EXPENSE</h1>

						<div class="contentform">
							<div class="leftcontact">
								<div class="form-group">
									<p>USER<span>*</span></p>
									<span class="icon-case"><i class="fa fa-male"></i></span>
									<input type="text"   id="nom" value="<?php echo $user ?>" required/>

								</div> 
								<div class="form-group">
									<p>SELECT<span>*</span></p>
									<select type="input" name="exp" class="form-control" >
										<option value="" >SELECT</option>
										<?php 
										include '../db_connect.php' ;
										$select = "SELECT name FROM expense_list" ;
										$ex = mysqli_query($conn,$select);
										while($row = mysqli_fetch_array($ex))
										{
											$name = $row['name'];

											?>
											<option value="<?php echo $name ; ?>"><?php echo $name ; ?></option>
											<?php
										}
										?>
									</select>

								</div> 
							</div>

							<div class="rightcontact">	
								<div class="form-group">
									<p>AMMOUNT<span>*</span></p>
									<span class="icon-case"><i class="fa fa-user"></i></span>
									<input type="number" name="amount" id="amount" required />

								</div>
								<div class="form-group">
									<p>Date<span>*</span></p>
									<span class="icon-case"><i class="fa fa-user"></i></span>
									<input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required/>

								</div>
							</div>
						</div>
						<button type="submit" name="submit" class="bouton-contact">অ্যাড</button>	
					</form>
					<?php 
					include '../db_connect.php' ;
					if(isset($_POST['submit']))
					{
						$type = $_POST['exp'];
						$amount = $_POST['amount'];
						$date = $_POST['date'];

						$query3="insert into expense(user,type,amount,date)values('$user','$type','$amount','$date')";
						$b=mysqli_query($conn,$query3);

						if($b>0)
						{
							echo"<script>alert('সংযোজন সফল হয়েছে')</script>";
						}
						else{
							echo"<script>alert('হয়নি !!! আবার চেষ্টা করুন ')</script>";
						}
					}

					?>		
				</div>
				<div class="col-md-6">
					<h2 align="center">EXPENSE HISTORY</h2>
					<table class="table table-striped table-bordered table-hover mydata">

						<thead>
							<tr>
								<th>SL</th>
								<th>USER</th>
								<th>Type</th>
								<th>amount</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							include '../db_connect.php' ;
							$queryt = "SELECT * FROM expense where user = '$user' ";
							$t = mysqli_query($conn,$queryt);
							$id = 0 ;
							while($row = mysqli_fetch_array($t)){
								$id++ ;
								?><tr>
									<td><?php echo $row['id'] ; ?></td>
									<td><?php echo $row['user'] ; ?></td>
									<td><?php echo $row['type'] ; ?></td>
									<td><?php echo $row['amount'] ; ?></td>
									<td><?php echo $row['date'] ; ?></td>
									</tr><?php 
								}
								?>
							</tbody>
						</table>

					</div>
					
				</div>
			</div>

			<script>
				$(document).ready(function(){
					$('.mydata').dataTable();
				});
			</script>
		</body>
		</html>
		<?php
	}
	?>
