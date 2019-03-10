<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $query = "select baranggay_officer_position_id,baranggay_officer_position_position, baranggay_officer_position_type from r_baranggay_officer_position ";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($id,$name,$type);
    
    $list = array();
    while($stmt->fetch()){
        $btn =  " <div class='text-center'> 
                    <a class='btn btn-sm btn-success btn-flat itemEdit' data-id='$id'>
                        <i class='fa fa-edit'></i>
                    </a> 
                </div>";

        $name = "$name";
        $templist = array(utf8_encode($name),$type,$btn);
        array_push($list,$templist);

    }  
    
    $data = [ "data" => $list ];
    echo json_encode($data);
    $connection->close();
    

?>