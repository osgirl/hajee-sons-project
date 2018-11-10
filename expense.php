<?php 
include 'db_connect.php';
$point ='';
session_start();
$user=$_SESSION['user'];
$date1='';$date2='';

if ($_SESSION['type'] != 'ADMIN') 
{
	header('location:login.php');
} 
else{
	?>
	<!DOCTYPE HTML>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>EXPENSE</title>
		<link rel="stylesheet" type="text/css" href="form/form_style.css">
		<style>
		@media print
		{    
			.no-print, .no-print *
			{
				display: none !important;
			}
		}
	</style>
</head>

<body >
	<div class="no-print">
		<?php include 'header.php' ?>
	</div>
	


	<div class="container">
		<div class="row">
			<div class="col-md-6 no-print">
				<!-- serach -->
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<form style="background-color: #7b7bb0;margin-left:0%;padding:15px;color:#fff;" method="post" class="navbar-form navbar-default" align="center" >
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="date" class="form-control" name="date1" value="<?php echo date('Y-m-d'); ?>">                                        
							</div>
							<p>TO</p>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="date" style="position:unset;" class="form-control" name="date2" value="<?php echo date('Y-m-d'); ?>">
							</div>

							<button type="submit" name="search" class="btn btn-success bt">Search</button>
						</form>
					</div>
				</div>
				
				<!-- new -->
				<form method="post" class="no-print">
					<h1 style="text-align:center; ">NEW  EXPENSE</h1>

					<div class="contentform">
						<div class="leftcontact">
							<div class="form-group">
								<p>USER<span>*</span></p>
								<span class="icon-case"><i class="fa fa-male"></i></span>
								<input type="text"   id="nom" value="<?php echo $user ?>" />

							</div> 
							<div class="form-group">
								<p>SELECT<span>*</span></p>
								<select type="input" name="exp" class="form-control" >
									<option value="" >SELECT</option>
									<?php 
									include 'db_connect.php' ;
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
								<span class="icon-case"><i class="fa fa-money"></i></span>
								<input type="number" name="amount" id="amount" required/>

							</div>
							<div class="form-group">
								<p>Date<span>*</span></p>
								<span class="icon-case"><i class="fa fa-calendar"></i></span>
								<input type="date" name="date" id="date" value="<?php echo date('Y-m-d')?>" required/>

							</div>
						</div>
					</div>
					<button type="submit" name="submit" class="bouton-contact">অ্যাড</button>	
				</form>
				<?php 
				include 'db_connect.php' ;
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
			<!-- record -->
			<div class="col-md-6">
				<!-- printer -->
				<div class="" align="center">
					<img src="image/printer.png" id="printer" 	 alt="Print" style="width:100px">
				</div>
				
				<div class="row head"   align="center">
					<img src="image/logo.png" style="width:126px;float:left">
					<h2>Hajee & Son's</h2>
					<h4>Expense Details</h4>
					
				</div>
				<h2 align="center" class="no-print">EXPENSE HISTORY</h2>
				<table class="table  table-bordered table-hover">

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
						include 'db_connect.php' ;
						if (isset($_POST['search'])) {
							$date1 =$_POST['date1'];
							$date2 =$_POST['date2'];
							$queryt = "SELECT * FROM expense WHERE date BETWEEN '$date1' AND '$date2' ";
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
							}
							else{
								$queryt = "SELECT * FROM expense";
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
								}

								?>
							</tbody>
						</table>


					</div>
				</div>
				<?php include 'footer.php' ?>
				<script>
					$(document).ready(function(){

						$('.head').hide();
						$('#printer').click(function(){
							$('.head').show();
							window.print();
						});
					});
				</script>
			</body>
			</html>
			<?php
		}
		?>
