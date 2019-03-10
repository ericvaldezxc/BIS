<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $query = "select term_id,term_name from r_term where term_active = 'Active' ";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($id,$name);
    
    $list = array();
    while($stmt->fetch()){
        $btn =  " <div class='text-center'> 
                    <a class='btn btn-sm btn-success btn-flat itemEdit' data-id='$id'>
                        <i class='fa fa-edit'></i>
                    </a> 
                </div>";

        $name = "$name";
        $templist = array(utf8_encode($name),$btn);
        array_push($list,$templist);

    }  
    
    $data = [ "data" => $list ];
    echo json_encode($data);
    $connection->close();
    

?>