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



   <!--================<stock>================-->
    <section class="stock">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div align="center"><h2 style=""> IMPORT HISTORY</h2></div>
            <table style="border:3px solid #ccc;background-color:#e6fbe7" id="tabledit2" class="table table-bordered table-hover ">
                <thead style="background-color: aquamarine;">
                <tr>
                  <th>Date</th>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Uprice</th>
                  <th>Tprice</th>
                </tr>
              </thead>
              <tbody>
                <?php

                include'../db_connect.php';
                $q="select * from distribute where point='$user' ";
                $exe=mysqli_query($conn,$q);

                while($row=mysqli_fetch_array($exe))
                {


                  $date=$row['date'];
                  $product=$row['product'];
                  $quantity=$row['quantity'];
                  $price=$row['price'];
                  $total = $row['total'];
                  $am = ($am+$total); 
                  ?>
                  <tr>
                    <td> <label for="Price"><?php echo $date;  ?></label></td>
                    <td> <label for="Price"><?php echo $product;  ?></label></td>
                    <td> <label for="Price"><?php echo $quantity;  ?></label></td>
                    <td> <label for="Price"><?php echo $price;  ?></label></td>
                    <td> <label for="Price"><?php echo $total ;  ?></label></td>
                  </tr>
                  <?php  }  ?>
                </tbody>
                <tfoot>
                 <tr>
                  <td colspan="6" style="text-align:center;font-size: 25px;  ">এই পর্যন্ত মোট: <span style="color:red"><?php echo $am ?> টাকার মাল </span> আনা হয়েছে</td>
                </tr>
              </tfoot>
            </table>

          </div>
        </div>
      </div>
    </section>
    <!--================</stock>================-->
    <script>
      $('#tabledit').dataTable();
      $('#tabledit2').dataTable();


    </script>
  </body>
  </html>
  <?php

}

?>

