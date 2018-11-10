<?php
session_start();
include '../db_connect.php';
$id=$_GET['del'];
$user=$_SESSION['user'];
if(!$_SESSION['user'])
{
	header('location:../logout.php');
	
}
?>
<?php



$qq = '';

$query4="select quantity from list_check_point where id ='$id' ";
$b2=mysqli_query($conn,$query4);
while($row = mysqli_fetch_array($b2))
{
	$qq = $row[0];
}

$today = date('Y-m-d');
$query33="DELETE FROM point_sale   where p_id='$id' and quantity ='$qq' and point ='$user' and date = '$today' ";
$b3=mysqli_query($conn,$query33);
if ($b3>0) {
	$query3="UPDATE point_inventory set quantity = quantity+'$qq' where p_id='$id' and point ='$user' ";
	$b=mysqli_query($conn,$query3);
		if($b>0){
		$qq = "DELETE  FROM list_check_point WHERE id='$id' and point = '$user' " ;
		$b22=mysqli_query($conn,$qq);
		if($b22>0)
		{
		 header('location:../borguna_sadr/point_sale.php');
		}
	}

}

?>