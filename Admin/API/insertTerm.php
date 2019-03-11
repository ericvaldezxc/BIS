<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $stmt = $connection->prepare("update r_term set term_active = 'Inactive'");
    $stmt->bind_param("s",$name );
    $stmt->execute();


    $name = $_POST['name'];
    $name = utf8_decode($name);

    $stmt = $connection->prepare("insert into r_term  (term_name) values (?)");
    $stmt->bind_param("s",$name );
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