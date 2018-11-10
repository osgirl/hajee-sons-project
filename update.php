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
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title></title>
            <?php include 'header2.php' ?>
            <style>
            @media print
            {    
                .no-print, .no-print *
                {
                    display: none !important;
                }
            }
        </style>
    </head>
    <body>

    <div class="container">
            <div class="row no-print">
                <div class="col-md-12">
                    <?php include 'header.php' ?>
                </div>
            </div>
            <div class="row pp no-print">
                <style>
                fieldset{padding: 17px;margin: 7px;}
                form{background-color:#fff4f5} 
                .label1{color:red;}
                .legend1{text-align: -webkit-center;padding: inherit;font-weight:bold;text-shadow: 2px 2px 15px #ecdcec;}
                th{background-color: #ecdcec;font-size: 20px;font-variant: all-petite-caps; }
                td{background-color: #fbfbfb;font-family: cursive;font-size: 15px;font-variant: all-petite-caps;}
            </style>
            <div class="col-md-12">

                <form method="POST" enctype="multipart/form-data" class="form-inline">
                    <fieldset>
                        <legend class="legend1 ">Profile</legend>


                        <div class="row">

                            <div class="col-md-6 col-md-offset-1">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Name:</th>
                                            <td><?php echo $name ?></td>
                                        </tr>
                                        <tr>
                                            <th>Father's Name:</th>
                                            <td><?php echo $fname ?></td>
                                        </tr>
                                        <tr>
                                            <th>Mother's Name:</th>
                                            <td><?php echo $mname ?></td>
                                        </tr>
                                        <tr>
                                            <th>Address:</th>
                                            <td><?php echo $address ?></td>
                                        </tr>
                                        <tr>
                                            <th>BANK A/C:</th>
                                            <td><?php echo $bank_ac ?></td>
                                        </tr>
                                        <tr>
                                            <th>BANK NAME:</th>
                                            <td><?php echo $bank_name ?></td>
                                        </tr>
                                        <tr>
                                            <th>Reference:</th>
                                            <td><?php echo $reference ?></td>
                                        </tr>
                                        <tr>
                                            <th>Marital Status:</th>
                                            <td><?php echo $marital ?></td>
                                        </tr>

                                        <tr>
                                            <th>Job Position :</th>
                                            <td><?php echo $job_title ?></td>
                                        </tr>
                                        <tr>
                                            <th>Job Loacation:</th>
                                            <td><?php echo $job_location ?></td>
                                        </tr>
                                        <tr>
                                            <th>Salary:</th>
                                            <td><?php echo $salary ?></td>
                                        </tr>

                                    </tbody>
                                </table>


                            </div>
                            <div class="col-md-4 ">
                                <div class="form-group">

                                    <img src="image/<?php echo $image ?>" alt="" style="width: 167px;height: 138px;" class="no">
                                    <table class="table">
                                        <tbody>

                                            <tr>
                                                <th>Gender</th>
                                                <td><?php echo $gender ?></td>
                                            </tr>
                                            <tr>
                                                <th>Religion:</th>
                                                <td><?php echo $religion ?></td>
                                            </tr>
                                            <tr>
                                                <th>Age:</th>
                                                <td><?php echo $age ?></td>
                                            </tr>

                                            <tr>
                                                <th>Mobile:</th>
                                                <td><?php echo $mobile ?></td>
                                            </tr>
                                            <tr>
                                                <th>Mail:</th>
                                                <td><?php echo $mail ?></td>
                                            </tr>
                                            <tr>
                                                <th>NID:</th>
                                                <td><?php echo $nid ?></td>
                                            </tr>
                                            <tr>
                                                <th>Join Date:</th>
                                                <td><?php echo $join_date ?></td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>


                            </div>
                        </div>
                        <div align="center" class="no-print">
                            <button class="btn btn-success btn" name=""><a href="edit_profile.php?del=<?php echo $row['id']; ?>">Edit Profile</a></button><span> </span>
                            <button class="btn btn-info btn" id="pr">Print</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        
    </div>
    
    <div class="row pp" style="display:none" >
        <style>
        fieldset{padding: 17px;margin: 7px;}
        form{background-color:#fff4f5} 
        .label1{color:red;}
        .legend1{text-align: -webkit-center;padding: inherit;font-weight:bold;text-shadow: 2px 2px 15px #ecdcec;}
        th{background-color: #ecdcec;font-size: 20px;font-variant: all-petite-caps; }
        td{background-color: #fbfbfb;font-family: cursive;font-size: 15px;font-variant: all-petite-caps;}
        </style>
        <div class="col-md-12">

            <form method="POST" enctype="multipart/form-data" class="form-inline">
                <fieldset>

                    <div class="row"   align="center">


                        <img src="image/logo.png" style="width:126px;float:left">
                        <h2>Hajee & Son's</h2>
                        <h4>Employee Profile Details</h4>
                        <img src="image/<?php echo $image ?>" style="width:126px;margin-top: -104px;float:right">

                    </div>

                    <div class="row">

                        <div class="col-md-6 ">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Name:</th>
                                        <td><?php echo $name ?></td>
                                    </tr>
                                    <tr>
                                        <th>Father's Name:</th>
                                        <td><?php echo $fname ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mother's Name:</th>
                                        <td><?php echo $mname ?></td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td><?php echo $address ?></td>
                                    </tr>
                                    <tr>
                                        <th>BANK A/C:</th>
                                        <td><?php echo $bank_ac ?></td>
                                    </tr>
                                    <tr>
                                        <th>BANK NAME:</th>
                                        <td><?php echo $bank_name ?></td>
                                    </tr>
                                    <tr>
                                        <th>Reference:</th>
                                        <td><?php echo $reference ?></td>
                                    </tr>
                                    <tr>
                                        <th>Marital Status:</th>
                                        <td><?php echo $marital ?></td>
                                    </tr>

                                    <tr>
                                        <th>Job Position :</th>
                                        <td><?php echo $job_title ?></td>
                                    </tr>
                                    <tr>
                                        <th>Job Loacation:</th>
                                        <td><?php echo $job_location ?></td>
                                    </tr>
                                    <tr>
                                        <th>Salary:</th>
                                        <td><?php echo $salary ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td><?php echo $gender ?></td>
                                    </tr>
                                    <tr>
                                        <th>Religion:</th>
                                        <td><?php echo $religion ?></td>
                                    </tr>
                                    <tr>
                                        <th>Age:</th>
                                        <td><?php echo $age ?></td>
                                    </tr>

                                    <tr>
                                        <th>Mobile:</th>
                                        <td><?php echo $mobile ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mail:</th>
                                        <td><?php echo $mail ?></td>
                                    </tr>
                                    <tr>
                                        <th>NID:</th>
                                        <td><?php echo $nid ?></td>
                                    </tr>
                                    <tr>
                                        <th>Join Date:</th>
                                        <td><?php echo $join_date ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>

                </fieldset>
            </form>
        </div>
    </div>

<script src="js/jquery-3.2.1.min.js"></script>
<script>
    $('#pr').click(function(){
        $('.pp').css("display","block");

        window.print();
    });
</script>
</body>
</html>


<?php
}

}

?>