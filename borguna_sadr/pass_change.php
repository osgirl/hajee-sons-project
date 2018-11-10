
<?php 
include '../db_connect.php';
session_start();
$user=$_SESSION['user'];
$amount = 0;
if (!isset($_SESSION['username'])) {
  header('location:../login.php');
} 
else{
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    
  </head>
  <body>
    <!-- ==============header menu area ====================-->
    <section class="header_area">
      <div class="container">
        <div class="row">
          <marquee id=""><?php echo $_SESSION['user']; ?></marquee>
        </div>
      </div>
    </section>
    <!--==================main menu section========================-->
    <section class="main_menu">
     <?php include 'point_menu.php' ?>
   </section>

    <div class="container" style="" id="show">
  <div class="row">
    <div class="col-xs-12">
        <h3 class="text-center">Reset Password</h3>
        <hr/>
        <form method="post" style="margin-left:37%;padding:21px;width:287px;background-color:#6a85be;">
            <div class="form-group">
                <label>Point</label>
                <input type="text" class="form-control" value="<?php echo $user ?>" readonly/>
            </div>
             <div class="form-group">
                <label>Old Password :</label>
                <input type="password" class="form-control" name="old" autofocus="true" />
            </div>
             <div class="form-group">
                <label>New Password :</label>
                <input type="password" class="form-control" name="new" />
            </div>
            <div class="form-group">
                <label>Retype Password :</label>
                <input type="password" class="form-control" name="new1" />
            </div>
            <button class="btn btn-success btn-sm center-block">
                Change
            </button>
        </form>
    </div>
  </div>
</div>

</body>
</html>

<?php

}

?>

