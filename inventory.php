<?php 
include 'db_connect.php';
$point ='';
session_start();
$user=$_SESSION['user'];

$amount = 0;
if ($_SESSION['type'] != 'ADMIN') 
{
  header('location:login.php');
} 
else{
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php include 'header.php' ?>
        </div>
        
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div align="center"><h2>স্টক</h2></div>
        <table id="tabledit" class="table table-bordered table-hover" style="text-align:center;font-size:14px;background-color:#ededed">
          <thead>
            <tr>
              <th>সিরিয়াল</th>
              <th>প্রোডাক্ট</th>
              <th>পরিমান(হাজার)</th>
              <th>হাজার প্রতি মূল্য</th>
              <th>মোট মূল্য</th>
            </tr>
          </thead>
          <tbody>
            
            <?php

           
            $q="select * from inventory";
            $exe=mysqli_query($conn,$q);
            $id=0;
            while($row=mysqli_fetch_array($exe))
            {
              $id++;
              $name=$row['name'];
              $quantity=$row['quantity'];
              $uprice=$row['price'];
              $tprice=$quantity*$uprice;
              $amount +=$tprice;
              
              ?>
              <tr>
                <td> <label for="Price"><?php echo $id; ?></label></td>
                <td> <label for="Price"><?php echo $name;  ?></label></td>
                <td> <label for="Price" id="lal"><?php echo round($quantity,2);  ?></label></td>
                <td> <label for="Price"><?php echo round($uprice,2);  ?></label></td>
                <td> <label for="Price"><?php echo round($tprice,2);  ?></label></td>


              </tr>
              
              <?php  } 
               
               ?>
            </tbody>
            <tfoot>
               <tr>
                <td colspan="5" style="text-align:center;font-size: 25px;color:red  ">বর্তমানে স্টকে  <?php echo round($amount,2) ?> টাকার মাল আছে</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </section>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">

          </div>
          
        </div>
      </div>
    </section>
<?php include 'footer.php' ?>
    <script>
      $('#tabledit').dataTable();
    </script>
  </body>
  </html>
  <?php
}
?>
