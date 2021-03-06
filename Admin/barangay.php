<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();
    include_once('sessionChecker.php');
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Barangay | Baranggay Information System </title>
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

  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="icon" href="../dist/img/icon.png">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    
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
        Barangay
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-wrench"></i> System Setup</a></li>
        <li class="active">Barangay</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              
            </div>
            <div class="box-body">
              <table class="table dataTable table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Latitude</th>
                  <th>Long</th>
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
    <div class="modal fade" id="editModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Editting Barangay</h4>
          </div>
          <div class="modal-body"> 
            <div class="row">
              <div class="col-lg-8">
                Name
                <input class="form-control" type="text" id="nameTxtEdit" placeholder="Enter Name">
              </div>
            </div>
            <div class="row margin-top-md">
              <div class="col-lg-6">
                Latitude
                <input class="form-control" type="text" id="latitudeTxt" placeholder="Enter Latitude">
              </div>
              <div class="col-lg-6">
                Longitude
                <input class="form-control" type="text" id="longitudeTxt" placeholder="Enter Longitude">
              </div>
            </div>
            <div class="row margin-top-md">
              <div class="col-lg-12">
                Address
                <textarea class="form-control" id="addressTxt" value="" placeholder="Enter Address" >
                
                </textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="editBtn">Save <i class="fa fa-save"></i></button>
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
<script src="../dist/js/custom.js" ></script>
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- CK Editor -->
<script src="../bower_components/ckeditor/ckeditor.js"></script>

<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


<script src="../dist/js/custom.js"></script>
<div class="modal" id="changePasswordModal">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Change Password</h4>
              </div>
              <div class="modal-body"> 
                  <div class="row">
                      <div class="col-lg-8">
                          New Password
                          <input class="form-control" type="password" id="passwordText" >
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-success" id="savePasswordBtn">Save <i class="fa fa-save"></i></button>
              </div>
          </div>
      </div>
  </div>
<!-- page script -->
<script>
  $(function () {

    let table = $('.dataTable').DataTable({ 
        "ajax": {
            "url": "API/showBarangay.php",
            "type": "post"
        },
        "searching": false,
        "paging": false,
        "ordering": false,
        "info":     false
        
    })
    setInterval( function () {
        table.ajax.reload(null, false )
    }, 1000 )

    
    $.hulla = new hullabaloo();
    
    $('.dataTable').on('click','a.itemEdit',function(){
      $('#editModal').modal('toggle')
      
      let id = $(this).data('id')
      $('#editBtn').data('id',id)
      let name = $(this).closest('tr').children('td:first').text()
      let address = $(this).closest('tr').children('td:eq(1)').text()
      let lat = $(this).closest('tr').children('td:eq(2)').text()
      let long = $(this).closest('tr').children('td:eq(3)').text()
      $('#nameTxtEdit').val(name) 
      $('#addressTxt').val(address) 
      $('#longitudeTxt').val(long) 
      $('#latitudeTxt').val(lat) 

    })

    $('#editBtn').on('click',function(){
    
      let name = $('#nameTxtEdit').val() 
      let address = $('#addressTxt').val()
      let long = $('#longitudeTxt').val() 
      let lat = $('#latitudeTxt').val() 
      let id = $('#editBtn').data('id') 
      

      $.ajax({
        type:'POST',
        data:{long:long,lat:lat,address:address,name:name,id:id},
        url:"API/updateBarangay.php",
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

  })
</script>
</body>
</html>
