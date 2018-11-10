<?php 
include '../db_connect.php';
session_start();
$user=$_SESSION['user'];
$sm='';$sdue='';$date1 ='';$date2 ='';

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
            <div align="center"><h2>PAYMENT HISTORY</h2></div>
            <table style="border:3px solid #ccc;background-color:#e6fbe7" id="tabledit2" class="table table-bordered table-hover ">
                <thead style="background-color: aquamarine;">
                <tr>
                  <th>Date</th>
                  <th>Amount</th>
                  <th>payment_type</th>
                  <th>bank_name</th>
                  <th>bkash_num</th>
                  <th>due</th>
                </tr>
              </thead>
              <tbody>
                <?php

                
                $q="select date,paid,payment_type,bank_name,bkash_num,due,sum(due),sum(paid) from take_due where point='$user' ";
                $exe=mysqli_query($conn,$q);

                while($row=mysqli_fetch_array($exe))
                {

                  $date=$row[0];
                  $amount=$row[1];
                  $payment_type=$row[2];
                  $bank_name=$row[3];
                  $bkash_num = $row[4];
                  $due = $row[5];
                  $sdue = $row[6];
                  $sm = $row[7];
                  
                  ?>
                  <tr>
                    <td> <label for="Price"><?php echo $date;  ?></label></td>
                    <td> <label for="Price"><?php echo $amount;  ?></label></td>
                    <td> <label for="Price"><?php echo $payment_type;  ?></label></td>
                    <td> <label for="Price"><?php echo $bank_name;  ?></label></td>
                    <td> <label for="Price"><?php echo $bkash_num;  ?></label></td>
                    <td> <label for="Price"><?php echo $due;  ?></label></td>
                  </tr>
                  <?php  }  ?>
                </tbody>
                <tfoot>
                 <tr>
                  <td colspan="6" style="text-align:center;font-size: 25px;  ">এই পর্যন্ত মোট: <span style="color:red"><?php echo $sm ?> টাকা পরিশোধ </span> করা হয়েছে এবং মোট: <span style="color:red"><?php echo $sdue ?> টাকা বাকি </span> আছে  এখনো</td>
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

