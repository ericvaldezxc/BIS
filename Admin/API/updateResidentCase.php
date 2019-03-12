<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

  
    $case = $_POST['case'];
    $name = $_POST['name'];
    $id = $_POST['id'];
    $complainant = $_POST['complainant'];
  
    $stmt = $connection->prepare("update t_resident_case set resident_case_complainant = ? , resident_case_resident_id = ? ,resident_case_case_id = ? where resident_case_id = ?");
    $stmt->bind_param("ssss",$complainant,$name, $case,$id);

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