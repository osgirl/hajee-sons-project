
<?php 
include '../db_connect.php';

$user=$_SESSION['user'];
$am=0;$date1 ='';$date2 ='';

if (!isset($_SESSION['username'])) {
  header('location:../login.php');
} 
else{
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../form/form_style.css">
  </head>
  <body>

    <!--==================main menu section========================-->
    <section class="main_menu">
      <style>
      .main_menu{
        max-width: 100%;
        height: auto;
        border-collapse: collapse;
      }
      ul{
        list-style: none;
        margin-top: 20px;
      }
      .menu li{
        display: inline-block;
      }
      .dropbtn {
        background-color: #34ab4c;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: 2px solid palegoldenrod;
        border-radius: 8%;
        cursor: pointer;
      }
      /*form{ margin-left: 0%;}*/
      .dropdown {
        position: relative;
        display: inline-block;
      }

      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #3e6a8f;
        min-width: 300px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }

      .dropdown-content a {
        color: white;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        font-size: 16px;

      }

      .dropdown-content a:hover {background-color: black}

      .dropdown:hover .dropdown-content {
        display: block;
      }

      .dropdown:hover .dropbtn {
        background-color: #3e6a8f;
      } 
    </style>

    <div class="container">
      <div class="row">
        <div class="col-md-2">
          <img src="../image/logo.PNG" style="max-width: 275px;height: 156px;">
        </div>
        <div class="col-md-9" style="margin-top:25px;margin-left: -12px;">
         <ul class="menu">
          <li>
            <div class="dropdown">
              <a href="point_sale.php"><button class="dropbtn sa">Daily Sale</button></a>
            </div>
          </li>
          <li><div class="dropdown">
            <button class="dropbtn">History</button>
            <div class="dropdown-content">
              <a href="point_sale_history.php">Selling History</a>
              <a href="point_import_history.php">Import History</a>
              <a href="point_payment_history.php">Payment History</a>
            </div>
          </div>
        </li>
        <li>
          <div class="dropdown">
            <a href="point_stock.php"><button class="dropbtn st">Stock</button></a>
          </div>
        </li>
        <li>
          <div class="dropdown">
            <a href="point_account.php"><button class="dropbtn st">Account</button></a>
          </div>
        </li>
        <li>
          <div class="dropdown">
            <a href="point_due_pay.php"><button class="dropbtn st">Send Money</button></a>
          </div>
        </li>

        <li><div class="dropdown">
          <button class="dropbtn">Manager</button>
          <div class="dropdown-content">
            <a href="point_expense.php">EXPENSE </a>
            <a href="pass_change.php" id="pass">Password Change </a>
            <a href="../logout.php">Logout</a>
          </div>
        </div>
      </li>

    </ul> 
  </div>

  <div class="col-md-1">
    <img src="../image/manager.png" style="max-width: 120px;height: 120px;margin-left: -25px;">
  </div>             
</div>
</div>
</section>





<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script>

</script>
</body>
</html>
<?php

}

?>


