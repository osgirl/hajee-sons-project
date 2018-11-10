<?php
session_start();
include 'db_connect.php';
$id=$_GET['del'];
$user=$_SESSION['user'];
if(!$_SESSION['user'])
{
    header('location:logout.php');
    
}
else
{
    $query="SELECT * FROM employee WHERE id='$id'";
    $exe = mysqli_query($conn,$query);
    while($row=mysqli_fetch_array($exe))
    {
        $name = $row['name'];
        $image = $row['image'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $gender = $row['gender'];
        $religion = $row['religion'];
        $age = $row['age'];
        $bank_ac = $row['bank_ac'];
        $bank_name = $row['bank_name'];
        $mobile = $row['mobile'];
        $mail = $row['mail'];
        $nid = $row['nid'];
        $address = $row['address'];
        $marital = $row['marital'];
        $join_date = $row['join_date'];
        $salary = $row['salary'];
        $job_title = $row['job_title'];
        $job_location = $row['job_location'];
        $reference = $row['reference'];
        ?>
        <!-- ################################################################### -->
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Employee Mangement</title>

            <?php include 'header2.php' ?>
            <style>
            body{

                background-image:url("image/bg1.jpg");
                font-family: 'Open Sans', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php include 'header.php' ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <style>fieldset{padding: 17px;margin: 7px;}form{background-color:#fff4f5} .label1{color:red;}.legend1{text-align: -webkit-center;
                        padding: inherit;
                        font-weight: bold;
                    text-shadow: 2px 2px 15px;color:#e01c1c;}</style>
                    <form method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend class="legend1">Edit Profile</legend>
                            <!-- name/image -->
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Name<span class="label1">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i>
                                            </span>
                                            <input type="text" class="form-control" id="" value="<?php echo $name ?>" name="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"  >
                                                <label for="name" class="control-label">Employee Image</label>
                                                <input type="file" class="form-control" name="image"  accept="image/*"  required onchange="loadFile(event)" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="" style="background-color:#ededed;width:89px;height:89px;border:2px dashed red">
                                                <img id="output" src="image/<?php echo $image ?>" style="width:100%;height:100%" />
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <!-- fname/mname -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Father's Name<span class="label1">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon" aria-hidden="true"><i class="fa fa-user fa"></i></span>
                                            <input type="text" class="form-control"  value="<?php echo $fname ?>" id="co" name="fname" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="age" class="control-label">Mothers's Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" aria-hidden="true"><i class="fa fa-phone fa"></i></span>
                                            <input type="text" value="<?php echo $mname ?>" class="form-control"  id="mob" name="mname">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- gender/religion/age -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Gender<span class="label1">*</span></label>
                                        <div class="form-group">
                                            <select class="form-control" name="gender">
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Religion<span class="label1">*</span></label>
                                        <select class="form-control" name="religion">
                                            <option value="Muslim">Muslim</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="age" class="control-label">AGE<span class="label1">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon" aria-hidden="true"><i class="fa fa-calendar fa"></i></span>
                                            <input type="number" class="form-control"  id="dob" name="age" value="<?php echo $age ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- bank/name -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Bank A/C</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon" aria-hidden="true"><i class="fa fa-bank fa"></i></span>
                                                <input type="number" value="<?php echo $bank_ac ?>" class="form-control"  id="mob" name="bank_ac">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Bank Name</label>
                                        <select name="bank_name" class="form-control" >
                                            <option value="BRAC">BRAC</option>
                                            <option value="CITY">CITY</option>
                                            <option value="DBBL">DBBL</option>
                                            <option value="SONALI">SONALI</option>
                                            <option value="IBBL">IBBL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- mobile/mail/nid -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Mobile<span class="label1">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon" aria-hidden="true"><i class="fa fa-phone fa"></i></span>
                                            <input type="number" value="<?php echo $mobile ?>" class="form-control"  id="dob" name="mobile" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Mail</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" aria-hidden="true"><i class="fa fa-calendar fa"></i></span>
                                            <input name="mail" value="<?php echo $mail ?>" type="email" class="form-control"  id="dob" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="age" class="control-label">NID</label>
                                        <div class="input-group">
                                            <span class="input-group-addon" aria-hidden="true"><i class="fa fa-user fa"></i></span>
                                            <input type="number" value="<?php echo $nid ?>" class="form-control"  id="dob" name="nid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--address  -->
                            <div class="form-group">
                                <label for="address" class=" control-label">Address<label class="label1">*</label></label>
                                <textarea class="form-control"  name="address"><?php echo $address ?></textarea>
                            </div>
                            <!-- marital/join/salary -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Marital Status </label>
                                        <div class="form-group">
                                            <select class="form-control" name="marital">
                                                <option value="Married">Married</option>
                                                <option value="Unmarried">Unmarried</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Join Date<span class="label1">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon" aria-hidden="true"><i class="fa fa-calendar fa"></i></span>
                                            <input type="date" class="form-control" value="<?php echo $join_date ?>" id="dob" name="join_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="age" class="control-label">Salary<span class="label1">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon" aria-hidden="true"><i class="fa fa-money fa"></i></span>
                                            <input type="number" class="form-control"  id="sal" name="salary" value="<?php echo $salary ?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- job title/location -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Job Title<label class="label1">*</label></label>
                                        <div class="form-group">
                                            <select class="form-control" name="job_title">
                                                <option value="Manager">Manager</option>
                                                <option value="Accountent">Accountent</option>
                                                <option value="SR">SR</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Job Location<span class="label1">*</span></label>
                                        <div class="form-group">
                                            <select class="form-control" name="job_location">
                                                <?php 
                                                include 'db_connect.php' ;
                                                $select = "SELECT name FROM point_list" ;
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
                                    </div>
                                </div>
                            </div>
                            <!-- reference -->
                            <fieldset>
                                <legend>Reference</legend>
                                <!--address  -->
                                <div class="form-group">
                                    <label for="address" class=" control-label">Details</label>
                                    <textarea class="form-control"  name="reference"><?php echo $reference ?></textarea>
                                </div>
                            </fieldset>
                            <div class="form-group" align="center" >
                                <button class="btn btn-success btn" name="subm">SAVE</button>
                            </div>
                        </fieldset>

                    </form>
                    <?php 
                    include 'db_connect.php' ;
                    if(isset($_POST['subm']))
                    {

                        $name = $_POST['name'];
                        $image = $_FILES['image']['tmp_name'];
                        $dest =  $_FILES['image']['name'];

                        $fname = $_POST['fname'];
                        $mname = $_POST['mname'];
                        $gender = $_POST['gender'];
                        $religion = $_POST['religion'];
                        $age = $_POST['age'];
                        $bank_ac = $_POST['bank_ac'];
                        $bank_name = $_POST['bank_name'];
                        $mobile = $_POST['mobile'];
                        $mail = $_POST['mail'];
                        $nid = $_POST['nid'];
                        $address = $_POST['address'];
                        $marital = $_POST['marital'];
                        $join_date = $_POST['join_date'];
                        $salary = $_POST['salary'];
                        $job_title = $_POST['job_title'];
                        $job_location = $_POST['job_location'];
                        $reference = $_POST['reference'];

                        $query = "UPDATE employee SET name='$name',image='$dest',fname='$fname',mname='$mname',gender='$gender',religion='$religion',age='$age',bank_ac='$bank_ac',bank_name='$bank_name',mobile='$mobile',mail='$mail',nid='$nid',address='$address',marital='$marital',join_date='$join_date',salary='$salary',job_title='$job_title',job_location='$job_location',reference='$reference' WHERE id = '$id' ";
                        $exe =mysqli_query($conn,$query);
                        if($exe>0)
                        {
                            echo"<script>alert('!!!!আপডেট হয়েছে !!!!')</script>";
                            move_uploaded_file($image,"image/$dest");

                        }
                        else{
                            echo"<script>alert('!!!!হয়নাই  !!!!')</script>";
                        }

                    }
                    ?>
                    

                </div>
                
            </div>
        </div>
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
                        var loadFile = function(event) {
                            var reader = new FileReader();
                            reader.onload = function(){
                                var output = document.getElementById('output');
                                output.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        };
       </script>
    </body>
    </html>



    <!-- ################################################################### -->


    <?php
}

}


?>