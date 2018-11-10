<div id="con"><h2 id="h">Daily Account</h2></div>
<div id="date" style="">
  <?php echo date()?>
</div>
<table id="tabledit" class="table table-bordered table-striped " style="font-size:16px">
  <thead>
    <tr>

      <th>হিসাব </th>
      <th>টাকার পরিমান</th>
    </tr>
  </thead>
  <tbody>
    <?php


    $import=0;$send_money=0;$expense=0;$dist=0;$receive_due=0;

    $q="SELECT  sum(total) FROM import_account WHERE  date = DATE(NOW()) ";
    $exe=mysqli_query($conn,$q);
    while($row=mysqli_fetch_array($exe))
    {
      $import=$row[0];
      
    }

    $qq="SELECT  sum(paid) FROM import_account WHERE date = DATE(NOW()) ";
    $exeq=mysqli_query($conn,$qq);
    while($row=mysqli_fetch_array($exeq))
    {
      $send_money=$row[0];

    }

    $qqq="SELECT  sum(amount) FROM expense WHERE user='$userr' AND date = DATE(NOW()) ";
    $exeqq=mysqli_query($conn,$qqq);
    while($row=mysqli_fetch_array($exeqq))
    {
      $exp=$row[0];
    }

    $l="SELECT  sum(total) FROM distribute WHERE  date = DATE(NOW()) ";
    $ll=mysqli_query($conn,$l);
    while($row=mysqli_fetch_array($ll))
    {
      $dist=$row[0];
    }
    $k="SELECT  sum(paid) FROM take_due WHERE  date = DATE(NOW()) ";
    $kk=mysqli_query($conn,$k);
    while($row=mysqli_fetch_array($kk))
    {
      $receive_due=$row[0];
    }

    ?>
    <tr>
      <td> <label for="Price">খুলনা থেকে মাল এসেছে</label></td>
      <td> <label for="Price"><?php echo round($import,2);  ?>৳</label></td>
    </tr>
    <tr>
      <td> <label for="Price">খুলনা টাকা পাঠানো হয়েছে</label></td>
      <td> <label for="Price"><?php echo round($send_money,2);  ?>৳</label></td>
    </tr>
    <tr>
      <td> <label for="Price">পয়েন্টে মাল পাঠানো হয়েছে</label></td>
      <td> <label for="Price"><?php echo round($dist,2);  ?>৳</label></td>
    </tr>
    <tr>
      <td> <label for="Price">পয়েন্ট থেকে টাকা এসেছে</label></td>
      <td> <label for="Price"><?php echo round($receive_due,2);  ?>৳</label></td>
    </tr>
    <tr>
      <td> <label for="Price">আজ অন্যান্য খরচ হয়েছে</label></td>
      <td> <label for="Price"><?php echo round($exp,2);  ?>৳</label></td>
    </tr>

    <?php  

    ?>
  </tbody>
  <tfoot class="no-print">
   <tr>
    <td colspan="5" style="text-align:center; "><button type="submit"   class="btn btn-info">DOC</button> <button type="submit"  id="pr" class="btn btn-success">Print</button> <button type="submit"   class="btn btn-danger">EXCEL</button></td>
  </tr>
</tfoot>
</table>
<script src="js/jquery-3.2.1.min.js"></script>
<script>
	$('#pr').click(function(){
		$('.prs').css("display","block");
		window.print();
	});
</script>