<?php

    include_once('../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

   
    $query = "";
    $username = $_SESSION['username'];
    // $query = "select resident_gender,resident_civil_status, YEAR(CURRENT_TIMESTAMP) - YEAR(resident_birth_day) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(resident_birth_day, 5)) - 1 as age,concat(resident_first_name,' ',ifnull(resident_middle_name ,''),' ',resident_last_name),resident_avatar from r_resident where resident_id = (SELECT user_resident_id FROM `r_user` where user_username = ?) ";
    $query = "select resident_gender,resident_civil_status, CAST(DATEDIFF(CURRENT_DATE, resident_birth_day)/365 as int)  as age,concat(resident_first_name,' ',ifnull(resident_middle_name ,''),' ',resident_last_name),resident_avatar from r_resident where resident_id = (SELECT user_resident_id FROM `r_user` where user_username =  ?) ";

    $stmt = $connection->prepare($query);

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($gender,$cs,$age,$fullname,$avatar);
    
    $list = array();
    while($stmt->fetch()){
        
    }  


    $query = "select count(*) from t_request_certificate where request_certificate_active = 'Active' and request_certificate_seen = 'Send' ";

    $stmt = $connection->prepare($query);

    $stmt->execute();
    $stmt->bind_result($count);
    while($stmt->fetch()){
        
    }  
    $header  = ' <li class="header">No new request</li>';
    if($count == 0)
    {
        $count = '';

    }
    else
    {
        $header  = ' <li class="header">You have '.$count.' unread request</li>';

    }

    $query = "select request_certificate_purpose,concat(resident_first_name,' ',ifnull(resident_middle_name ,''),' ',resident_last_name) as fullname,request_certificate_id,request_certificate_type,DATE_FORMAT(request_certificate_date_added, '%M %e, %Y')  from t_request_certificate inner join r_resident on resident_id = request_certificate_resident_id where request_certificate_active = 'Active' and    request_certificate_done = 'No' order by request_certificate_date_added desc ";

    $stmt = $connection->prepare($query);

    $stmt->execute();
    $notificationList = '';
    $stmt->bind_result($purpose,$name,$id,$type,$date);
    while($stmt->fetch()){
        $icon = 'clearance.png';
        if($type == 'Indigency')
        {
            $icon = 'indigency.png';

        }
        $notificationList = $notificationList . 
                        "<li><!-- start message -->
                            <a href='#'>
                                <h5>
                                $name
                                <small class='pull-right'><i class='fa fa-calendar-o'></i> $date</small>
                                </h5>
                                <p>$purpose</p>
                            </a>
                        </li>";
        
    }  


    
    

    echo ' 
            <a class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>B</b>IS</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Baranggay</b>IS</span>
            </a>
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </a>
               

                <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="notificationBtn" >
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success" id="countNewNotification">'.$count.'</span>
                        </a>
                    <ul class="dropdown-menu" id="notificationBody">
                       
                    </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../dist/avatar/'.$avatar.'" class="user-image" alt="User Image">
                        <span class="hidden-xs">'.$fullname.'</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                        <img src="../dist/avatar/'.$avatar.'" class="img-circle" alt="User Image">

                        <p>
                            '.$fullname.'
                            
                        </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                            <a href="#">'.$gender.'</a>
                            </div>
                            <div class="col-xs-4 text-center">
                            <a href="#">'.$age.' years old</a>
                            </div>
                            <div class="col-xs-4 text-center">
                            <a href="#">'.$cs.'</a>
                            </div>
                        </div>
                        <!-- /.row -->
                        </li>
                        <div class="text-center ">
                            <a class="btn btn-default btn-flat" id="logoutBtn">Logout</a>
                        </div>
                    </ul>
                    </li>
                </ul>
                </div>
            </nav>';
?>