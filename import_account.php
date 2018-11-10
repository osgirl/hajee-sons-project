<div id="con"><h2 id="h">খুলনা থেকে প্রোডাক্ট আসার হিসাব</h2></div>
<div class="row no-print" align="center">
      <div class="">
        <button type="submit" id="product_wise_import" class="btn btn-secondary">প্রোডাক্ট অনুযায়ী হিসাব</button>
        <button type="submit" id="date_wise_import" class="btn btn-secondary">তারিখ অনুযায়ী হিসাব</button>
      </div>
</div>

<table id= "product_import_tbl" class="table table-bordered table-hover ">
  <thead>
    <tr>
      <th>সিরিয়াল</th>
      <th>কোন প্রোডাক্ট </th>
      <th>কি পরিমান(হাজার) আসলো</th>
      <th>মোট মূল্য</th>
    </tr>
  </thead>
  <tbody style="background: #D9EDF6">
    <?php
    $id=0;
    
    if(isset($_POST['search']))
    {
      $sum = 0;
      $date1 = $_POST['date1'];
      $date2 = $_POST['date2'];
      $q="select name,sum(quantity) ,sum(price*quantity) from import where date between '$date1' and '$date2' group by name ";
        $exe=mysqli_query($conn,$q);

        while($row=mysqli_fetch_array($exe))
        {


	      $id++;
          $product=$row[0];
          $quantity=$row[1];
          $price=$row[2];
          $sum +=$price;
          ?>
          <tr>
            <td> <label for="Price"><?php echo $id;  ?></label></td>
            <td> <label for="Price"><?php echo $product;  ?></label></td>
            <td> <label for="Price"><?php echo $quantity;  ?></label></td>
            <td> <label for="Price"><?php echo round($price,2);  ?></label></td>
            
          </tr>
          <?php  }
          ?><tr><td colspan="5" style="text-align:right;font-size:18px;color: red ">মোটঃ<?php echo round($sum,2) ?> ৳</td></tr><?php

    }
    else{
        $sum = 0;
        $q="select name,sum(quantity) ,sum(price*quantity) from import group by name ";
        $exe=mysqli_query($conn,$q);

        while($row=mysqli_fetch_array($exe))
        {


	      $id++;
          $product=$row[0];
          $quantity=$row[1];
          $price=$row[2];
          $sum +=$price;
          ?>
          <tr>
            <td> <label for="Price"><?php echo $id;  ?></label></td>
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

<table id= "date_import_tbl" class="table table-bordered table-hover ">
    <thead>
     <tr>
      <th>তারিখ</th>
      <th>কোন প্রোডাক্ট</th>
      <th>কি পরিমান(হাজার)</th>
      <th>মোট মূল্য</th>
     </tr>
    </thead>
    <tbody  style="background:#D9EDF6">
    	<?php
    
    
    if(isset($_POST['search']))
    {
      $sum = 0;
      $date1 = $_POST['date1'];
      $date2 = $_POST['date2'];
      $q="select name,sum(quantity),sum(price*quantity),date from import  where date between '$date1' and '$date2' group by date,name ";
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
        $q="select name,sum(quantity),sum(price*quantity),date from import group by date,name ";
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
            <td> <label for="Price"><?php echo $price;  ?></label></td>
            
          </tr>
          <?php  }
          ?><tr><td colspan="5" style="text-align:right;font-size:18px;color: red ">মোটঃ<?php echo $sum ?> ৳</td></tr><?php
        }
        ?>
    </tbody>    
</table>
<script>
  $('#tabledit').dataTable();
  $(document).ready(function(){
     

    });
    

</script>