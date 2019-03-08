<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $desc = $_POST['desc'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $date = strtotime($date); 
    $date = date("Y-m-d",$date);
  
    $stmt = $connection->prepare("insert into r_activity (activity_name,activity_description,activity_target_date) values (?,?,?)");
    $stmt->bind_param("sss",$name, $desc, $date);

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