<div id="con"><h2 id="h">সব পয়েন্টের সাথে লেনদেন</h2></div>
<table id="tabledit" class="table table-bordered table-danger ">
  <thead>
    <tr>

      <th>পয়েন্টের নাম</th>
      <th>কত টাকার মাল গিয়েছে</th>
      <th>কত টাকার মাল সেল হয়েছে</th>
      <th>কত টাকার মাল স্টকে আছে</th>
      <th>কত টাকা পাঠিয়েছে</th>
      <th>কত টাকা বাকি</th>
      <th>পয়েন্টে এক্সপেন্সে পরিমান</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($_POST['search']))
    {
      $date1 = $_POST['date1'];
      $date2 = $_POST['date2'];
       $point='';$expense=0;$sale=0;$dist=0;$paid=0;$due=0;$stock=0;
    $sum_expense=0;$sum_sale=0;$sum_dist=0;$sum_paid=0;$sum_due=0;$sum_stock=0;
    $qqq="SELECT  point,sum(total) from distribute where date between '$date1' and '$date2' group by point ";
    $exeqq=mysqli_query($conn,$qqq);
    while($row=mysqli_fetch_array($exeqq))
    {
      $point=$row[0];
      $dist=$row[1];
      $sum_dist += $dist ;
      $k="SELECT  sum(amount) FROM expense WHERE  user = '$point' and date between '$date1' and '$date2' ";
      $kk=mysqli_query($conn,$k);
      while($row=mysqli_fetch_array($kk))
        {
          $expense=$row[0];
          $sum_expense += $expense ;
        }
      $k1="SELECT  sum(price) FROM point_sale WHERE  point = '$point' and date between '$date1' and '$date2' ";
      $kk1=mysqli_query($conn,$k1);
      while($row=mysqli_fetch_array($kk1))
        {
          $sale=$row[0];
          $sum_sale += $sale ;
        }
      $k3="SELECT  sum(price*quantity) FROM point_inventory WHERE  point = '$point' ";
      $kk3=mysqli_query($conn,$k3);
      while($row=mysqli_fetch_array($kk3))
        {
          $stock=$row[0];
          $sum_stock += $stock;
        }

      $k2="SELECT  sum(paid) FROM take_due WHERE  point = '$point' and date between '$date1' and '$date2' ";
      $kk2=mysqli_query($conn,$k2);
      while($row=mysqli_fetch_array($kk2))
        {
          $paid=$row[0];
          $sum_paid += $paid;
        }
        
        $due = $dist - $paid;
        $sum_due += $due;
        ?>

    <tr>
      <td> <label for="Price"><?php echo $point;  ?>৳</label></td>
      <td> <label for="Price"><?php echo round($dist,2);?>৳</label></td>
      <td> <label for="Price"><?php echo round($sale,2);  ?>৳</label></td>
      <td> <label for="Price"><?php echo round($stock,2);  ?>৳</label></td>
      <td> <label for="Price"><?php echo round($paid,2);  ?>৳</label></td>
      <td> <label for="Price"><?php echo round($due,2);  ?>৳</label></td>
      <td> <label for="Price"><?php echo round($expense,2); ?>৳</label></td>
    </tr>
    

    <?php 

    }
    ?>
    <tr style="color:blue;text-align:right;font-size:15px">
      <td colspan="2">মোটঃ <?php echo round($sum_dist,2); ?> টাকা</td>
      <td>মোটঃ <?php echo round($sum_sale,2); ?> টাকা</td>
      <td>মোটঃ <?php echo round($sum_stock,2); ?> টাকা</td>
      <td>মোটঃ <?php echo round($sum_paid,2); ?> টাকা</td>
      <td>মোটঃ <?php echo round($sum_due,2); ?> টাকা</td>
      <td>মোটঃ <?php echo round($sum_expense,2); ?> টাকা</td>
    </tr>

    <?php 
    

    }
    else
      {
      $point='';$expense=0;$sale=0;$dist=0;$paid=0;$due=0;$stock=0;
    $sum_expense=0;$sum_sale=0;$sum_dist=0;$sum_paid=0;$sum_due=0;$sum_stock=0;
    $qqq="SELECT  point,sum(total) from distribute group by point ";
    $exeqq=mysqli_query($conn,$qqq);
    while($row=mysqli_fetch_array($exeqq))
    {
      $point=$row[0];
      $dist=$row[1];
      $sum_dist += $dist ;
      $k="SELECT  sum(amount) FROM expense WHERE  user = '$point' ";
      $kk=mysqli_query($conn,$k);
      while($row=mysqli_fetch_array($kk))
        {
          $expense=$row[0];
          $sum_expense += $expense ;
        }
      $k1="SELECT  sum(price) FROM point_sale WHERE  point = '$point' ";
      $kk1=mysqli_query($conn,$k1);
      while($row=mysqli_fetch_array($kk1))
        {
          $sale=$row[0];
          $sum_sale += $sale ;
        }
      $k3="SELECT  sum(price*quantity) FROM point_inventory WHERE  point = '$point' ";
      $kk3=mysqli_query($conn,$k3);
      while($row=mysqli_fetch_array($kk3))
        {
          $stock=$row[0];
          $sum_stock += $stock;
        }

      $k2="SELECT  sum(paid) FROM take_due WHERE  point = '$point' ";
      $kk2=mysqli_query($conn,$k2);
      while($row=mysqli_fetch_array($kk2))
        {
          $paid=$row[0];
          $sum_paid += $paid;
        }
        
        $due = $dist - $paid;
        $sum_due += $due;
        ?>

    <tr>
      <td> <label for="Price"><?php echo $point;  ?>৳</label></td>
      <td> <label for="Price"><?php echo round($dist,2);?>৳</label></td>
      <td> <label for="Price"><?php echo round($sale,2);  ?>৳</label></td>
      <td> <label for="Price"><?php echo round($stock,2);  ?>৳</label></td>
      <td> <label for="Price"><?php echo round($paid,2);  ?>৳</label></td>
      <td> <label for="Price"><?php echo round($due,2);  ?>৳</label></td>
      <td> <label for="Price"><?php echo round($expense,2); ?>৳</label></td>
    </tr>
    

    <?php 

    }
    ?>
    <tr style="color:blue;text-align:right;font-size:15px">
      <td colspan="2">মোটঃ <?php echo round($sum_dist,2); ?> টাকা</td>
      <td>মোটঃ <?php echo round($sum_sale,2); ?> টাকা</td>
      <td>মোটঃ <?php echo round($sum_stock,2); ?> টাকা</td>
      <td>মোটঃ <?php echo round($sum_paid,2); ?> টাকা</td>
      <td>মোটঃ <?php echo round($sum_due,2); ?> টাকা</td>
      <td>মোটঃ <?php echo round($sum_expense,2); ?> টাকা</td>
    </tr>

    <?php 
    }
    ?>
  </tbody>
  <tfoot class="no-print">
   <tr>
    <td colspan="7" style="text-align:center; "><button type="submit"  class="btn btn-secondary">Doc</button>  <button type="submit" onclick="window.print()" id="point" class="btn btn-success">Print</button>    <button type="submit" class="btn btn-info">Export to Excel</button></td>
  </tr>
  </tfoot>
</table>
<script src="js/jquery-3.2.1.min.js"></script>
