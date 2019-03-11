<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $query = "SELECT case_name,(SELECT COUNT(*) FROM `t_resident_case` where resident_case_case_id = case_id AND resident_case_active = 'Active') FROM `r_case`";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($name,$count);
    $list = array();
    while($stmt->fetch()){
        $temp = array();
        array_push($temp,$name,$count);
        array_push($list,$temp);

    }  
    $data = [ "data" => $list, "color" => '#00c0ef' ];
    echo json_encode($data);
    $connection->close();
    

?>