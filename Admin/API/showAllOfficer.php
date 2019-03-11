<?php

    include_once('../../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

    $query = "select baranggay_officer_id,resident_avatar,term_name,baranggay_officer_position_position,concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) as fullname from r_baranggay_officer as t1 inner join r_resident on resident_id = baranggay_officer_resident_id inner join r_term on baranggay_officer_term_id = term_id inner join r_baranggay_officer_position as t2 on t2.baranggay_officer_position_id = t1.baranggay_officer_position_id where resident_active = 'Active' and baranggay_officer_active = 'Active' order by concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) asc";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $stmt->bind_result($id,$avatar,$term,$position,$name);
    
    $list = array();
    while($stmt->fetch()){
        $btn =  " <div class='text-center'> <a class='btn btn-sm btn-info btn-flat itemInfo' data-id='$id'>
                    <i class='fa fa-eye'></i>
                </a>
                <a class='btn btn-sm btn-success btn-flat itemEdit' data-id='$id'>
                    <i class='fa fa-edit'></i>
                </a>
                <a class='btn btn-sm btn-danger btn-flat itemDelete' data-id='$id'>
                    <i class='fa fa-trash-o'></i>
                </a> </div>";

        $name = "<div class='pull-left image'>
                    <img src='../dist/avatar/$avatar' style='height:20px;width:20px' class='img-circle' alt='User Image'>
                </div>  $name";
        $templist = array($name,$position,$term,$btn);
        array_push($list,$templist);

    }  
    $data = [ "data" => $list ];
    echo json_encode($data);
    $connection->close();
    

?>