<?php 
include 'db_connect.php';
$point ='';
session_start();
$user=$_SESSION['username'];
$userr=$_SESSION['user'];

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
		<title >Hajee&Son's</title>
		<?php include 'header2.php' ?>
		<style>
		#h{
			font-size: 20px;
			
			font-family: Helvetica, sans-serif;
			font-weight: bold;
			text-align: center;
			text-transform: uppercase;
		}
		
		#con {
			background-color: #d9edf7;
			width: 221px;
			margin: 15px auto;
			border: 3px dashed #21303b;
			-webkit-box-shadow: 10px 10px 10px #000;
			-moz-box-shadow: 10px 10px 10px #000;
			box-shadow: 10px 10px 10px #7b7bb0;
			-webkit-border-radius: 20px;
			-moz-border-radius: 20px;
			border-radius: 20px;
		}
		@media print
		{    
			.no-print, .no-print *
			{
				display: none !important;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row no-print">
			<div class="col-md-12">
				<?php include 'header.php' ?>
			</div>
		</div>

		<div class="row ">
			<div class="col-md-3 no-print">
				<div class="row">
					<!-- search -->
					<div class="col-md-12">
						<form style="background-color: #7b7bb0;margin-left:0%;padding:15px;color:#fff;" method="post" class="navbar-form navbar-default" align="center" >
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="date" class="form-control" name="date1" value="<?php echo date('Y-m-d'); ?>">                                        
							</div>
							TO
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
								<input type="date" style="position: unset;" class="form-control" name="date2" value="<?php echo date('Y-m-d'); ?>">
							</div>

							<button type="submit" name="search" class="btn btn-success">Search</button>
						</form>
					</div>
					<!-- list -->
					<div class="col-md-12">
						<div class="list-group" style="font-weight:normal;font-size:15px">
							<a href="#" id="daily" class="list-group-item list-group-item-success"><i class="fa fa-calendar"></i> দৈনিক লেনদেন</a>
							<a href="#" id="import" class="list-group-item list-group-item-info"><i class="fa fa-plane"></i> খুলনা থেকে প্রোডাক্ট আসার হিসাব</a>
							<a href="#" id="product" class="list-group-item list-group-item-warning"><i class="fa fa-cubes"></i> প্রোডাক্ট অনুযায়ী হিসাব</a>
							<a href="#" id="distribute" class="list-group-item list-group-item-danger"><i class="fa fa-line-chart"></i> পয়েন্টে ডিস্ট্রিবিউট হিসাব</a>
							<a href="#" id="point" class="list-group-item list-group-item-sky"><i class="fa fa-user"></i> সব পয়েন্টের হিসাব</a>
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-md-8 ">
				<div class="row">
					<div class="prs" style="display:none">
						Invoice:<?php echo date('dmY'), date("his")?>
					</div>
					
				</div>
				<style>
					thead{color: black;
    font-size: medium;}
				</style>
				<!-- daily account -->
				<div class="row">
					<div id="daily_div" class="">
						<?php include 'daily_account.php' ?>
					</div>

				</div>
				<!-- all point a/c -->
				<div class="row">
					<div id="point_div" class="">
						<?php include 'all_point_account.php' ?>
					</div>

				</div>
				<!-- distribute a/c -->
				<div class="row">
					<div id="distribute_div" class="">
						<?php include 'distribute_account.php' ?>
					</div>

				</div>
				<!-- import a/c -->
				<div class="row">
					<div id="import_div" class="">
						<?php include 'import_account.php' ?>
					</div>

				</div>
				<!-- product a/c -->
				<div class="row">
					<div id="product_div" class="">
						<?php include 'product_account.php' ?>
					</div>

				</div>
			</div>

		</div>
		
	</div>
<?php include 'footer.php' ?>
	<script>
		$(document).ready(function(){
			document.getElementById('date').innerHTML = Date();
			$('#point_div').hide();
			$('#distribute_div').hide();
			$('#import_div').hide();
			$('#product_div').hide();

			$('#product_w_tbl').show();
			$('#point_w_tbl').hide();
			$('#date_w_tbl').hide();
			$('#date_import_tbl').hide();

			$( "table" ).addClass( "table-hover" );
		});
		$('#point').click(function(){
			$('#point_div').fadeIn();
			$('#daily_div').hide();
			$('#distribute_div').hide();
			$('#import_div').hide();
			$('#product_div').hide();
		});
		$('#daily').click(function(){
			$('#daily_div').fadeIn();
			$('#point_div').hide();
			$('#distribute_div').hide();
			$('#import_div').hide();
			$('#product_div').hide();
		});
		$('#distribute').click(function(){
			$('#distribute_div').fadeIn();
			$('#daily_div').hide();
			$('#point_div').hide();
			$('#import_div').hide();
			$('#product_div').hide();
		});
		$('#import').click(function(){
			$('#import_div').fadeIn();
			$('#distribute_div').hide();
			$('#daily_div').hide();
			$('#point_div').hide();
			$('#product_div').hide();
		});
		$('#product').click(function(){
					$('#product_div').fadeIn();
					$('#import_div').hide();
					$('#distribute_div').hide();
					$('#daily_div').hide();
					$('#point_div').hide();
				});

		$('#product_wise').click(function(){
			$('#product_w_tbl').fadeIn();
			$('#point_w_tbl').hide();
			$('#date_w_tbl').hide();
		});
		$('#point_wise').click(function(){
			$('#point_w_tbl').fadeIn();
			$('#product_w_tbl').hide();
			$('#date_w_tbl').hide();
		});
		$('#date_wise').click(function(){
			$('#date_w_tbl').fadeIn();
			$('#product_w_tbl').hide();
			$('#point_w_tbl').hide();
		});
		$('#date_wise_import').click(function(){
			$('#product_import_tbl').hide();
			$('#date_import_tbl').fadeIn();
		});
		$('#product_wise_import').click(function(){
			$('#product_import_tbl').fadeIn();
			$('#date_import_tbl').hide();
		});
	</script>
</body>
</html>
<?php
}
?>
