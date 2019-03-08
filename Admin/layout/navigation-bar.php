<?php

    include_once('../database/connection.php');
    if ($connection->connect_error) 
    {
        die("Connection failed: " . $connection->connect_error);
    } 

   
    $query = "";
    $username = $_SESSION['username'];
    $query = "select resident_gender,resident_civil_status, YEAR(CURRENT_TIMESTAMP) - YEAR(resident_birth_day) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(resident_birth_day, 5)) - 1 as age,concat(resident_first_name,' ',ifnull(resident_middle_name ,''),' ',resident_last_name),resident_avatar from r_resident where resident_id = (SELECT user_resident_id FROM `r_user` where user_username = ?) ";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($gender,$cs,$age,$fullname,$avatar);
    
    $list = array();
    while($stmt->fetch()){
        
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
                    <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                            <li><!-- start message -->
                            <a href="#">
                                <div class="pull-left">
                                <img src="../dist/avatar/'.$avatar.'" class="img-circle" alt="User Image">
                                </div>
                                <h4>
                                Support Team
                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                </h4>
                                <p>Why not buy a new awesome theme?</p>
                            </a>
                            </li>
                            <!-- end message -->
                            <li>
                            <a href="#">
                                <div class="pull-left">
                                <img src="../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                </div>
                                <h4>
                                AdminLTE Design Team
                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                </h4>
                                <p>Why not buy a new awesome theme?</p>
                            </a>
                            </li>
                            <li>
                            <a href="#">
                                <div class="pull-left">
                                <img src="../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                </div>
                                <h4>
                                Developers
                                <small><i class="fa fa-clock-o"></i> Today</small>
                                </h4>
                                <p>Why not buy a new awesome theme?</p>
                            </a>
                            </li>
                            <li>
                            <a href="#">
                                <div class="pull-left">
                                <img src="../dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                </div>
                                <h4>
                                Sales Department
                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                </h4>
                                <p>Why not buy a new awesome theme?</p>
                            </a>
                            </li>
                            <li>
                            <a href="#">
                                <div class="pull-left">
                                <img src="../dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                </div>
                                <h4>
                                Reviewers
                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                </h4>
                                <p>Why not buy a new awesome theme?</p>
                            </a>
                            </li>
                        </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
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