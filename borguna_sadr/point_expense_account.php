<div id="con"><h2 id="h">Expense </h2></div>
<table id="tabledit4" class="table table-bordered table-hover " style="border:3px solid #ccc;background-color:#ebbce7;font-size:20px">
  <thead>
    <tr>

     <th>SL</th>
     <th>Type</th>
     <th>amount</th>
     <th>Date</th>
   </tr>
 </thead>
 <tbody>
  <?php

  include'../db_connect.php';
  if(isset($_POST['search']))
  {
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];
    $q="select * from expense where user='$user' and date between '$date1' and '$date2' ";
    $exe=mysqli_query($conn,$q);
    $am=0;$id=0;
    while($row=mysqli_fetch_array($exe))
    {


      $id++;
      $type=$row['type'];
      $amount=$row['amount'];
      $date=$row['date'];
      $am += $amount; 
      ?>
      <tr>
        <td> <label for="Price"><?php echo $id;  ?></label></td>
        <td> <label for="Price"><?php echo $type;  ?></label></td>
        <td> <label for="Price"><?php echo $amount;  ?></label></td>
        <td> <label for="Price"><?php echo $date; ?></label></td>
      </tr>
      <?php  }

    }
    else{
      $q="select * from expense where user='$user'  ";
      $exe=mysqli_query($conn,$q);
      $am=0;$id=0;
      while($row=mysqli_fetch_array($exe))
      {


        $id++;
        $type=$row['type'];
      $amount=$row['amount'];
      $date=$row['date'];
      $am += $amount; 
      ?>
      <tr>
        <td> <label for="Price"><?php echo $id;  ?></label></td>
        <td> <label for="Price"><?php echo $type;  ?></label></td>
        <td> <label for="Price"><?php echo $amount;  ?></label></td>
        <td> <label for="Price"><?php echo $date; ?></label></td>
      </tr>
      <?php  }
    }
      ?>
    </tbody>
    <tfoot>
     <tr>
      <td colspan="5" style="text-align:center;font-size: 25px;">মোট: <span style="color:red"><?php echo $am ?></span> টাকা খরচ হয়েছে</td>
    </tr>
  </tfoot>
</table>
<script>
  $('#tabledit4').dataTable();
</script>