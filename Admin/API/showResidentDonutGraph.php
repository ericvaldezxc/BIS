<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $query = "SELECT count(*),resident_gender FROM `r_resident` where resident_active = 'Active' group by resident_gender ";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($count,$gender);
    $maleColor = '#f56954';
    $femaleColor = '#00a65a';
    
    $list = array();
    while($stmt->fetch()){
        $temp = array();
        $color = $maleColor;
        if($gender == 'Male')
        {
            $color = $femaleColor;
        }
        $temp = [ 
            "value"    => $count,
            "color"    => $color,
            "highlight"=> $color,
            "label"    => $gender
        ];
        array_push($list,$temp);

    }  
   
    echo json_encode($list);
    $connection->close();
    

?>