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

	<body onload="viewData()" >
		<?php include 'header.php' ?>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form method="post" autocomplete="off">
						<h1 style="text-align:center; ">নতুন পণ্য সংযোজন</h1>
						<div class="contentform">
							<div class="leftcontact">
								<div class="form-group">
									<p>পণ্যের নাম<span>*</span></p>
									<span class="icon-case"><i class="fa fa-male"></i></span>
									<input type="text"  name="pname" id="nom" required="true" />

								</div>
								<div class="form-group">
									<p>তারিখ<span>*</span></p>
									<span class="icon-case"><i class="fa fa-calender"></i></span>
									<input type="date"  name="date" id="date" value="<?php echo date('Y-m-d'); ?>" />

								</div> 
							</div>

							<div class="rightcontact">	
								<div class="form-group">
									<p>ক্রয় মূল্য<span>*</span></p>
									<span class="icon-case"><i class="fa fa-money"></i></span>
									<input type="number" name="price" id="prenom"  required="true" />

								</div>
								<div class="form-group">
									<p>বিক্রয় মূল্য<span>*</span></p>
									<span class="icon-case"><i class="fa fa-money"></i></span>
									<input type="number" name="sprice" id="" required="true" />

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
						$price = $_POST['price'];
						$sprice = $_POST['sprice'];

						$query3="insert into product_list(name,price,sprice)values('$name','$price','$sprice')";
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
					<table id="tabledit" class="table table-bordered table-hover">
						<thead>
							<tr><th colspan="4">লিস্ট</th></tr>
							<tr>
								<th>সিরিয়াল</th>
								<th>পণ্য</th>
								<th>ক্রয় মূল্য</th>
								<th>বিক্রয় মূল্য</th>
								<th>Action</th>
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
					url: 'include/tableedit.php?p=view',
					method: 'GET'
				}).done(function(data){
					$('tbody').html(data)
					tableData()
				})
			}
			function tableData(){
				$('#tabledit').Tabledit({
					url: 'include/tableedit.php',
					eventType: 'dblclick',
					editButton: true,
					deleteButton: true,
					hideIdentifier: false,
					buttons: {
						edit: {
							class: 'btn btn-sm btn-warning',
							html: '<span class="glyphicon glyphicon-pencil"></span> Edit',
							action: 'edit'
						},
						delete: {
							class: 'btn btn-sm btn-danger',
							html: '<span class="glyphicon glyphicon-trash"></span> Trash',
							action: 'delete'
						},
						save: {
							class: 'btn btn-sm btn-success',
							html: 'Save'
						},
						restore: {
							class: 'btn btn-sm btn-warning',
							html: 'Restore',
							action: 'restore'
						},
						confirm: {
							class: 'btn btn-sm btn-default',
							html: 'Confirm'
						}
					},
					columns: {
						identifier: [0, 'id'],
						editable: [[1, 'name'],[2, 'price'],[3, 'sprice']]
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
