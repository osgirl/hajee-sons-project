<?php
session_start();
include 'db_connect.php';
$id=$_GET['delem'];
$user=$_SESSION['user'];
if(!$_SESSION['user'])
{
    header('location:logout.php');
    
}

	$qq = "DELETE FROM salary_paid WHERE id='$id' " ;
	$b22=mysqli_query($conn,$qq);
	if($b22>0)
	{

		header('location:give_salary.php');
	}
	

?>