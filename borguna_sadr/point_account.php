
<?php 
include '../db_connect.php';
session_start();
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
    
    <style>
    #list3 ul { list-style-image: url("../image/ls.png"); color:#000; font-size:22px;background:seashell; }
    #list3 ul li { line-height:30px; }
    #list3 ul li a{ text-decoration:none }
    #list3 ul li a:hover{ font-size:24px;background:#fff;color:red }

    #h{
        font-size: 26px;
        line-height: 30px;
        font-family: Helvetica, sans-serif;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
      }

      #con {
        background-color:#7fe0df;
        width: 322px;
        margin: 0px auto;
        border: 3px dashed #21303b;

        /*shadow*/
        -webkit-box-shadow: 10px 10px 10px #000;
        -moz-box-shadow: 10px 10px 10px #000;
        box-shadow: 10px 10px 10px #000;

        /*rounded corners*/
        -webkit-border-radius: 20px;
        -moz-border-radius: 20px;
        border-radius: 20px;
      }
    </style>
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
   <section class="P_account">
    <div class="container">
      <div class="row">
        <div class="col-md-3 left">
          <div class="row">
            <div class="col-md-12 search" align="center">

              <form style="background-color: #7b7bb0;margin-left:0%;padding:15px;color:#fff;" method="post" align="center" class="navbar-form navbar-left" >
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input type="date" class="form-control" name="date1" value="<?php echo date('Y-m-d'); ?>">                                        
                </div>
                TO
                <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input type="date" style="position: unset;" class="form-control" name="date2" value="<?php echo date('Y-m-d'); ?>">
                </div>

                <button type="submit" name="search" class="btn btn-success">Search</button>
              </form>
            </div>
          </div>
          <div id="list3">
            <ul>
              <li><a href="#" id="daily">দৈনিক</a></li>
              <li><a href="#" id="import">পণ্য আনা</a></li>
              <li><a href="#" id="sale">পণ্য বিক্রয়</a></li>
              <li><a href="#" id="expense">এক্সপেন্স</a></li>
              <li><a href="#" id="total">টোটাল অ্যাকাউন্ট</a></li>
            </ul>
          </div>

        </div>
        <div class="col-md-9 right">
          
          <div class="row">
            
              <div id="daily_sec">
                <?php include 'point_daily_account.php' ?>
              </div>
              <div id="import_sec">
                <?php include 'point_import_account.php' ?>
              </div>
              <div id="sale_sec">
                <?php include 'point_sale_account.php' ?>
              </div>

              <div id="expense_sec">
                <?php include 'point_expense_account.php' ?>
              </div>
              <div id="total_sec">
                <?php include 'point_total_account.php' ?>
              </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <script>
    $('#tabledit').dataTable();
    $('#tabledit1').dataTable();
    $('#tabledit2').dataTable();
    $('#tabledit3').dataTable();
    $(document).ready(function(){
      $('#daily_sec').show();
      $('#total_sec').hide();
      $('#import_sec').hide();
      $('#sale_sec').hide();
      $('#expense_sec').hide();
    });
    $('#total').click(function(){
      $('#total_sec').fadeIn();
      $('#daily_sec').hide();
      $('#import_sec').hide();
      $('#sale_sec').hide();
      $('#expense_sec').hide();
    });
    $('#daily').click(function(){
      $('#total_sec').hide();
      $('#daily_sec').fadeIn();
      $('#import_sec').hide();
      $('#sale_sec').hide();
      $('#expense_sec').hide();
    });
    $('#expense').click(function(){
      $('#total_sec').hide();
      $('#daily_sec').hide();
      $('#import_sec').hide();
      $('#sale_sec').hide();
      $('#expense_sec').fadeIn();
    });
    $('#sale').click(function(){
      $('#total_sec').hide();
      $('#daily_sec').hide();
      $('#import_sec').hide();
      $('#sale_sec').fadeIn();
      $('#expense_sec').hide();
    });
    $('#import').click(function(){
      $('#total_sec').hide();
      $('#daily_sec').hide();
      $('#import_sec').fadeIn();
      $('#sale_sec').hide();
      $('#expense_sec').hide();
    });
  </script>
</body>
</body>
</html>

<?php

}

?>

