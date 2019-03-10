<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 


    $purpose = $_POST['purpose'];
    $remarks = $_POST['remarks'];
    $residentId = $_POST['name'];
    $id = $_POST['id'];

    $query = "select concat('BC-',RIGHT(count(*)+1000001,5))  from t_clearance_record ";
    $stmt = $connection->prepare($query);

    $stmt->execute();
    $stmt->bind_result($controlNumber);
    while($stmt->fetch())
    {

    }
    
    $stmt = $connection->prepare("update t_request_certificate set request_certificate_done = 'Yes' where request_certificate_id = ? ");
    $stmt->bind_param("s",$id);

    $stmt->execute();



    $stmt = $connection->prepare("insert into t_clearance_record (clearance_record_control_number,clearance_record_purpose,clearance_record_remarks,clearance_record_resident_id) values (?,?,?,?)");
    $stmt->bind_param("ssss",$controlNumber,$purpose, $remarks, $residentId);

    $stmt->execute();
    



    $query = "select baranggay_officer_position_type,baranggay_officer_id,resident_avatar,term_name,baranggay_officer_position_position,concat(resident_first_name,' ',ifnull(resident_middle_name ,''),' ',resident_last_name) as fullname from r_baranggay_officer as t1 inner join r_resident on resident_id = baranggay_officer_resident_id inner join r_term on baranggay_officer_term_id = term_id inner join r_baranggay_officer_position as t2 on t2.baranggay_officer_position_id = t1.baranggay_officer_position_id where resident_active = 'Active' and baranggay_officer_active = 'Active' and term_active = 'Active' order by concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) asc";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($type,$id,$avatar,$term,$position,$name);
    
    $baranggayMembers = array();
    $captain = '';
    $treasurer = '';
    $secretary = '';
    
    while($stmt->fetch())
    {
        if($type == 'Captain')
        {
            $captain = $name;
        }
        else if($type == 'Secretary')
        {
            $secretary = $name;
        }
        else if($type == 'Treasurer')
        {
            $treasurer = $name;
        }
        else
        {
            array_push($baranggayMembers,$name);
        }
    }  

    $query = "select (select baranggay_name from r_baranggay where baranggay_active = 'Active'),(select baranggay_address from r_baranggay where baranggay_active = 'Active'),resident_avatar,concat(resident_first_name,' ',ifnull(resident_middle_name ,''),' ',resident_last_name),resident_place_of_birth,resident_address,DATE_FORMAT(CURRENT_TIMESTAMP, '%M %e, %Y'),DATE_FORMAT(resident_birth_day, '%M %e, %Y')  from r_resident where resident_id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $residentId);

    $stmt->execute();
    $stmt->bind_result($barname,$baradd,$avatar,$fullname,$pob,$address,$dateIssue,$dob);
    
    $finalList = array();
    while($stmt->fetch())
    {
           
        array_push($finalList, (object)[
            'Name' => $fullname,
            'Avatar' => $avatar,
            'Address' => $address,
            'DateIssue' => $dateIssue,
            'POB' => $pob,
            'DOB' => $dob,
            "Captain" => $captain ,
            "Treasurer" => $treasurer ,
            "Secretary" => $secretary ,
            "Members" => $baranggayMembers,
            "Purpose" => $purpose ,
            "Remarks" => $remarks ,
            "BaranggayAddress" => $baradd, 
            "BarrangayName" => utf8_encode($barname),
            "ControlNumber" => $controlNumber,
            "fileName" => $controlNumber
        ]);
    } 
    
    echo json_encode($finalList);
    $connection->close();
    

?>