<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $id = $_POST['id'];
    $query = "select activity_id,activity_name,activity_description,DATE_FORMAT(activity_target_date, '%m/%e/%Y')  from r_activity where activity_id = ? ";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($id,$name,$desc,$date);
    
    $list = array();
    while($stmt->fetch()){
        $list = [ 
            "id" => $id ,
            "name" => $name,
            "desc" => $desc ,
            "date" => $date 
        ];

    }  
   
    echo json_encode($list);
    $connection->close();
    

?>