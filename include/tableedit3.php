<?php

$mysqli = new mysqli('andimpex.com', 'andimpex_andit', 'Shridham123', 'andimpex_haji');

if (mysqli_connect_errno()) {
  echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
  exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $result = $mysqli->query("SELECT * FROM login ");
    
    while($row = $result->fetch_assoc()){
        
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['user'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['pass'] ?></td>
            <td><?php echo $row['type'] ?></td>
        </tr>
        <?php
    }
} else{

    // Basic example of PHP script to handle with jQuery-Tabledit plug-in.
    // Note that is just an example. Should take precautions such as filtering the input data.

    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);



    if ($input['action'] == 'edit') {
        $mysqli->query("UPDATE login SET user='" . $input['user'] . "', username='" . $input['username'] . "', pass='" . $input['pass'] . "' , type='" . $input['type'] . "' WHERE id='" . $input['id'] . "'");
    } 
    else if ($input['action'] == 'delete') {
        $mysqli->query("DELETE FROM login WHERE id='" . $input['id'] . "'");
    } 

    mysqli_close($mysqli);

    echo json_encode($input);
    
}
?>
