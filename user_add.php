<!DOCTYPE HTML>
<html>
<head>
	<title>পয়েন্ট সংযোজন</title>
	<?php include 'header.php' ?>
</head>

<body onload="viewData()" >

	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<form method="post">
					<h1 style="text-align:center; ">নতুন USER সংযোজন</h1>

					<div class="contentform">
						<div class="leftcontact">
							<div class="form-group">
								<p>পয়েন্টের নাম<span>*</span></p>
								<span class="icon-case"><i class="fa fa-male"></i></span>
								<input type="text"  name="name" id="name"  required />
								<marquee behavior="" 	
scrolldelay="150">পয়েন্ট অ্যাড করার সময় পয়েন্টের যে নাম দেওয়া হয়েছে হুবহু সেই নাম হতে হবে</marquee>


							</div> 
						</div>

						<div class="rightcontact">	
							<div class="form-group">
								<p>ব্যাবহারকারি<span>*</span></p>
								<span class="icon-case"><i class="fa fa-male"></i></span>
								<input type="text"  name="uname" id="uname" required />

							</div> 
							<div class="form-group">
								<p>পাসওয়ার্ড<span>*</span></p>
								<span class="icon-case"><i class="fa fa-key"></i></span>
								<input type="text" name="pass" id="pass" required />

							</div>
						</div>
					</div>
					<button type="submit" name="submit" class="bouton-contact">অ্যাড</button>	
				</form>
				<?php 
				include 'db_connect.php' ;
				if(isset($_POST['submit']))
				{
					$name = $_POST['name'];
					$uname = $_POST['uname'];
					$pass = $_POST['pass'];

					$query3="insert into login(username,pass,user)values('$uname','$pass','$name')";
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
				<h4 align="center">লিস্ট</h4>
				<table id="tabledit" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>সিরিয়াল.</th>
							<th>পয়েন্টের নাম</th>
							<th>ব্যাবহারকারি</th>
							<th>পাসওয়ার্ড</th>
							<th>ধরন</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script>
		document.ready(function(){
			$('.mydata').dataTable();

		})
		function viewData(){
			$.ajax({
				url: 'include/tableedit3.php?p=view',
				method: 'GET'
			}).done(function(data){
				$('tbody').html(data)
				tableData()
			})
		}
		function tableData(){
			$('#tabledit').Tabledit({
				url: 'include/tableedit3.php',
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
					editable: [[1, 'user'],[2, 'username'],[3, 'pass'],[4, 'type', '{"1": "ADMIN", "2": "USER"}']]
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
