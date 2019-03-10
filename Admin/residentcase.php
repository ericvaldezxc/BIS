
<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();
    include_once('sessionChecker.php');
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Resident Case | Baranggay Information System </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  
  <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="../dist/css/custom/custom.css">
  <link rel="stylesheet/less" type="text/css" href="../dist/less/custom.less" />

  <link rel="icon" href="../dist/img/icon.png">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    
    <!-- Header Navbar: style can be found in header.less -->
    
      <?php 
        include_once('layout/navigation-bar.php');
      ?>

      
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <?php 
        include_once('layout/sidebar.php');
      ?>

    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Resident Case
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-briefcase"></i> Transaction</a></li>
        <li class="active">Resident Case</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Resident Case List</h3>
              <br/>
              <a class="btn btn-sm btn-success btn-flat residentAdd margin-top-lg" data-toggle="modal" data-target="#addModal">
                <i class="fa fa-plus"></i> Resident Case
              </a>
            </div>
            <div class="box-body">
              <table class="table dataTable table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Case</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th style="width:10%">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="modal fade" id="addModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Adding New Resident Case</h4>
          </div>
          <div class="modal-body"> 
            <div class="row">
              <div class="col-lg-8">
                Name
                <select class="form-control select2 " id="nameDrp" style="width: 100%;">
                  <option selected="selected" disabled>Please Select</option>
                  <?php
                    $query = "select resident_id,concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) as fullname from r_resident where resident_active = 'Active' order by concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) asc ";
                    $stmt = $connection->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($id,$name);
                    $option = "";
                    while($stmt->fetch())
                    {
                      $option = $option . "<option value='$id' >$name</option>";
                    }
                    echo $option;
                  ?>
                </select>
              </div>
              <div class="col-lg-4">
                Case
                <select class="form-control select2" id="caseDrp" style="width: 100%;">
                  <option selected="selected" disabled>Please Select</option>
                  <?php
                    $query = "select case_id , case_name from r_case where case_active = 'Active'  ";
                    $stmt = $connection->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($id,$name);
                    $option = "";
                    while($stmt->fetch())
                    {
                      $option = $option . "<option value='$id' >$name</option>";
                    }
                    echo $option;
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success saveBtn">Save <i class="fa fa-save"></i></button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="editModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editting Resident Case</h4>
          </div>
          <div class="modal-body"> 
            <div class="row">
              <div class="col-lg-8">
                Name
                <select class="form-control select2 " id="nameDrpEdit" style="width: 100%;">
                  <option selected="selected" disabled>Please Select</option>
                  <?php
                    $query = "select resident_id,concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) as fullname from r_resident where resident_active = 'Active' order by concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) asc ";
                    $stmt = $connection->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($id,$name);
                    $option = "";
                    while($stmt->fetch())
                    {
                      $option = $option . "<option value='$id' >$name</option>";
                    }
                    echo $option;
                  ?>
                </select>
              </div>
              <div class="col-lg-4">
                Case
                <select class="form-control select2" id="caseDrpEdit" style="width: 100%;">
                  <option selected="selected" disabled>Please Select</option>
                  <?php
                    $query = "select case_id , case_name from r_case where case_active = 'Active'  ";
                    $stmt = $connection->prepare($query);
                    $stmt->execute();
                    $stmt->bind_result($id,$name);
                    $option = "";
                    while($stmt->fetch())
                    {
                      $option = $option . "<option value='$id' >$name</option>";
                    }
                    echo $option;
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success " id="editBtn">Save <i class="fa fa-save"></i></button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="infoModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" id="avatarProfile" alt="User Avatar">
              </div>
              <h3 class="widget-user-username" id="nameSpan">Nadia Carmichael</h3>
              <h5 class="widget-user-desc" id="aliveSpan">Lead Developer</h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li id="genderSpan">
                  <a href="#">Gender <span class="pull-right badge bg-blue" >31</span></a>
                </li>
                <li id="cnSpan">
                  <a href="#">Contact Number <span class="pull-right badge bg-blue" >31</span></a>
                </li>
                <li id="csSpan">
                  <a href="#">Civil Status <span class="pull-right badge bg-blue" >31</span></a>
                </li>
                <li id="bdaySpan">
                  <a href="#">Birth Day <span class="pull-right badge bg-blue" >31</span></a>
                </li>
                <li id="addressSpan">
                  <a href="#">Address <span class="pull-right badge bg-blue" >31</span></a>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
    <?php
      
      include_once('custom.php');
    ?>

</div>

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script src="../dist/js/custom/less.min.js" ></script>
<script src="../dist/js/custom/hullabaloo.js" ></script>
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="../dist/js/custom.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('.select2').select2()

    let table = $('.dataTable').DataTable({ 
        "ajax": {
            "url": "API/showAllResidentCase.php",
            "type": "post"
        }
    })
    setInterval( function () {
        table.ajax.reload(null, false )
    }, 1000 )

    $('#birthDayDatePckr').datepicker({
      autoclose: true
    })
    
    $.hulla = new hullabaloo();
    

    $('.saveBtn').on('click',() => {
      let name = document.querySelector('#nameDrp').value
      let baranggayCase = document.querySelector('#caseDrp').value

      $.ajax({
        type:'POST',
        data:{name:name,case:baranggayCase},
        url:"API/insertResidentCase.php",
        success: function(result){
          if(result == 'Success'){
            document.querySelector('#nameDrp').value = ""
            document.querySelector('#caseDrp').value = ""
            $('#addModal').modal('toggle')
            $.hulla.send("Successfully Added", "success");
          }
          else{
            $.hulla.send("Error encountered while adding the data\nPlease try again", "danger");
          }
        },
        error:function(err){
          $.hulla.send("Error encountered ", "danger");


        }
      })
    })


    $('.dataTable').on('click','a.itemEdit',function(){
      $('#editModal').modal('toggle')
      let id = $(this).data('id')
      $.ajax({
        type:'POST',
        data:{id:id},
        dataType:'json',
        url:"API/showResidentCase.php",
        success: function(result){
          document.querySelector('#caseDrpEdit').value = result.case
          document.querySelector('#nameDrpEdit').value = result.name
          $('#caseDrpEdit').trigger('change')
          $('#nameDrpEdit').trigger('change')
          $('#editBtn').data('id',result.id)
          
          
        },
        error:function(err){
          console.log(err)


        }
      })

    })

    $('#editBtn').on('click',function(){
    
      let baranggayCase = document.querySelector('#caseDrpEdit').value
      let name = document.querySelector('#nameDrpEdit').value
      let id = $('#editBtn').data('id') 

      $.ajax({
        type:'POST',
        data:{case:baranggayCase,name:name,id:id},
        url:"API/updateResidentCase.php",
        success: function(result){
          if(result == 'Success'){
            $('#editModal').modal('toggle')
            $.hulla.send("Successfully Updated", "success");
          }
          else{
            $.hulla.send("Error encountered while updating the data\nPlease try again", "danger");
          }
        },
        error:function(err){
          console.log(err)


        }
      })



    })

    $('.dataTable').on('click','a.itemDelete',function(){
      
      let id = $(this).data('id') 

      $.ajax({
        type:'POST',
        data:{id:id},
        url:"API/deleteResidentCase.php",
        success: function(result){
          if(result == 'Success'){
            $.hulla.send("Successfully Deleted", "success");
          }
          else{
            $.hulla.send("Error encountered", "danger");
          }
        },
        error:function(err){
          console.log(err)


        }
      })



    })

    $('.dataTable').on('click','a.itemSolved',function(){
      
      let id = $(this).data('id') 

      $.ajax({
        type:'POST',
        data:{id:id},
        url:"API/solvedResidentCase.php",
        success: function(result){
          if(result == 'Success'){
            $.hulla.send("Case Solved", "success");
          }
          else{
            $.hulla.send("Error encountered", "danger");
          }
        },
        error:function(err){
          console.log(err)


        }
      })



    })

    
    $('.dataTable').on('click','a.itemInfo',function(){
      $('#infoModal').modal('toggle')
      let id = $(this).data('id')
      $.ajax({
        type:'POST',
        data:{id:id},
        dataType:'json',
        url:"API/showCaseProfile.php",
        success: function(result){
          document.querySelector('#genderSpan').innerHTML = `<a href="#">Gender <span class="pull-right badge bg-blue" >${result.gender}</span></a>` 
        
          document.querySelector('#aliveSpan').innerHTML = `${result.pos} - ${result.term}` 

          document.querySelector('#cnSpan').innerHTML = `<a href="#">Contact Number <span class="pull-right badge bg-blue" >${result.cn}</span></a>` 
          document.querySelector('#csSpan').innerHTML = `<a href="#">Civil Status <span class="pull-right badge bg-blue" >${result.cs}</span></a>` 
          document.querySelector('#bdaySpan').innerHTML = `<a href="#">Birth Day <span class="pull-right badge bg-blue" >${result.bday}</span></a>`  
          document.querySelector('#addressSpan').innerHTML = `<a href="#">Address <span class="pull-right badge bg-blue" >${result.address}</span></a>`
          document.querySelector('#nameSpan').innerHTML = result.fullname
          $("#avatarProfile").attr("src",`../dist/avatar/${result.avatar}`)

        },
        error:function(err){
          console.log(err)


        }
      })


    })
  })
</script>
</body>
</html>
