<div id="con"><h2 id="h">Total Account</h2></div>
<table id="tabledit5" class="table table-bordered table-hover " style="border:3px solid #ccc;background-color:#e6fbe7">
  <thead style="background-color: aquamarine;">
    <tr>

      <th>হিসাব </th>
      <th>টাকার পরিমান</th>
    </tr>
  </thead>
  <tbody>
    <?php

    include'../db_connect.php';
    $sale=0; $import=0;$expense=0;$duep=0;$due=0;
    $q="SELECT  sum(total) FROM distribute WHERE point='$user'  ";
    $exe=mysqli_query($conn,$q);
    while($row=mysqli_fetch_array($exe))
    {
      $import=$row[0];
     
    }

    $qq="SELECT  sum(price) FROM point_sale WHERE point='$user'  ";
    $exeq=mysqli_query($conn,$qq);
    while($row=mysqli_fetch_array($exeq))
    {
      $sale=$row[0];

    }

    $qqq="SELECT  sum(amount) FROM expense WHERE user='$user'  ";
    $exeqq=mysqli_query($conn,$qqq);
    while($row=mysqli_fetch_array($exeqq))
    {
      $exp=$row[0];
    }

    $l="SELECT  sum(paid),sum(due) FROM point_account WHERE point='$user'  ";
    $ll=mysqli_query($conn,$l);
    while($row=mysqli_fetch_array($ll))
    {
      $duep=$row[0];
      $due=$row[1];
    }

       ?>
      <tr>
        <td> <label for="Price">মোট সেলস হয়েছে</label></td>
        <td> <label for="Price"><?php echo $sale;  ?>৳</label></td>
      </tr>
      <tr>
        <td> <label for="Price">মোট মাল ইম্পোরট হয়েছে</label></td>
        <td> <label for="Price"><?php echo $import;  ?>৳</label></td>
      </tr>
      <tr>
        <td> <label for="Price">মোট পয়েন্টে খরচ হয়েছে</label></td>
        <td> <label for="Price"><?php echo $exp;  ?>৳</label></td>
      </tr>
      <tr>
        <td> <label for="Price">মোট পটুয়াখালি টাকা পাঠানো হয়েছে</label></td>
        <td> <label for="Price"><?php echo $duep;  ?>৳</label></td>
      </tr>
      <tr>
        <td> <label for="Price">এখনো মোট ডিউ আছে</label></td>
        <td> <label for="Price"><?php echo $due;  ?>৳</label></td>
      </tr>

      <?php  

      ?>
    </tbody>
    <!-- <tfoot>
     <tr>
      <td colspan="5" style="text-align:center;font-size: 25px;  " >মোট লেনদেন<span style="color:red"><?php echo ($sale+$duep) ?></span> টাকা <br>মোট আয়<span style="color:red"><?php echo $sale-($exp+$duep) ?></span> টাকা <br>মোট ব্যায়<span style="color:red"><?php echo $sale-($exp+$duep) ?></span> টাকা   </td>
    </tr>
  </tfoot> -->
</table>
<script>
  $('#tabledit5').dataTable();
</script>