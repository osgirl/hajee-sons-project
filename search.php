<?php 
include 'db_connect.php';
if (isset($_POST["due"])) 
{
 	$output = '';
 	$query = "SELECT sum(due) FROM point_account where point like '%".$_POST["due"]."%' ";
 	$result =mysqli_query($conn,$query);
 	if (mysqli_num_rows($result) > 0 ) 
 	{
 		while($row = mysqli_fetch_array($result))
 		{
 			$output = $row[0];
 		}
 		
 	} 
 	

 	echo $output;
 }

 ?> 




 <?php 
include 'db_connect.php';
if (isset($_POST["q"])) 
{
 	$output = '';
 	$query = "SELECT * FROM inventory where name like '%".$_POST["q"]."%' ";
 	$result =mysqli_query($conn,$query);
 	$output = '<ul class="list-unstyled">';
 	if (mysqli_num_rows($result) > 0 ) 
 	{
 		while($row = mysqli_fetch_array($result))
 		{
 			$output .= '<li class="pon">'.$row["name"].'</li>';
 		}
 		
 	} 
 	else 
 	{
 		$output .= '<li>Point Not found </li>';
 		
 	}

 	$output .='</ul>';
 	echo $output;
 }

 ?>


 <?php 
include 'db_connect.php';
if (isset($_POST["qq"])) 
{
 	$output = '';
 	$query = "SELECT DISTINCT product FROM point_inventory where product like '%".$_POST["qq"]."%' ";
 	$result =mysqli_query($conn,$query);
 	$output = '<ul class="list-unstyled">';
 	if (mysqli_num_rows($result) > 0 ) 
 	{
 		while($row = mysqli_fetch_array($result))
 		{
 			$output .= '<li class="pon2">'.$row["product"].'</li>';
 		}
 		
 	} 
 	else 
 	{
 		$output .= '<li>Not found </li>';
 		
 	}

 	$output .='</ul>';
 	echo $output;
}
  ?>




 

 <?php 
include 'db_connect.php';
if (isset($_POST["ppp"])) 
{
 	$product =$_POST["ppp"];
 	$output ='';$output2 ='';
 	$output3 ='';
 	$query = "SELECT  sprice,id FROM product_list where name = '$product' ";
 	$result =mysqli_query($conn,$query);
 	if (mysqli_num_rows($result) > 0 ) 
 	{
 		while($row = mysqli_fetch_array($result))
 		{
 			$output =$row[0];
 			$output3 =$row[1];
 		}
 	}

 	$query2 = "SELECT  quantity FROM inventory where name = '$product' ";
 	$result2 =mysqli_query($conn,$query2);
 	if (mysqli_num_rows($result2) > 0 ) 
 	{
 		while($row2 = mysqli_fetch_array($result2))
 		{
 			$output2 =$row2[0];
 			
 		}
 	}
 	else{ $output2 ="স্টকে নাই"; } 
 	
 	echo $output.",".$output3.",".$output2;
     exit(); 
 }

 ?>



<?php 
include 'db_connect.php';
if (isset($_POST["p"])) 
{
 	$output ='';
 	$output2 ='';
 	$output3 ='';
 	$query = "SELECT  price,id,quantity FROM inventory where name like '%".$_POST["p"]."%' ";
 	$result =mysqli_query($conn,$query);
 	if (mysqli_num_rows($result) > 0 ) 
 	{
 		while($row = mysqli_fetch_array($result))
 		{
 			$output =$row[0];
 			$output3 =$row[1];
 			$output2 =$row[2];
 			

 		}
 		
 	} 
 	 
 	

 	echo $output.",".$output2.",".$output3;
     exit(); 
 }

 ?>

 
<?php 
include 'db_connect.php';
if (isset($_POST["queryp"]) && isset($_POST["point"])) 
{
 	$point =$_POST["point"];$product =$_POST["queryp"];
 	$output1 ='';$output2 ='';$output3 ='';

 	$query = "SELECT  * FROM point_inventory where product like '".$_POST["queryp"]."%' and point = '$point' ";
 	$result =mysqli_query($conn,$query);
 	if (mysqli_num_rows($result) > 0 ) 
 	{
 		while($row = mysqli_fetch_array($result))
 		{
 			$output1 =$row['price'];
 			$output2 =$row['quantity'];
 			$output3 =$row['p_id'];

 			
 		}
 		
 	} 


 	echo $output1.",".$output2.",".$output3;
     exit(); 
 }

 ?> 


