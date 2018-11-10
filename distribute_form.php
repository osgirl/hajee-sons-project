<form method="post" autocomplete="off" style="margin-left:0%">
		<h1 style="text-align:center; ">পয়েন্টে পণ্য পাঠানো</h1>

		<div class="contentform">
			<div class="leftcontact">
				<div style="margin:1px -2px 37px 0px;">
					<p>পয়েন্ট সিলেক্ট<span>*</span></p>
					<select class=" form-control selectpicker" data-live-search="true" name="point" id="" required>
						<option value="">SELECT</option>
						<?php 
						include 'db_connect.php' ;
						$select = "SELECT  name FROM point_list" ;
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
				
				<div style="margin:0px 0px 37px 0px;">
					<p>প্রোডাক্ট<span>*</span></p>
					
					
					<input type="text" name="id" id="id" required  />

					<select class=" form-control selectpicker" data-live-search="true" name="product" id="product">
						<option value="">SELECT</option>
						<?php 
						include 'db_connect.php' ;
						$select = "SELECT  name FROM inventory" ;
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

				<div class="form-group">
					<p>স্টকে আছে<span>*</span></p>
					<span class="icon-case"><i class="fa fa-cubes"></i></span>
					<input  id="stock" type="text"  name="stock" placeholder="stock..."  readonly>
				</div>

			</div>

			<div class="rightcontact">	

				<div class="form-group">
					<p>পরিমান<span>*</span></p>
					<span class="icon-case"><i class="fa fa-database"></i></span>
					<input type="text" name="quantity" id="quantity" required />
				</div>
				<div class="form-group" id="up">
					<p>প্রতি হাজারের বিক্রয় মূল্য<span>*</span></p>	
					<span class="icon-case"><i class="fa fa-money"></i></span>
					<input type="text" name="uprice" id="uprice"  readonly>
				</div>

				<div class="form-group">
					<p>তারিখ<span>*</span></p>	
					<span class="icon-case"><i class="fa fa-calendar"></i></span>
					<input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" />

				</div>


			</div>
		</div>
		<button type="submit" name="sub" class="bouton-contact">লিস্টে অ্যাড</button>	
	</form>	


	<?php 
	include 'db_connect.php';
	if(isset($_POST['sub']))
	{

		$id = $_POST['id'];
		$point = $_POST['point'];
		$product = $_POST['product'];
		$quantity = $_POST['quantity'];
		$uprice = $_POST['uprice'];
		$tprice = $uprice*$quantity;
		$date = $_POST['date'];

		$query0 ="SELECT * from inventory where name='$product'";
		$q0 = mysqli_query($conn,$query0);
		$oq='';
		while($row = mysqli_fetch_array($q0))
		{
			
			$oq=$row['quantity'];
		}
		
		
		if($quantity>$oq){
			echo"<script>alert('!!!!STOCK LOW !!!!')</script>";
		}
		else{

			$query = "INSERT INTO list_check (id,point,product,quantity,price,tprice)VALUES('$id','$point','$product','$quantity','$uprice','$tprice')";
			$q =mysqli_query($conn,$query) ;

			$nq=$oq-$quantity;
			$query4="UPDATE inventory SET quantity='$nq' WHERE name = '$product' ";
			$b=mysqli_query($conn,$query4);

			
			$query = "INSERT INTO distribute (p_id,point,product,quantity,price,total,date)VALUES('$id','$point','$product','$quantity','$uprice','$tprice','$date')";
			$q =mysqli_query($conn,$query) ;


			
			$query22 = "select * from point_inventory where point = '$point' and product = '$product'";
			$q22 =mysqli_query($conn,$query22) ;
			$oq2='';
			while($row1 = mysqli_fetch_array($q22))

			{
				$oq2=$row1['quantity'];
			}
			if(mysqli_num_rows($q22)>0){
				$nq2=$oq2+$quantity;
				$query44="UPDATE point_inventory SET quantity='$nq2',price='$uprice' WHERE point = '$point' AND product = '$product' ";
				$b2=mysqli_query($conn,$query44);
			}
			else{
				$query4 = "INSERT INTO point_inventory (point,p_id,product,quantity,price)VALUES('$point','$id','$product','$quantity','$uprice')";
				$q3 =mysqli_query($conn,$query4) ;
			}
			
		}
		
	}
	?>	
	
	<script>

		$(document).ready(function(){
			$('#id').hide();
			var a  = $('point').text();
			var b  = $('').text();
			// product.....
			$('#product').change(function(){

				var p = $(this).val();
				if (p != '') {
					$.ajax({
						url:"search.php",
						method:"POST",
						data:{ppp:p},
						success: function(value){
							var data = value.split(",");
							$('#uprice').val(data[0]);
							$('#id').val(data[1]);
							$('#stock').val(data[2]+" হাজার");


						}
					});
				}


			});
			$('#quantity').keyup(function(){
				var qa = $('#quantity').val();
				var up = $('#uprice').val();
				var tp = qa*up;
				$('#tprice').val(tp);


			});
			




		});
	</script>

</body>
</html>
