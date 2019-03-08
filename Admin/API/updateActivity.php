<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $id = $_POST['id'];
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $date = $_POST['date'];
    $date = strtotime($date); 
    $date = date("Y-m-d",$date);

    $stmt = $connection->prepare("update r_activity set activity_name = ?,activity_description = ?,activity_target_date = ? where activity_id = ?");
    $stmt->bind_param("ssss",$name, $desc, $date,$id);
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