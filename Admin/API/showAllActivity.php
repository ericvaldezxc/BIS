<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $query = "select activity_id,activity_name,activity_description,DATE_FORMAT(activity_target_date, '%M %e, %Y')  from r_activity where activity_active = 'Active' order by activity_target_date desc";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($id,$name,$desc,$date);
    
    $list = array();
    while($stmt->fetch()){
        $btn =  " <div class='text-center'> <a class='btn btn-sm btn-info btn-flat itemInfo' data-id='$id'>
                    <i class='fa fa-eye'></i>
                </a>
                <a class='btn btn-sm btn-success btn-flat itemEdit' data-id='$id'>
                    <i class='fa fa-edit'></i>
                </a>
                <a class='btn btn-sm btn-danger btn-flat itemDelete' data-id='$id'>
                    <i class='fa fa-trash-o'></i>
                </a> </div>";

        $name = "$name";
        $templist = array($name,$date,$btn);
        array_push($list,$templist);

    }  
    $data = [ "data" => $list ];
    echo json_encode($data);
    $connection->close();
    

?>