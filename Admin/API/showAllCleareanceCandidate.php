<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $query = "select (select count(*) from t_resident_case where resident_case_status = 'Pending' and resident_case_resident_id = resident_id and resident_case_active = 'Active'),resident_active,resident_address,resident_id,resident_gender,resident_alive,resident_avatar,resident_contact_number,resident_civil_status,resident_birth_day,concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) as fullname from r_resident where resident_active = 'Active' and (select count(*) from t_resident_case where resident_case_status = 'Pending' and resident_case_resident_id = resident_id and resident_case_active = 'Active') = 0 order by concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) asc ";
    // $query = "select * from r_department ";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($caseCount,$active,$address,$id,$gender,$alive,$avatar,$cn,$cs,$bday,$name);
    
    $list = array();
    while($stmt->fetch()){
        $case = " <div class='text-center'> <a class='btn btn-sm btn-success btn-flat' data-id='$id'>Number of Unsolved Case <span class='badge'>0</span></a> </div>";

        if($caseCount != '0' ){
            $case = " <div class='text-center'> <a class='btn btn-sm btn-danger btn-flat unsolvedCase' data-id='$id'>Number of Unsolved Case <span class='badge'>$caseCount</span></a> </div>";

        }
        if($active == "Active")
        {
            $active = " <div class='text-center'> <span class='label label-success active-label'>Active</span> </div>";            
        }
        else
        {
            $active = " <div class='text-center'> <span class='label label-danger active-label'>Inactive</span> </div>";         
        }

        if($alive == "Yes")
        {
            $alive = " <div class='text-center'> <span class='label label-success active-label'>Yes</span> </div>";            
        }
        else
        {
            $alive = " <div class='text-center'> <span class='label label-danger active-label'>No</span> </div>";         
        }

        $btn =  " <div class='text-center'> 
                <a class='btn btn-sm btn-info btn-flat generate' data-id='$id'>
                    <i class='fa fa-download'></i>
                </a></div>";

        $name = "<div class='pull-left image'>
                    <img src='../dist/avatar/$avatar' style='height:20px;width:20px' class='img-circle' alt='User Image'>
                </div>  $name";
        $templist = array($name,$address,$alive,$btn);
        array_push($list,$templist);

    }  
    $data = [ "data" => $list ];
    echo json_encode($data);
    $connection->close();
    

?>