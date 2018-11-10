 
 <?php 
include 'db_connect.php';
if (isset($_POST["emp_n"])) 
{
 	$output ='';
 	$output1 ='';
 	
 	$query = "SELECT  salary,id FROM employee where name like '%".$_POST["emp_n"]."%' ";
 	$result =mysqli_query($conn,$query);
 	if (mysqli_num_rows($result) > 0 ) 
 	{
 		while($row = mysqli_fetch_array($result))
 		{
 			$output =$row[0];
 			$output1 =$row[1];
 			
 			
 			

 		}
 		
 	} 
 	 
 	

 	echo $output.",".$output1;
     exit(); 
 }

 ?>
<!-- ######################### -->
<?php
include 'db_connect.php';
$query1=$_POST['query1'];

if($query1 !="")
{

$q="select name from product_list where code like '".$query1."'";
$result=mysqli_query($conn,$q);

if(mysqli_num_rows($result))
{
	
$output ='';
while($row=mysqli_fetch_array($result))
{


$output =$row[0];

}


echo $output;
}
}
else
{
	
}

?>