
<?php 
include '../db_connect.php';
session_start();
$user=$_SESSION['user'];
$am=0;

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

   <!--==================main menu section========================-->
   <section class="main_menu">
     <!--================<saling history>================-->
      <section class="sale_history">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div align="center"><h2>Sales Records</h2></div>
              <table style="border:3px solid #ccc;background-color:#e6fbe7" id="tabledit" class="table table-bordered table-hover ">
                <thead style="background-color: aquamarine;">
                  <tr>
                    <th>P.ID</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $q="select * from point_sale where point='$user' ";
                  $exe=mysqli_query($conn,$q);
                  
                  while($row=mysqli_fetch_array($exe))
                  {
                    

                    $p_id=$row['p_id'];
                    $product=$row['product'];
                    $quantity=$row['quantity'];
                    $price=$row['price'];
                    $date=$row['date'];
                    $am +=$price;
                    ?>
                    <tr>
                      <td> <label for="Price"><?php echo $p_id; ?></label></td>
                      <td> <label for="Price"><?php echo $product;  ?></label></td>
                      <td> <label for="Price"><?php echo $quantity;  ?></label></td>
                      <td> <label for="Price"><?php echo $price;  ?></label></td>
                      <td> <label for="Price"><?php echo $date;  ?></label></td>
                    </tr>
                    <?php  }  ?> 
                  </tbody>
                  <tfoot>
                 <tr>
                  <td colspan="6" style="text-align:center;font-size: 25px;  ">এই পর্যন্ত : <span style="color:red"><?php echo $am ?> টাকার মাল </span> বিক্রয় হয়েছে</td>
                </tr>
              </tfoot>
                </table>

              </div>
            </div>
          </div>
        </section>
        <!--================</saling history>================-->
      </section>

      
      <script>
        $('#tabledit').dataTable();
        $('#tabledit2').dataTable();


      </script>
    </body>
    </html>

    <?php

  }

  ?>

