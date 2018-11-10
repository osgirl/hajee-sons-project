<?php

$mysqli = new mysqli('andimpex.com', 'andimpex_andit', 'Shridham123', 'andimpex_haji');
if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM list_check");
    
    while($row = $result->fetch_assoc()){
        
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['product'] ?></td>
            <td><?php echo $row['quantity'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['tprice'] ?></td>
        </tr>
        <?php
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);



    if ($input['action'] == 'delete') {
        include '../db_connect.php';
        $qq = '';
        $query4="select quantity from list_check where id ='" . $input['id'] . "' ";
        $b2=mysqli_query($conn,$query4);
        while($row = mysqli_fetch_array($b2))
        {
            $qq = $row[0];
        }

        $query3="UPDATE inventory set quantity =quantity+'$qq ' where id='" . $input['id'] . "' ";
        $b=mysqli_query($conn,$query3);
        if($b>0){
             $mysqli->query("DELETE FROM list_check WHERE id='" . $input['id'] . "'");
        }

       
        



    } 

    mysqli_close($mysqli);

    echo json_encode($input);
    
}
?>
