<div id="con"><h2 id="h">প্রোডাক্ট অ্যাকাউন্ট</h2></div>
<table id= "product_account" class="table table-bordered table-hover ">
  <thead>
    <tr>
      <th>প্রোডাক্ট</th>
      <th>ইম্পোরট হয়েছে</th>
      <th>ডিস্ট্রিবিউট হয়েছে</th>
      <th>সেলস হয়েছে</th>
      <th>গোডাউনে আছে</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $id=0;

    if(isset($_POST['search']))
    {
      $date1 = $_POST['date1'];
      $date2 = $_POST['date2'];
      

      $q="select name,sum(quantity) from import where date between '$date1' and '$date2' group by name  ";
      $exe=mysqli_query($conn,$q);

      while($row=mysqli_fetch_array($exe))
      {
        $product=$row[0];
        $import=$row[1];

        $q1="select sum(quantity) from distribute where product = '$product' and  date between '$date1' and '$date2'  ";
        $exe1=mysqli_query($conn,$q1);
            while($row1=mysqli_fetch_array($exe1)){$distribute=$row1[0];}

        $q2="select sum(quantity) from inventory where name = '$product'   ";
        $exe2=mysqli_query($conn,$q2);
            while($row2=mysqli_fetch_array($exe2)){$stock=$row2[0];}

        $q3="select sum(quantity) from point_sale where product = '$product' and  date between '$date1' and '$date2' ";
        $exe3=mysqli_query($conn,$q3);
            while($row3=mysqli_fetch_array($exe3)){$sale=$row3[0];}



        ?>
        <tr>
          <td> <label for="Price"><?php echo $product;  ?></label></td>
          <td> <label for="Price"><?php echo round($import,2);  ?></label></td>
          <td> <label for="Price"><?php echo round($distribute,2);  ?></label></td>
          <td> <label for="Price"><?php echo round($sale,2);  ?></label></td>
          <td> <label for="Price"><?php echo round($stock,2);  ?></label></td>

        </tr>
        <?php  }
      
      }
    else{

      $q="select name,sum(quantity) from import group by name ";
      $exe=mysqli_query($conn,$q);

      while($row=mysqli_fetch_array($exe))
      {
        $product=$row[0];
        $import=$row[1];

        $q1="select sum(quantity) from distribute where product = '$product'   ";
        $exe1=mysqli_query($conn,$q1);
            while($row1=mysqli_fetch_array($exe1)){$distribute=$row1[0];}

        $q2="select sum(quantity) from inventory where name = '$product'   ";
        $exe2=mysqli_query($conn,$q2);
            while($row2=mysqli_fetch_array($exe2)){$stock=$row2[0];}

        $q3="select sum(quantity) from point_sale where product = '$product'   ";
        $exe3=mysqli_query($conn,$q3);
            while($row3=mysqli_fetch_array($exe3)){$sale=$row3[0];}



        ?>
        <tr>
          <td> <label for="Price"><?php echo $product;  ?></label></td>
          <td> <label for="Price"><?php echo round($import,2);  ?></label></td>
          <td> <label for="Price"><?php echo round($distribute,2);  ?></label></td>
          <td> <label for="Price"><?php echo round($sale,2);  ?></label></td>
          <td> <label for="Price"><?php echo round($stock,2);  ?></label></td>

        </tr>
        <?php  }
      }
      ?>
    </tbody>    
  </table>

  <script>
    $(document).ready(function(){


    });
  </script>