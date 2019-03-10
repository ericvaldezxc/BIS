<?php

    include_once('../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 


   
    $stmt = $connection->prepare("update t_request_certificate set request_certificate_seen = 'Seen' ");
    $stmt->execute();
    $stmt->close();

    if( $stmt ) 
    {
        echo "Success";
    }
    else
    {
        echo "Error";

    }


    

?>