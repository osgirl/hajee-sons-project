<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<?php 
	session_start();
	include'header2.php' ?>
	<link rel="stylesheet" href="css/ace.min.css" />
	<link rel="stylesheet" href="css/ace-rtl.min.css" />


</head>

<body class="login-layout" style="background-image:url('image/login.png');background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center; ">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container" method="post">
						<div class="center">
							<h1 style="font-weight: 600;text-shadow: 2px 2px 9px black;">
								<i class="fa fa-leaf green" aria-hidden="true"></i>
								<span class="red">Hajee</span>
								<span class="blue">&</span>
								<span class="white" id="id-text2">Sons</span>
							</h1>
							<h4 class="blue" id="id-company-text" style="    font-weight: bolder;text-shadow: 5px 5px 5px #f39c18;">&copy; AND IT</h4>
						</div>

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<i class="fa fa-coffee green"></i>
											User/Admin
										</h4>

										<div class="space-6"></div>

										<form method="post">
											<fieldset>
												<div class="form-group">
													<label for="block clearfix">Select Name First:</label>
													<select class="form-control" name="user">
														<?php
														include('db_connect.php');

														$q="select user from login";
														$a=mysqli_query($conn,$q);
														while($row=mysqli_fetch_array($a))
														{
															$name=$row['user'];
															?>
															<option value="<?php echo $name;?>"><?php  echo $name;?></option>
															<?php  }  ?>
													</select>

													</div>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="username" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="password" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>

														<button type="submit" name="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>

													</div>

													<div class="space-4">
														
													</div>
												</fieldset>
											</form>



											<div class="space-6"></div>


										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											
											<div>
												<a class="ace-icon "></a>
											</div>

										</div>


									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->



							</div><!-- /.position-relative -->


						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->







		<?php
		include 'db_connect.php';

	// session_start();

		if(isset($_POST['submit']))
		{



			$type = '';$u = '';$p = '';$n = '';
			$user= $_POST['user'];
			$username= $_POST['username'];
			$password= $_POST['password'];
			$q="select * from login where user='$user' and username='$username' and pass='$password'";
			$exe=mysqli_query($conn,$q);
			while($row=mysqli_fetch_array($exe))
			{
				$id =$row[0];
				$u =$row[1];
				$p =$row[2];
				$n=$row[3];
				$type=$row[4];

			}
			if($username == $u && $password == $p && $user == $n)
			{
				
				$_SESSION['username'] =$u;
				$_SESSION['user'] =$n;
				$_SESSION['password'] =$p;
				$_SESSION['type'] =$type;

				if($_SESSION['type'] =='ADMIN'){
					?>
					<script>window.location.href='index.php'</script>  
					<?php
				}
				else {
					?>
					<script>window.location.href='borguna_sadr/index.php'</script>  
					<?php

				}
			}
			else
			{

				echo"<script>alert('Login Failed')</script>";
			}

		}

		?>
	</body>
	</html>
