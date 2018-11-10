<div id="con"><h2 id="h">Daily Account</h2></div>
<table id="tabledit" class="table table-bordered table-hover " style="border:3px solid #ccc;background-color:#e6cce7;font-size:20px">
  <thead>
    <tr>

      <th>হিসাব </th>
      <th>টাকার পরিমান</th>
    </tr>
  </thead>
  <tbody>
    <?php

    include'../db_connect.php';
    $sale=0; $import=0;$expense=0;$duep=0;
    $q="SELECT  sum(total) FROM distribute WHERE point='$user' AND date = DATE(NOW()) ";
    $exe=mysqli_query($conn,$q);
    while($row=mysqli_fetch_array($exe))
    {
      $import=$row[0];
     
    }

    $qq="SELECT  sum(price) FROM point_sale WHERE point='$user' AND date = DATE(NOW()) ";
    $exeq=mysqli_query($conn,$qq);
    while($row=mysqli_fetch_array($exeq))
    {
      $sale=$row[0];

    }

    $qqq="SELECT  sum(amount) FROM expense WHERE user='$user' AND date = DATE(NOW()) ";
    $exeqq=mysqli_query($conn,$qqq);
    while($row=mysqli_fetch_array($exeqq))
    {
      $exp=$row[0];
    }

    $l="SELECT  sum(paid) FROM take_due WHERE point='$user' AND date = DATE(NOW()) ";
    $ll=mysqli_query($conn,$l);
    while($row=mysqli_fetch_array($ll))
    {
      $duep=$row[0];
    }

       ?>
      <tr>
        <td> <label for="Price">আজ সেলস হয়েছে</label></td>
        <td> <label for="Price"><?php echo $sale;  ?>৳</label></td>
      </tr>
      <tr>
        <td> <label for="Price">আজ মাল ইম্পোরট হয়েছে</label></td>
        <td> <label for="Price"><?php echo $import;  ?>৳</label></td>
      </tr>
      <tr>
        <td> <label for="Price">পয়েন্টে খরচ হয়েছে</label></td>
        <td> <label for="Price"><?php echo $exp;  ?>৳</label></td>
      </tr>
      <tr>
        <td> <label for="Price">পটুয়াখালি টাকা পাঠানো হয়েছে</label></td>
        <td> <label for="Price"><?php echo $duep;  ?>৳</label></td>
      </tr>

      <?php  

      ?>
    </tbody>
    <tfoot>
     <tr>
      <td colspan="5" style="text-align:center;font-size: 25px;  ">এই মুহূর্তে ক্যাশে মোট <span style="color:red"><?php echo $sale-($exp+$duep) ?></span> টাকা আছে</td>
    </tr>
  </tfoot>
</table>
