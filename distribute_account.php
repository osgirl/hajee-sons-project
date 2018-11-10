<div id="con"><h2 id="h">ডিস্ট্রিবিউট অ্যাকাউন্ট</h2></div>
<div class="row no-print" align="center">
      <div class="">
        <button type="submit" id="product_wise" class="btn btn-secondary">প্রোডাক্ট অনুসারে</button>
        <button type="submit" id="point_wise" class="btn btn-secondary">পয়েন্ট অনুসারে</button>
        <button type="submit" id="date_wise" class="btn btn-secondary">পাঠানোর তারিখ অনুসারে</button>
      </div>
</div>
<style>tbody{background:#fcf8e3}</style>
<table id= "product_w_tbl" class="table table-bordered table-hover ">
  <thead>
    <tr>
      <th>কি প্রোডাক্ট</th>
      <th>কি পরিমান ডিস্ট্রিবিউট হয়েছে</th>
      <th>মোট মূল্য</th>
    </tr>
  </thead>
  <tbody>
    <?php


    if(isset($_POST['search']))
    {
      $sum =0;
      $date1 = $_POST['date1'];
      $date2 = $_POST['date2'];
      $q="select product,sum(quantity),sum(total) from distribute  where point='$user' and date between '$date1' and '$date2' group by product";
      $exe=mysqli_query($conn,$q);

        while($row=mysqli_fetch_array($exe))
        {



          $product=$row[0];
          $quantity=$row[1];
          $price=$row[2];
          $sum +=$price;
          ?>
          <tr>
            <td> <label for="Price"><?php echo round($product,2);  ?></label></td>
            <td> <label for="Price"><?php echo round($quantity,2);  ?></label></td>
            <td> <label for="Price"><?php echo round($price,2);  ?></label></td>
            
          </tr>
          <?php  }
          ?><tr><td colspan="5" style="text-align:right;font-size:18px;color: red ">মোটঃ<?php echo round($sum,2) ?> ৳</td></tr><?php

    }
    else{
      $sum =0;
        $q="select product,sum(quantity),sum(total) from distribute group by product ";
        $exe=mysqli_query($conn,$q);

        while($row=mysqli_fetch_array($exe))
        {



          $product=$row[0];
          $quantity=$row[1];
          $price=$row[2];
          $sum +=$price;
          ?>
          <tr>
            <td> <label for="Price"><?php echo $product;  ?></label></td>
            <td> <label for="Price"><?php echo round($quantity,2);  ?></label></td>
            <td> <label for="Price"><?php echo round($price,2);  ?></label></td>
            
          </tr>
          <?php  }
          ?><tr><td colspan="5" style="text-align:right;font-size:18px;color: red ">মোটঃ<?php echo round($sum,2) ?> ৳</td></tr><?php
        }
        ?>
      </tbody>    
</table>
<table id= "point_w_tbl" class="table table-bordered table-hover ">
  <thead>
    <tr>
      <th>কোন পয়েন্ট</th>
      <th>কি কি প্রোডাক্ট</th>
      <th> কি পরিমান(হাজার) গেলো</th>
      <th>মোট  মূল্য</th>
    </tr>
  </thead>
  <tbody>
    <?php

    
    if(isset($_POST['search']))
    {
      $sum = 0;
      $date1 = $_POST['date1'];
      $date2 = $_POST['date2'];
      $q="select product,sum(quantity),sum(total),point from distribute  where point='$user' and date between '$date1' and '$date2' group  by point,product";
      $exe=mysqli_query($conn,$q);

        while($row=mysqli_fetch_array($exe))
        {



          $product=$row[0];
          $quantity=$row[1];
          $price=$row[2];
          $point=$row[3];
          $sum +=$price;
          ?>
          <tr>
            <td> <label for="Price"><?php echo $point;  ?></label></td>
            <td> <label for="Price"><?php echo round($product,2);  ?></label></td>
            <td> <label for="Price"><?php echo round($quantity,2);  ?></label></td>
            <td> <label for="Price"><?php echo round($price,2);  ?></label></td>
            
          </tr>
          <?php  }
          ?><tr><td colspan="5" style="text-align:right;font-size:18px;color: red ">মোটঃ<?php echo round($sum,2) ?> ৳</td></tr><?php

    }
    else{
      $sum = 0;
        $q="select product,sum(quantity),sum(total),point from distribute group  by point,product ";
        $exe=mysqli_query($conn,$q);

        while($row=mysqli_fetch_array($exe))
        {



          $product=$row[0];
          $quantity=$row[1];
          $price=$row[2];
          $point=$row[3];
          $sum +=$price;
          ?>
          <tr>
            <td> <label for="Price"><?php echo $point;  ?></label></td>
            <td> <label for="Price"><?php echo $product;  ?></label></td>
            <td> <label for="Price"><?php echo round($quantity,2);  ?></label></td>
            <td> <label for="Price"><?php echo round($price,2);  ?></label></td>
            
          </tr>
          <?php  }
          ?><tr><td colspan="5" style="text-align:right;font-size:18px;color: red ">মোটঃ<?php echo round($sum,2) ?> ৳</td></tr><?php
        }
        ?>
      </tbody>    
</table>
<table id= "date_w_tbl" class="table table-bordered table-hover ">
  <thead>
    <tr>
      <th>কোন তারইখ</th>
      <th>কি প্রোডাক্ট</th>
      <th>কি পরিমান(হাজার) ডিস্ট্রিবিউট</th>
      <th>মোট মূল্য</th>
    </tr>
  </thead>
  <tbody>
    <?php

    if(isset($_POST['search']))
    {
      $sum = 0;
      $date1 = $_POST['date1'];
      $date2 = $_POST['date2'];
      $q="select product,sum(quantity),sum(total) from distribute  where point='$user' and date between '$date1' and '$date2' group by date,product";
      $exe=mysqli_query($conn,$q);

        while($row=mysqli_fetch_array($exe))
        {



          $product=$row[0];
          $quantity=$row[1];
          $price=$row[2];
          $date=$row[3];
          $sum +=$price;
          ?>
          <tr>
            <td> <label for="Price"><?php echo $date;  ?></label></td>
            <td> <label for="Price"><?php echo $product;  ?></label></td>
            <td> <label for="Price"><?php echo round($quantity,2);  ?></label></td>
            <td> <label for="Price"><?php echo round($price,2);  ?></label></td>
            
          </tr>
          <?php  }
          ?><tr><td colspan="5" style="text-align:right;font-size:18px;color: red ">মোটঃ<?php echo round($sum,2) ?> ৳</td></tr><?php

    }
    else{
      $sum = 0;
        $q="select product,sum(quantity),sum(total),date from distribute group by date,product";
        $exe=mysqli_query($conn,$q);

        while($row=mysqli_fetch_array($exe))
        {



          $product=$row[0];
          $quantity=$row[1];
          $price=$row[2];
          $date=$row[3];
          $sum +=$price;
          ?>
          <tr>
            <td> <label for="Price"><?php echo $date;  ?></label></td>
            <td> <label for="Price"><?php echo $product;  ?></label></td>
            <td> <label for="Price"><?php echo round($quantity,2);  ?></label></td>
            <td> <label for="Price"><?php echo round($price,2);  ?></label></td>
            
          </tr>
          <?php  }
          ?><tr><td colspan="5" style="text-align:right;font-size:18px;color: red ">মোটঃ<?php echo round($sum,2) ?> ৳</td></tr><?php
        }
        ?>
      </tbody>    
</table>

<script>
  $('#tabledit').dataTable();
  $(document).ready(function(){
     

    });
    

</script>