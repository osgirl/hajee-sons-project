
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



   <!--================<stock>================-->
    <section class="stock">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div align="center"><h2><?php echo $_SESSION['user']; ?> STOCK</h2></div>
            <table id="tabledit2" class="table table-bordered table-hover " style="border:3px solid #ccc;background-color:#e6fbe7">
              <thead style="background-color: aquamarine;">
                <tr>
                  <th>p.id</th>
                  <th>Product</th>
                  <th>Quantity</th>
                  <th>Uprice</th>
                  <th>Tprice</th>
                </tr>
              </thead>
              <tbody>
                <?php

                
                $q="select * from point_inventory where point='$user' ";
                $exe=mysqli_query($conn,$q);

                while($row=mysqli_fetch_array($exe))
                {


                  $id=$row['p_id'];
                  $product=$row['product'];
                  $quantity=$row['quantity'];
                  $price=$row['price'];
                  $amount += ($quantity*$price); 
                  ?>
                  <tr>
                    <td> <label for="Price"><?php echo $id; ?></label></td>
                    <td> <label for="Price"><?php echo $product;  ?></label></td>
                    <td> <label for="Price"><?php echo $quantity;  ?></label></td>
                    <td> <label for="Price"><?php echo $price;  ?></label></td>
                    <td> <label for="Price"><?php echo $price*$quantity;  ?></label></td>
                  </tr>
                  <?php  }  ?>
                </tbody>
                <tfoot>
                 <tr>
                  <td colspan="5" style="text-align:center;font-size: 25px;color:red  ">বর্তমানে স্টকে : <?php echo $amount ?> টাকার মাল আছে</td>
                </tr>
              </tfoot>
            </table>

          </div>
        </div>
      </div>
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

