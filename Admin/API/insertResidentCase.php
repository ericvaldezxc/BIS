<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

  
    $case = $_POST['case'];
    $name = $_POST['name'];
    $complainant = $_POST['complainant'];
    
  
    $stmt = $connection->prepare("insert into t_resident_case (resident_case_resident_id,resident_case_case_id,resident_case_complainant) values (?,?,?)");
    $stmt->bind_param("sss",$name, $case,$complainant);

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