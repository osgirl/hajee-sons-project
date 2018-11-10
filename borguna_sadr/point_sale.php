
<?php 
include '../db_connect.php';
session_start();
$user=$_SESSION['user'];

if (!isset($_SESSION['username'])) {
  header('location:../login.php');
} 
else{
  ?>
  <!DOCTYPE html>
  <html>
  <head>

  </head>
  <body >
    <!-- ==============header menu area ====================-->
    <section class="header_area">
      <div class="container">
        <div class="row">
          <marquee id=""><?php echo $_SESSION['user']; ?></marquee>
        </div>
      </div>
    </section>

    <!--==================main menu section========================-->
    <section class="main_menu">
     <?php include 'point_menu.php' ?>
   </section>


   <!--==================sale section========================-->
   <section class="sale">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <form method="post" style="margin-left:0%;" autocomplete="off">
            <h1 style="text-align:center; "><?php echo $_SESSION['user']; ?> Sale</h1>
            <div class="contentform">
              <div class="leftcontact">
                
                <div style="margin:0px 0px 37px 0px;">
                  <p>Product<span>*</span></p>


                  <input type="text" name="id" id="id" required  />

                  <select class=" form-control selectpicker" data-live-search="true" name="product" id="product">
                    <option value="">SELECT</option>
                    <?php 
                    
                    $select = "SELECT  product FROM point_inventory" ;
                    $ex = mysqli_query($conn,$select);
                    while($row = mysqli_fetch_array($ex))
                    {
                      $name = $row[0];

                      ?>
                      <option value="<?php echo $name ; ?>"><?php echo $name ; ?></option>
                      <?php
                    }
                    ?>

                  </select>

                </div>
                <div class="form-group">
                  <p>STOCK<span>*</span></p>
                  <span class="icon-case"><i class="fa fa-cubes"></i></span>
                  <input  id="stock" type="text"  name="stock" placeholder="stock..."  >
                  
                </div>
                <div class="form-group">
                  <p>Quantity<span>*</span></p>
                  <span class="icon-case"><i class="fa fa-cubes"></i></span>
                  <input type="text" name="quantity" id="quantity" required  />
                </div>

              </div>

              <div class="rightcontact"> 
                <div class="form-group" id="up">
                  <p>Unit Price<span>*</span></p> 
                  <span class="icon-case"><i class="fa fa-money"></i></span>
                  <input type="text" name="uprice" id="uprice" readonly="true">
                </div> 

                <div class="form-group">
                  <p>Total Price<span>*</span></p>
                  <span class="icon-case"><i class="fa fa-database"></i></span>
                  <input type="text" name="total" id="total" required readonly="true"/>
                </div>

                <div class="form-group">
                  <p>Date<span>*</span></p>  
                  <span class="icon-case"><i class="fa fa-calendar"></i></span>
                  <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" />

                </div>


              </div>
            </div>
            <button type="submit" name="sub" class="bouton-contact">Submit</button> 
          </form>

          <?php 


          if(isset($_POST['sub']))
          {
            $id = $_POST['id'];
            $point = $user;
            $product = $_POST['product'];
            $quantity = $_POST['quantity'];
            $total = $_POST['total'];
            $date = $_POST['date'];
            $tprice =$total*$quantity;

            $query0 ="SELECT * from point_inventory where p_id='$id' and point='$point'";
            $q0 = mysqli_query($conn,$query0);
            if(mysqli_num_rows($q0)>0){
              $oq='';
              while($row = mysqli_fetch_array($q0))
              {
                $oq=$row['quantity'];
              }


              if($quantity>$oq){
                echo"<script>alert('!!!!STOCK LOW !!!!')</script>";
              }
              else{
                $nq=$oq-$quantity;
                $query4="UPDATE point_inventory SET quantity='$nq' WHERE p_id = '$id' and point='$point' ";
                $b=mysqli_query($conn,$query4);


                $query = "INSERT INTO point_sale (point,p_id,product,quantity,price,date)VALUES('$point','$id','$product','$quantity','$total','$date')";
                $q =mysqli_query($conn,$query) ;


                $query5 = "INSERT INTO list_check_point (id,point,product,quantity,price,tprice)VALUES('$id','$point','$product','$quantity','$total','$tprice')";
                $q2 =mysqli_query($conn,$query5);
              }

            }
            
            
          }
          ?>
        </div>
        <div class="col-md-4">
          <table id="tabledit" class="table table-bordered table-hover ">
            <caption style="color:green;text-align:center;font-size:18px  ">
              List of Added Product
            </caption>
            <thead>
              <tr>
                <th>P.id</th>
                <th>Product</th>
                <th>Qunt</th>
                <th>UP</th>
                <th>TP</th>
                <th>DELETE</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = "SELECT * FROM list_check_point where point = '$user' ";
              $exe =mysqli_query($conn,$query) ;
              while($row = mysqli_fetch_array($exe))
              {
                ?>
                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['product'] ?></td>
                  <td><?php echo $row['quantity'] ?></td>

                  <td><?php echo $row['price'] ?></td>
                  <td><?php echo $row['tprice'] ?></td>
                  <td><a href="../borguna_sadr/delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger" >Delete</a></td>
                </tr>
                <?php
              }
              ?>
            </tbody>
          </table>
        </div>

        <div class="col-md-3">
          <p style="color:red;text-align:center;font-size:18px;text-decoration:underline; ">
            Account Info
          </p>
          <form style="background-color:#eaeaea; padding: 19px;" method="post" autocomplete="off">
            <div class="">
              <div class="">
                <label class="col-form-label">Point</label>
                <input type="text" class="form-control" name="point" value="<?php echo $_SESSION['user']; ?>" id="point" readonly="true">
              </div>

              <label >Product</label>
              <input  id="product" type="text" class="form-control" name="product" placeholder="product..."  

              <?php

              $q="SELECT product FROM list_check_point where point='$user'";
              $a=mysqli_query($conn,$q);
              $print = '';
              while($row=mysqli_fetch_array($a))
              {
                $product=$row['product'];
                $print = $print.$product.',';
              }
              ?> value="<?php  echo $print; ?>" <?php 
              ?> >

            </div>
            <div class="">
              <label >Total Amount</label>
              <input  id="total" type="text" class="form-control" name="total" placeholder="Total..."  

              <?php
              $q="SELECT sum(tprice) FROM list_check_point where point = '$user'";
              $a=mysqli_query($conn,$q);
              while($row=mysqli_fetch_array($a))
              {
                $name=$row[0];
                ?> value="<?php  echo $name; ?>" <?php 

              } ?> readonly="true">

            </div>
            <div class="">
              <label class="col-form-label">Date</label>
              <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" id="date" >
            </div>



            <button type="submit" name="submit"  class="btn btn-primary">Confirm !</button>
          </form>
          <?php 
          if(isset($_POST['submit']))
          {

            $product = $_POST['product'];
            $total = $_POST['total'];
            $date = $_POST['date'];

            $query = "INSERT INTO point_sale_account (point,product,amount,date)VALUES('$user','$product','$total','$date')";

            $q =mysqli_query($conn,$query) ;
            if($q>0)
            {
              $query2 = "DELETE FROM list_check_point where point='$user' ";
              $q2 =mysqli_query($conn,$query2) ;

            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>



  

  <script>
    $(document).ready(function(){
      $('#id').hide();
    });

    $('#quantity').keyup(function(){

      var q =$('#quantity').val();
      var uprice =$('#uprice').val();

      var total =uprice*q;
      $('#total').val(total);
    });

    $('#product').change(function(){


      var queryp =$('#product').val();
      var point =$('#point').val();

      if (queryp != '') {
        $.ajax({
          url:"../search.php",
          method:"POST",
          data:{queryp:queryp,point:point},
          success: function(value){

            var data = value.split(",");
            $('#uprice').val(data[0]);
            $('#stock').val(data[1]);
            $('#id').val(data[2]);
            
          }

        });
      }
      


    });




  </script>
</body>
</html>

<?php

}

?>

