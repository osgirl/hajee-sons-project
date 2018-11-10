<form method="POST" class="form-inline no-print" style="padding: 10px 9px 8px 10px;width:fit-content;margin-top:30px;">
	<div class="form-group">
		<label class="sr-only" for="exampleInputEmail3">Email address</label>
		<select name="month" id="" class="form-control">
			<option value="JANUARY">JANUARY</option>
			<option value="FEBRUARY">FEBRUARY</option>
			<option value="MARCH">MARCH</option>
			<option value="APRIL">APRIL</option>
			<option value="MAY">MAY</option>
			<option value="JUNE">JUNE</option>
			<option value="JULY">JULY</option>
			<option value="AUGUST">AUGUST</option>
			<option value="SEPTEMBER">SEPTEMBER</option>
			<option value="OCTOBER">OCTOBER</option>
			<option value="NOVEMBER">NOVEMBER</option>
			<option value="DECEMBER">DECEMBER</option>
		</select>
	</div>
	<div class="form-group">
		<label class="sr-only" for="exampleInputPassword3">Password</label>
		<select name="year" id="" class="form-control">
			<option value="2017">2017</option>
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>
		</select>
	</div>
	<button type="submit" name="ss" id="btn" class="btn btn-danger">Salary Sheet</button>
</form>
<?php
if (isset($_POST['ss'])) {
	$month =$_POST['month'] ;
	$year =$_POST['year'] ;
	$query = "SELECT * FROM employee";
	$exe =mysqli_query($conn,$query);
	
	?>
	<div class="container salary_sheet">
		<div class="row">
			<div class="col-md-12">
				<div class="" align="center">
					<h2>SALARY SHEET FOR <?php echo $month." ".$year; ?></h2>
				</div>
				<table class="table table-striped table-bordered " id="ta" style="">
					<thead>
						<tr>
							<th>SL</th><th>ID</th><th>NAME</th><th>BASIC</th><th>TA/DA</th><th>INC.</th><th>ADV</th><th>TOTAL</th><th>SIGNETURE</th><th>DATE</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$id =0;
						while ($row = mysqli_fetch_array($exe)) {
							$id++ ;
							?>

							<tr>
								<td><?php echo $id; ?></td>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['salary']; ?></td>
								<td><?php echo "      "; ?></td>
								<td><?php echo "      "; ?></td>
								<td><?php echo "      "; ?></td>
								<td><?php echo "      "; ?></td>
								<td><?php echo "      "; ?></td>
								<td><?php echo "      "; ?></td>
								</tr><?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<script src="js/jquery.table2excel.js" type="text/javascript"></script>
		<script>
			$('#btn').click(function(){

				$('#ta').table2excel({
					exclude:"#ex",
					name:"status",
					filename:"salary_sheet"

				});
			});
			$(document).ready(function(){
				$('.salary_sheet').show();
				window.print();
				$('.salary_sheet').hide();
			});
		</script>
		<?php

	}



	?>