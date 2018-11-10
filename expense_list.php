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

	<!DOCTYPE HTML>
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>EXPENSE</title>
		<?php include 'header.php' ?>
	</head>

	<body onload="viewData()" >
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form method="post">
						<h1 style="text-align:center; ">নতুন খরচ খাত সংযোজন</h1>

						<div class="contentform">


							<div class="leftcontact">
								<div class="form-group">
									<p>TYPE<span>*</span></p>
									<span class="icon-case"><i class="fa fa-cube"></i></span>
									<input type="text"  name="pname" id="nom" autofocus required />

								</div> 
							</div>

							<div class="rightcontact">	
								<div class="form-group">
									<p>Date<span>*</span></p>
									<span class="icon-case"><i class="fa fa-calendar"></i></span>
									<input type="date" name="date" id="prenom" value="<?php echo date('Y-m-d'); ?>" />

								</div>
							</div>
						</div>
						<button type="submit" name="submit" class="bouton-contact">অ্যাড</button>	
					</form>
					<?php 
					include 'db_connect.php' ;
					if(isset($_POST['submit']))
					{
						$name = $_POST['pname'];
						$date = $_POST['date'];

						$query3="insert into expense_list(name,date)values('$name','$date')";
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
					<h2 align="center">লিস্ট</h2>
					<table id="tabledit" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>সিরিয়াল</th>
								<th>TYPE</th>
								<th>ADDED DATE</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>

				</div>
			</div>
		</div>
		<?php include 'footer.php' ?>
		<script>

			document.ready(function(){
				$('.mydata').dataTable();

			})
			function viewData(){
				$.ajax({
					url: 'include/tableedit7.php?p=view',
					method: 'GET'
				}).done(function(data){
					$('tbody').html(data)
					tableData()
				})
			}
			function tableData(){
				$('#tabledit').Tabledit({
					url: 'include/tableedit7.php',
					eventType: 'dblclick',
					editButton: false,
					deleteButton: true,
					hideIdentifier: false,
					buttons: {

						delete: {
							class: 'btn btn-sm btn-danger',
							html: '<span class="glyphicon glyphicon-trash"></span> Delete',
							action: 'delete'
						},
						confirm: {
							class: 'btn btn-sm btn-default',
							html: 'Confirm'
						}
					},
					columns: {
						identifier: [0, 'id'],
						editable: [[1, 'name'],[2, 'price']]
					},
					onSuccess: function(data, textStatus, jqXHR) {
						viewData()
					},
					onFail: function(jqXHR, textStatus, errorThrown) {
						console.log('onFail(jqXHR, textStatus, errorThrown)');
						console.log(jqXHR);
						console.log(textStatus);
						console.log(errorThrown);
					},
					onAjax: function(action, serialize) {
						console.log('onAjax(action, serialize)');
						console.log(action);
						console.log(serialize);
					}
				});
			}

		</script>
	</body>
	</html>


	<?php
}
?>
