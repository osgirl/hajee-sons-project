<?php 
include 'db_connect.php';
$point ='';
session_start();
$user=$_SESSION['user'];

$tt=0;$bs=0;$date1='';$date2='';
if ($_SESSION['type'] != 'ADMIN') 
{
  header('location:login.php');
} 
else
{
  ?>  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Employee Mangement</title>

    
    <style>
    @media print{ .no-print, .no-print *{display: none !important;}}
    
    body{

      background-image:url("image/bg1.jpg");
      font-family: 'Open Sans', sans-serif;
    }
  </style>
</head>
<body>
  <div class="container no-print" >
    <div class="row">
      <div class="col-md-12">
        <?php include 'header.php' ?>
      </div>
    </div>
    <div class="row" align="center">
      <div class="col-md-12">
        <style>.s{background-color:#0c2929}</style>
        <a href="add_employee.php"><button class="btn s btn-success" >ADD NEW EMPLOYEE</button></a>
        <a href="view_employee.php"><button class="btn s btn-success" >VIEW ALL EMPLOYEE</button></a>
        <a href="give_salary.php"><button class="btn s btn-success" >GIVE SALARY</button></a>
      </div>
    </div>
  </div>

  <div class="container ">
    <div class="row">
      <div class="col-md-8 no-print">
        <form method="POST" class="form-inline" style="background-color: #20558e;color:aqua;padding: 10px 9px 0px 10px;width:fit-content;">
          <div class="form-group">
            <input type="date" name="date1" class="form-control" value="<?php echo date('Y-m-d') ;?>">
          </div>
          TO
          <div class="form-group">

            <input type="date" name="date2" class="form-control" value="<?php echo date('Y-m-d') ;?>">
          </div>
          <button type="submit" name="search" class="btn btn-danger" style="margin-top: -13px;">Search</button>
        </form>
        <div class="c2">
          <h1 style="color: #204d74;">HISTORY</h1>
          <table  class="mydata table table-striped table-bordered table-hover" >
            <thead>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>BASIC</th>
                <th>EXTRA</th>
                <th>TOTAL</th>
                <th>DUE</th>
                <th>MONTH</th>
                <th>DATE</th>
                <th>METHOD</th>
                <th>BANK</th>
                <th>BKASH</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              include 'db_connect.php' ;
              if (isset($_POST['search'])) {

                $date1=$_POST['date1'];
                $date2=$_POST['date2'];
                $qr = "SELECT  * FROM salary_paid where pay_date between '$date1' AND '$date2' ";
                $e = mysqli_query($conn,$qr);
                while($row = mysqli_fetch_array($e))
                {
                  $tt += $row['basic_paid'];
                  $bs += $row['add_paid'];
                  ?><tr>
                    <td><?php echo $row['employee_id'];?></td>
                    <td><?php echo $row['employee_name'];?></td>
                    <td><?php echo $row['basic_paid'];?></td>
                    <td><?php echo $row['add_paid'];?></td>
                    <td><?php echo $row['total_paid'];?></td>
                    <td><?php echo $row['due'];?></td>
                    <td><?php echo $row['month'];?></td>
                    <td><?php echo $row['pay_date'];?></td>
                    <td><?php echo $row['pay_method'];?></td>
                    <td><?php echo $row['bank'];?></td>
                    <td><?php echo $row['bkash_num'];?></td>
                    <td><a href="crud.php?delem=<?php echo $row['id']; ?>" class="btn btn-info" >Delete</a></td>
                  </tr>
                  <?php
                }

              }
              else{
                $qr = "SELECT  * FROM salary_paid ";
                $e = mysqli_query($conn,$qr);
                while($row = mysqli_fetch_array($e))
                {
                  $tt += $row['basic_paid'];
                  $bs += $row['add_paid'];
                  ?><tr>
                    <td><?php echo $row['employee_id'];?></td>
                    <td><?php echo $row['employee_name'];?></td>
                    <td><?php echo $row['basic_paid'];?></td>
                    <td><?php echo $row['add_paid'];?></td>
                    <td><?php echo $row['total_paid'];?></td>
                    <td><?php echo $row['due'];?></td>
                    <td><?php echo $row['month'];?></td>
                    <td><?php echo $row['pay_date'];?></td>
                    <td><?php echo $row['pay_method'];?></td>
                    <td><?php echo $row['bank'];?></td>
                    <td><?php echo $row['bkash_num'];?></td>
                    <td><a href="crud.php?delem=<?php echo $row['id']; ?>" class="btn btn-info" >Delete</a></td>
                  </tr>
                  <?php
                }
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <th colspan="6">মোট বেসিক দেওয়া হয়েছেঃ<?php echo $tt ?></th>
                <th colspan="6">মোট এক্সট্রা দেওয়া হয়েছেঃ<?php echo $bs ?></th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="col-md-4 ">
        <?php include 'salary_sheet.php';?>
        <p class="no-print" style="color:red;text-align:center;font-size:18px;text-decoration:underline;">GIVE SALARY</p>
        <form  method="post" class="no-print" style="background-color: #9c65be;margin-left: 0%;padding: 15px;color:black;padding: 17px;margin: 7px;">
          <!-- employee -->
          <style>#lab{color:#e4fbfb;}</style>
          <div class="row">
            <div class="col-md-6">
              <label id="lab">Employee</label>
              <select type="input" name="employee_name" id="employee_name"   class="form-control" >
                <option value="" >SELECT</option>
                <?php 
                include 'db_connect.php' ;
                $select = "SELECT name FROM employee" ;
                $ex = mysqli_query($conn,$select);
                while($row = mysqli_fetch_array($ex))
                {
                  $name = $row['name'];

                  ?>
                  <option value="<?php echo $name ; ?>"><?php echo $name ; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label  id="lab">ID</label>
                <input  id="employee_id" type="number" class="form-control" name="employee_id" placeholder="employee_id..."  readonly>
              </div> 
            </div>
          </div>
          <!-- basic/additional -->
          <div class="row">
            <div class="col-md-6">
             <div class="form-group">
               <label id="lab" >Salary Basic</label>
               <input  id="basic_paid" type="text" class="form-control" name="basic_paid" placeholder="basic_paid..."  readonly>
             </div>   

           </div>
           <div class="col-md-6">
            <label  id="lab">Salary Additional</label>
            <input  id="add_paid" type="text" class="form-control" name="add_paid" placeholder="add_paid..."  >
          </div>
        </div>
        <!-- net total -->
        <div class="row">
          <div class="col-md-6">
            <label  id="lab">Net Total</label>
            <input  id="total" type="text" class="form-control" name="total_paid" placeholder="total_paid..." readonly >
          </div>
          <div class="col-md-6">
            <label  id="lab">Paid</label>
            <input  id="paid" type="text" class="form-control" name="paid" placeholder="Total..."  >
          </div>
        </div>
        <!-- payment -->
        <div class="row">
          <div class="col-md-6 ">
            <label class="col-form-label" id="lab">Due Amount</label>
            <input type="number" class="form-control" id="due" name="due" placeholder=""  required readonly>
          </div>
          <div class="col-md-6">
            <label  id="lab">Payment Method</label>
            <select id="payment_type" name="pay_method" class="form-control" required>
              <option value="">SELECT</option>
              <option value="CASH">CASH</option>
              <option value="BANK">BANK</option>
              <option value="Bkash">Bkash</option>
            </select>
          </div>
        </div>
        <!-- net paid/due -->
        <div class="row">
          <div class="col-md-12">
            <div  id="s1">
              <label class="col-form-label " id="lab">Bank Name</label>
              <select class="form-control" id="bank" name="bank">
                <option value="">SELECT</option>
                <option value="BRAC">BRAC</option>
                <option value="DBBL">DBBL</option>
                <option value="CITY">CITY</option>
              </select>
            </div>
            <div id="s2">
              <label class="col-form-label" id="lab">Bkash Number</label>
              <input type="number" class="form-control" id="bkash_num" name="bkash_num" placeholder="+880">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <label class="col-form-label" id="lab">Month</label>
            <select name="month" id="" class="form-control">
              <option value="January">January</option>
              <option value="February">February</option>
              <option value="March">March</option>
              <option value="April">April</option>
              <option value="May">May</option>
              <option value="June">June</option>
              <option value="july">july</option>
              <option value="August">August</option>
              <option value="September">September</option>
              <option value="October">October</option>
              <option value="November">November</option>
              <option value="December">December</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="col-form-label" id="lab">Year</label>
            <select name="year" id="" class="form-control">
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label class="col-form-label" id="lab">Pay</label>
            <input type="date" class="form-control" name="pay_date" value="<?php echo date('Y-m-d'); ?>" id="pay_date" >
          </div>
        </div>
        <div align="center">
          <button type="submit" name="submit"  class="btn btn-success">Confirm </button>
        </div>
      </form>
      <?php 
      if(isset($_POST['submit']))
      {

        $employee_id = $_POST['employee_id'];
        $employee_name = $_POST['employee_name'];
        $basic_paid = $_POST['basic_paid'];
        $add_paid = $_POST['add_paid'];
        $total_paid = $_POST['total_paid'];
        $due = $_POST['due'];
        $month = $_POST['month']." ".$_POST['year'];
        $pay_date = $_POST['pay_date'];
        $pay_method = $_POST['pay_method'];
        $bank = $_POST['bank'];
        $bkash_num = $_POST['bkash_num'];



        $query = "INSERT INTO salary_paid(employee_id,employee_name,basic_paid,add_paid,total_paid,due,month,pay_date,pay_method,bank,bkash_num)VALUES('$employee_id','$employee_name','$basic_paid','$add_paid','$total_paid','$due','$month','$pay_date','$pay_method','$bank','$bkash_num')";

        $q =mysqli_query($conn,$query);

        if ($q>0) {
          ?>
          <div class="container">
              <div class="row">
                <div class="">
                  <div class="sal">
                    <section class="performance-facts">
                      <style>
                      p {
                        margin: 0;
                      }

                      .performance-facts {
                        border: 1px solid black;

                        float: ;
                        width: 280px;
                        padding: 0.5rem;
                        table {
                          border-collapse: collapse;
                        }
                      }
                      .performance-facts__title {
                        font-weight: bold;
                        font-size: 2rem;
                        margin: 0 0 0.25rem 0;
                      }
                      .performance-facts__header {
                        border-bottom: 5px solid black;
                        padding: 0 0 0.25rem 0;
                        margin: 0 0 0.5rem 0;
                        p {
                          line-height: normal;
                          margin: 0;
                        }
                      }
                    </style>
                    <header class="performance-facts__header">
                      <h1 class="performance-facts__title">Employee Salary </h1>
                      <p>Hajee & Son's Company<br>Distributor Of BAT</p>
                    </header>
                    <table class="performance-facts__table" style="margin-bottom: 40px">
                      <thead>
                        <tr><th colspan="4"><b>Information</b></th></tr>
                      </thead>
                      <tbody>
                        <tr><td >Employee ID</td><td>::<?php echo $employee_id ;?></td></tr>
                        <tr><td >Employee Name</td><td>::<?php echo $employee_name; ?></td></tr>
                        <tr><td >Basic Salary</td><td>::<?php echo $basic_paid ;?></td></tr>
                        <tr><td >Addtional</td><td>::<?php echo $add_paid ;?></td></tr>
                        <tr><td >Total</td><td>::<?php echo $total_paid ;?></td></tr>
                        <tr><td >Due</td><td>::<?php echo $due ;?></td></tr>
                        <tr><td >Month/year</td><td>::<?php echo $month ;?></td></tr>
                        <tr><td >Pay Day</td><td>::<?php echo $pay_date ;?></td></tr>

                      </tbody>

                    </table>
                    <p style="border-top: 2px solid black;">Signeture</p>
                  </section>  
                </div>
              </div>
            </div>
          </div>
          <script>
            
              
              if (window.confirm("PRINT ???") == true) {

                $(".sal").show();
                window.print();
              } else {
                $(".sal").hide();
               header('location:give_salary.php');
              }
             
            
          </script>
          <?php

          
      }

    }
    ?>
  </div>
</div>
</div>
<?php include 'footer.php' ;?>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>

<script>
  $("#s1").hide();
  $("#s2").hide();
  $('.mydata').dataTable();
  $(document).ready(function(){
    $(".sal").hide();
  });
  $("#payment_type").change(function() 
  {
    var a=$("#payment_type").val();
    if(a=="BANK")

    {
      $("#s1").fadeIn();
      $("#s2").hide();
    }
    else if(a=="Bkash"){
      $("#s2").fadeIn();
      $("#s1" ).hide();
    }
    else{
      $("#s2").hide();
      $("#s1").hide();

    }});

  $('#employee_name').change(function(){
    var n = $(this).val();
    $.ajax({
      url:"fetch.php",
      method:"POST",
      data:{emp_n:n},
      success:function(value){

        var data = value.split(",");
        $('#basic_paid').val(data[0]);
        $('#employee_id').val(data[1]);
        $('#add_paid').val("0");
        $('#total').val(data[0]);
        $('#paid').val(data[0]);
        $('#due').val("0");
          // $('#img').src(data[2]);
        }
      });

  });


  $('#add_paid').keyup(function() {
    var ap = $('#add_paid').val();  
    var bp = $('#basic_paid').val();
    var tp = Number(bp)+Number(ap);
    $('#total').val(tp);  
    $('#paid').val(tp);  
  });

  $('#paid').keyup(function() {
    var tt = $('#total').val();  
    var pp = $(this).val();
    var due = Number(tt)-Number(pp);
    $('#due').val(due);  
  });
  $('#paid').change(function() {
    var tt = $('#total').val();  
    var pp = $(this).val();
    var due = Number(tt)-Number(pp);
    $('#due').val(due);  
  });


</script>


</body>
</html>
<?php
}
?>
