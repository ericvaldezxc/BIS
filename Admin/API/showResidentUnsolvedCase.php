<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 
    $id = $_POST['id'];
    
    
    $query = "select case_name,DATE_FORMAT(resident_case_date_updated, '%M %e, %Y')  from t_resident_case inner join r_resident on resident_id = resident_case_resident_id inner join r_case on case_id =  resident_case_case_id where resident_case_active = 'Active' and resident_id = ? and resident_case_status = 'Pending'";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($case,$date);
    
    $bodyList = array();
    while($stmt->fetch()){
        $temp = [ 
                   
                    "case" => $case ,
                    "date" => $date 
                
                ];
        array_push($bodyList,$temp);
    } 

    $query = "select (select count(*) from t_resident_case where resident_case_status = 'Pending' and resident_case_resident_id = resident_id and resident_case_active = 'Active'),concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) ,resident_first_name,ifnull(resident_middle_name,''),resident_last_name,resident_gender,resident_alive,resident_avatar,resident_contact_number,resident_address,resident_civil_status,DATE_FORMAT(resident_birth_day, '%M %e, %Y')  from r_resident where resident_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $id);
   
    $stmt->execute();
    $stmt->bind_result($caseCount,$fullname,$fname,$mname,$lname,$gender,$alive,$avatar,$cn,$address,$cs,$bday);
    $list = array();
    while($stmt->fetch()){
        $list = [ 
                    "caseList" => $bodyList,
                    "avatar" => $avatar ,
                    "fullname" => $fullname 
                
                ];
    } 
    
    echo json_encode($list);
    $connection->close();
    

?>