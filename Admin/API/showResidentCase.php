<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $id = $_POST['id'];
    $query = "select resident_case_id,resident_case_resident_id,resident_case_case_id  from t_resident_case inner join r_resident on resident_id = resident_case_resident_id inner join r_case on case_id =  resident_case_case_id where resident_case_id = ? ";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($id,$name,$case);
    $list = array();
    while($stmt->fetch()){
        $list = [ 
                    "case" => $case ,
                    "id" => $id ,
                    "name" => $name 
                
                ];
    }  
    echo json_encode($list);
    $connection->close();
    

?>