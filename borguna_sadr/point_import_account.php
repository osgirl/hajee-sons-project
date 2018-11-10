<div id="con"><h2 id="h">Import Account</h2></div>
<table id="tabledit1" class="table table-bordered table-hover " style="border:3px solid #ccc;background-color:#e6caaa;font-size:20px">
  <thead>
    <tr>

      <th>পণ্য</th>
      <th>পরিমান(হাজার)</th>
      <th>মূল্য</th>
      <th>মোট</th>
      <th>তারিখ</th>
    </tr>
  </thead>
  <tbody>
    <?php

    include'../db_connect.php';
    if(isset($_POST['search']))
    {
      $date1 = $_POST['date1'];
      $date2 = $_POST['date2'];
      $q="select * from distribute where point='$user' and date between '$date1' and '$date2' ";
      $exe=mysqli_query($conn,$q);

      while($row=mysqli_fetch_array($exe))
      {



        $product=$row['product'];
        $quantity=$row['quantity'];
        $price=$row['price'];
        $date=$row['date'];
        $am += ($quantity*$price); 
        ?>
        <tr>
          <td> <label for="Price"><?php echo $product;  ?></label></td>
          <td> <label for="Price"><?php echo $quantity;  ?></label></td>
          <td> <label for="Price"><?php echo $price;  ?></label></td>
          <td> <label for="Price"><?php echo $price*$quantity;  ?></label></td>
          <td> <label for="Price"><?php echo $date; ?></label></td>
        </tr>
        <?php  }

      }
      else{
        $q="select * from distribute where point='$user'  ";
        $exe=mysqli_query($conn,$q);

        while($row=mysqli_fetch_array($exe))
        {



          $product=$row['product'];
          $quantity=$row['quantity'];
          $price=$row['price'];
          $date=$row['date'];
          $am += ($quantity*$price); 
          ?>
          <tr>
            <td> <label for="Price"><?php echo $product;  ?></label></td>
            <td> <label for="Price"><?php echo $quantity;  ?></label></td>
            <td> <label for="Price"><?php echo $price;  ?></label></td>
            <td> <label for="Price"><?php echo $price*$quantity;  ?></label></td>
            <td> <label for="Price"><?php echo $date; ?></label></td>
          </tr>
          <?php  }
        }
        ?>
      </tbody>
      <tfoot>
       <tr>
        <td colspan="5" style="text-align:center;font-size: 25px;">মোট: <span style="color:red"><?php echo $am ?></span>টাকার মাল আনা হয়েছে</td>
      </tr>
    </tfoot>
  </table>
<script>
  $('#tabledit').dataTable();
</script>