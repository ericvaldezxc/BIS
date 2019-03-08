<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $id = $_POST['id'];

    $query = "select baranggay_officer_id,baranggay_officer_resident_id,t1.baranggay_officer_position_id,baranggay_officer_term_id from r_baranggay_officer as t1 inner join r_resident on resident_id = baranggay_officer_resident_id inner join r_term on baranggay_officer_term_id = term_id inner join r_baranggay_officer_position as t2 on t2.baranggay_officer_position_id = t1.baranggay_officer_position_id where baranggay_officer_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($id,$resident,$position,$term);
    
    $list = array();
    while($stmt->fetch()){
        $list = [ 
            "id" => $id ,
            "resident" => $resident ,
            "position" => $position ,
            "term" => $term
        ];

    }  
    echo json_encode($list);
    $connection->close();

?>