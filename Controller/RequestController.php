<?php

    include_once('../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 


    $type = $_POST['type'];
    $name = $_POST['name'];
    $security = $_POST['age'];
    $purpose = $_POST['purpose'];

    $query = "select CAST(DATEDIFF(CURRENT_DATE, resident_birth_day)/365 as int)  as age from r_resident where resident_id = ? ";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($age);
    
    
    while($stmt->fetch()){

    }
    // echo $security ."-". $age;
    if($security == $age){
        $name = utf8_decode($name);
        $stmt = $connection->prepare("insert into t_request_certificate  (request_certificate_resident_id,request_certificate_type,request_certificate_purpose) values (?,?,?)");
        $stmt->bind_param("sss",$name,$type,$purpose );
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
    }
    else
    {
        echo "Success";

    }

    

?>