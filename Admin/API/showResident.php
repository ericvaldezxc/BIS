<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $query = "select (select count(*) from t_resident_case where resident_case_status = 'Pending' and resident_case_resident_id = resident_id and resident_case_active = 'Active'),concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) ,resident_first_name,ifnull(resident_middle_name,''),resident_last_name,resident_gender,resident_alive,resident_avatar,resident_contact_number,resident_address,resident_civil_status,DATE_FORMAT(resident_birth_day, '%M %e, %Y')  from r_resident where resident_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $id);
    $id = $_POST['id'];
    $stmt->execute();
    $stmt->bind_result($caseCount,$fullname,$fname,$mname,$lname,$gender,$alive,$avatar,$cn,$address,$cs,$bday);
    
    $list = array();
    while($stmt->fetch()){
        $list = [ 
                    "caseCount" => $caseCount ,
                    "fname" => $fname ,
                    "mname" => $mname ,
                    "lname" => $lname ,
                    "id" => $id,
                    "gender" => $gender ,
                    "alive" => $alive ,
                    "avatar" => $avatar ,
                    "address" => $address ,
                    "cn" => $cn ,
                    "cs" => $cs ,
                    "fullname" => $fullname ,
                    "bday" => $bday 
                
                ];
    }  
    echo json_encode($list);
    $connection->close();
    

?>