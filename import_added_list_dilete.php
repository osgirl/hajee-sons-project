<?php
session_start();
include 'db_connect.php';
$id=$_GET['del_list'];
$user=$_SESSION['user'];
if(!$_SESSION['user'])
{
    header('location:logout.php');
    
}
	//list_check theke sob select ei maal er jonno
	$query1 ="SELECT * from list_check where id='$id'";
	$q1 =mysqli_query($conn,$query1);
	$nq='';$pp='';
		while($row1 = mysqli_fetch_array($q1))
		{
			$nq=$row1['quantity'];
			$pp=$row1['point'];
		}
	$today = date('Y-m-d');
	//distribute record theke delete
	$query2 = "DELETE FROM import WHERE p_id='$id' and date = '$today' ";
	$q2 =mysqli_query($conn,$query2);

	if ($q2>0) {
		//inventory te update
		$query3="UPDATE inventory SET quantity=quantity-'$nq' WHERE id='$id' ";
		$b3=mysqli_query($conn,$query3);

		

		if ($b3>0 ) {
			//list_check theke delete
			$q5 = "DELETE FROM list_check WHERE id='$id' " ;
			$b5=mysqli_query($conn,$q5);
			if($b5>0)
				{
					header('location:import.php');
				}
		}	
		
	}
	
	

	
	

?>