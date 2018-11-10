<?php 
include 'db_connect.php';
$point ='';
session_start();
$user=$_SESSION['user'];

$amount = 0;
if ($_SESSION['type'] != 'ADMIN') 
{
  header('location:login.php');
} 
else{
  ?>

  <!DOCTYPE html>
  <html>
  <head>

  </head>
  <body>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php include 'header.php' ?>
          </div>

        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
          

            <div class="list-group" style="font-size:20px">
              <a href="delete_record_db.php?imp=imp" class="list-group-item list-group-item-action list-group-item-primary">প্রোডাক্ট আনার সব রেকর্ড ডিলেট</a>
              <a href="delete_record_db.php?dist=dist" class="list-group-item list-group-item-action list-group-item-secondary">প্রোডাক্ট ডিস্ট্রিবিট এর সব রেকর্ড ডিলেট</a>
              <a href="delete_record_db.php?stock=stock" class="list-group-item list-group-item-action list-group-item-success"> স্টক ডিলেট</a>
              <a href="delete_record_db.php?pstock=pstock" class="list-group-item list-group-item-action list-group-item-dark">সব পয়েন্টের স্টক ডিলেট</a>
              <a href="delete_record_db.php?takedue=takedue" class="list-group-item list-group-item-action list-group-item-warning">সব পয়েন্টের টাকা পাঠানোর রেকর্ড ডিলেট</a>
              <a href="delete_record_db.php?duepay=duepay" class="list-group-item list-group-item-action list-group-item-info">খুলনায় টাকা পাঠানোর রেকর্ড ডিলেট</a>
              <a href="delete_record_db.php?all=all" class="list-group-item list-group-item-action list-group-item-light">সব  ডিলেট</a>
              
            </div>
          </div>
          
        </div>
      </div>
    </section>
<?php include 'footer.php' ;?>
    <script>
      $('#tabledit').dataTable();
    </script>
  </body>
  </html>
  <?php
}
?>
