 
	<form method="post" autocomplete="off">
		<h1 style="text-align:center; ">নতুন পণ্য সংযোজন</h1>
		<div class="contentform">

		 	<div class="leftcontact">
				<div class="form-group">
					<p>সাপ্লাইয়ার <span>*</span></p>
					<span class="icon-case"><i class="fa fa-user"></i></span>
					<input type="text" name="" id=""value="British American Tobacco" />
				</div>
				<div style="margin:0px 0px 37px 0px;">
					<p>প্রোডাক্ট সিলেক্ট<span>*</span></p>
					
					
						<input type="text" name="id" id="id" required  />

						<select class=" form-control selectpicker" data-live-search="true" name="product" id="product">
							<option value="">SELECT</option>
							<?php 

						$select = "SELECT  name FROM product_list" ;
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
						<p>পরিমান(হাজার)<span>*</span></p>
						<span class="icon-case"><i class="fa fa-cubes"></i></span>
						<input type="text" name="quantity" id="quantity" />
					</div>
				</div>

				<div class="rightcontact">	
					<div class="form-group">
						<p>হাজারের মূল্য<span>*</span></p>	
						<span class="icon-case"><i class="fa fa-money"></i></span>
						<input type="text" name="uprice" id="uprice" >
					</div>	

					<div class="form-group">
						<p>মোট মূল্য<span>*</span></p>	
						<span class="icon-case"><i class="fa fa-money"></i></span>
						<input type="text" name="tprice" id="tprice" readonly/>
					</div>
					<div class="form-group">
						<p>তারিখ<span>*</span></p>	
						<span class="icon-case"><i class="fa fa-calendar"></i></span>
						<input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" >
					</div>
				</div>
			</div>
			<button type="submit" name="sub" class="bouton-contact">লিস্টে অ্যাড</button>	
		</form>
		<?php 
		if(isset($_POST['sub']))
		{

			$id = $_POST['id'];
			$product = $_POST['product'];
			$upri = $_POST['uprice'];
			$tpri = $_POST['tprice'];
			$quan = $_POST['quantity'];
			$tprice = round($tpri,2);
			$quantity = round($quan,2);
			$uprice = round($upri,2);
			$date = $_POST['date'];

			include 'db_connect.php';
			$queryl = "select * from list_check where id = '$id' ";
			$ql =mysqli_query($conn,$queryl) ;
			if(mysqli_num_rows($ql)>0)
			{
				$query = "UPDATE list_check set quantity = quantity +'$quantity' where id = '$id'";
				$q =mysqli_query($conn,$query) ;
			}else{
				$query = "INSERT INTO list_check (id,product,quantity,price,tprice)VALUES('$id','$product','$quantity','$uprice','$tprice')";
				$q =mysqli_query($conn,$query);
			}

			$query1 = "INSERT INTO import (p_id,name,quantity,price,date)VALUES('$id','$product','$quantity','$uprice','$date')";
			$q1 =mysqli_query($conn,$query1) ;

			$query2 = "select * from inventory where name = '$product' ";
			$q2 =mysqli_query($conn,$query2) ;
			$oq=0;
			$id2='';
			while($row=mysqli_fetch_array($q2))
			{

				$oq=$row['quantity'];
				$id2=$row['id'];


			}
			$nq=$oq+$quantity;
			if(mysqli_num_rows($q2)>0)
			{


				$query3="UPDATE inventory SET quantity='$nq',price='$uprice' WHERE id='$id2' ";
				$b=mysqli_query($conn,$query3);

			}
			else
			{
				$query4="INSERT inventory(id,name,quantity,price)VALUES('$id','$product','$quantity','$uprice')";
				$b=mysqli_query($conn,$query4);

			}
		}
		?>	

		<script>
			$(document).ready(function(){
				$('#id').hide();
				

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
				$('#quantity').change(function(){
					var qa = $('#quantity').val();
					var up = $('#uprice').val();
					var tp = qa*up;
					$('#tprice').val(tp);


				});



			});
		</script>
