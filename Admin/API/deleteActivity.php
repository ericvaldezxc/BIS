<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $id = $_POST['id'];
    
    $stmt = $connection->prepare("update r_activity set activity_active = 'Inactive' where activity_id = ?");
    $stmt->bind_param("s",$id);
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