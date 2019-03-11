<?php

    include_once('../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $query = "SELECT baranggay_lat,baranggay_long from r_baranggay ";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($lat, $long);
    while($stmt->fetch())
    {
        $temp = [
            'lat'=>$lat,
            'long'=>$long
        ];

      
        echo json_encode($temp);
       
    }  

    
   
    
    $connection->close();
    

?>