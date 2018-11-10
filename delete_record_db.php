<script src="js/jquery-3.2.1.min.js"></script>
<?php
session_start();
include 'db_connect.php';
if(!$_SESSION['user'])
{
	header('location:logout.php');

}
else {
	if(isset($_GET['all'])){
		$query1="DELETE FROM distribute";
		$exe1=mysqli_query($conn,$query1);
		$query2="DELETE FROM employee";
		$exe2=mysqli_query($conn,$query2);
		$query3="DELETE FROM expense";
		$exe3=mysqli_query($conn,$query3);
		// $query4="DELETE FROM expense_list";
		// $exe4=mysqli_query($conn,$query4);
		$query5="DELETE FROM import";
		$exe5=mysqli_query($conn,$query5);
		$query6="DELETE FROM import_account";
		$exe6=mysqli_query($conn,$query6);
		$query7="DELETE FROM inventory";
		$exe7=mysqli_query($conn,$query7);
		$query8="DELETE FROM list_check";
		$exe8=mysqli_query($conn,$query8);
		$query9="DELETE FROM list_check_point";
		$exe9=mysqli_query($conn,$query9);
		$query10="DELETE FROM point_account";
		$exe10=mysqli_query($conn,$query10);
		$query11="DELETE FROM point_inventory";
		$exe11=mysqli_query($conn,$query11);
		$query12="DELETE FROM point_sale";
		$exe12=mysqli_query($conn,$query12);
		$query13="DELETE FROM point_sale_account";
		$exe13=mysqli_query($conn,$query13);
		$query14="DELETE FROM salary_paid";
		$exe14=mysqli_query($conn,$query14);
		$query15="DELETE FROM send_money";
		$exe15=mysqli_query($conn,$query15);
		$query16="DELETE FROM take_due";
		$exe16=mysqli_query($conn,$query16);
		if($exe16>0)
		{
			echo '<script> alert("ALL DELETE SUCCESSFUL"); </script>' ;
		}else{echo '<script> alert("ALL DELETE FAILED !!!!!!"); </script>' ;}
		header('location:delete_record.php');


	}else if(isset($_GET['takedue'])){
		$query="DELETE FROM take_due";
		$exe =mysqli_query($conn,$query);
		if($exe>0)
		{
			echo '<script> alert(" take_due DELETE SUCCESSFUL"); </script>' ;
		}else{echo '<script> alert("take_due DELETE FAILED !!!!!!"); </script>' ;}
		header('location:delete_record.php');
		
	}else if(isset($_GET['duepay'])){
		$query="DELETE FROM send_money";
		$exe =mysqli_query($conn,$query);
		if($exe>0)
		{
			echo '<script>alert("send_money DELETE SUCCESSFUL")</script>' ;
		}else{echo '<script>alert("send_money DELETE FAILED !!!!!!")</script>' ;}
		header('location:delete_record.php');
		
	}else if(isset($_GET['pstock'])){
		$query="DELETE FROM point_inventory ";
		$exe =mysqli_query($conn,$query);
		if($exe>0)
		{
			echo '<script>alert("point_inventory DELETE SUCCESSFUL")</script>' ;
		}else{echo '<script>alert("point_inventory DELETE FAILED !!!!!!")</script>' ;}
		header('location:delete_record.php');
		
	}else if(isset($_GET['stock'])){
		$query="DELETE FROM inventory";
		$exe =mysqli_query($conn,$query);
		if($exe>0)
		{
			echo '<script>alert("inventory DELETE SUCCESSFUL")</script>' ;
		}else{echo '<script>alert("inventory DELETE FAILED !!!!!!")</script>' ;}
		header('location:delete_record.php');
		
	}else if(isset($_GET['dist'])){
		$query="DELETE FROM distribute";
		$exe =mysqli_query($conn,$query);
		if($exe>0)
		{
			echo '<script>alert("distribute DELETE SUCCESSFUL")</script>' ;
		}else{echo '<script>alert("distribute DELETE FAILED !!!!!!")</script>' ;}
		header('location:delete_record.php');

	}else if(isset($_GET['imp'])){
		$query="DELETE FROM import";
		$exe =mysqli_query($conn,$query);
		if($exe>0)
		{
			echo '<script>alert("import DELETE SUCCESSFUL")</script>' ;
			header('location:delete_record.php');
		}else{echo '<script>alert("import DELETE FAILED !!!!!!")</script>' ;
		header('location:delete_record.php');}

	}
	
}



?>