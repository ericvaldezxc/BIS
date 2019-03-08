<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();
    include_once('sessionChecker.php');
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Activity | Baranggay Information System </title>
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
        Activity
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Activity</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Activity List</h3>
              <br/>
              <a class="btn btn-sm btn-success btn-flat residentAdd margin-top-lg" data-toggle="modal" data-target="#addModal">
                <i class="fa fa-plus"></i> Activity
              </a>
            </div>
            <div class="box-body">
              <table class="table dataTable table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Date</th>
                  <th style="width:10%">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Eric Valdez</td>
                  <td>Secret</td>
                  <td class="text-center" style="width:10%">
                    <a class="btn btn-sm btn-info btn-flat residentInfo">
                      <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-sm btn-success btn-flat residentEdit">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-sm btn-danger btn-flat residentDelete">
                      <i class="fa fa-trash-o"></i>
                    </a>
                  </td>
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
            <h4 class="modal-title">Editting Activity</h4>
          </div>
          <div class="modal-body"> 
            <div class="row">
              <div class="col-lg-8">
                Activity Name
                <input class="form-control" type="text" id="nameTxtEdit" placeholder="Enter Activity Name">
              </div>
              <div class="col-lg-4">
                Target Date
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="birthDayDatePckrEdit">
                </div>
              </div>
            </div>
            <div class="row margin-top-md">
              <div class="col-lg-12">
                Description
                <form>
                  <textarea id="editor1Edit" name="editor1Edit" rows="10" cols="80">
                  
                  </textarea>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="editBtn">Save <i class="fa fa-save"></i></button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="addModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Adding New Activity</h4>
          </div>
          <div class="modal-body"> 
            <div class="row">
              <div class="col-lg-8">
                Activity Name
                <input class="form-control" type="text" id="nameTxt" placeholder="Ente Activity Name">
              </div>
              <div class="col-lg-4">
                Target Date
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="birthDayDatePckr">
                </div>
              </div>
            </div>
            <div class="row margin-top-md">
              <div class="col-lg-12">
                Description
                <form>
                  <textarea id="editor1" name="editor1" rows="10" cols="80">
                  
                  </textarea>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success saveBtn">Save <i class="fa fa-save"></i></button>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="modal fade" id="infoModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="box box-widget widget-user-2">
            <div class="widget-user-header bg-blue">
              <h3 class="widget-user-username" id="nameSpan" style="margin-left:0px !important">Nadia Carmichael</h3>
              <h5 class="widget-user-desc" id="aliveSpan" style="margin-left:5px !important">Lead Developer</h5>
            
              <div class="row">
                <div class="col-lg-12" id="descSpan">

                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

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
<!-- CK Editor -->
<script src="../bower_components/ckeditor/ckeditor.js"></script>

<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


<script src="../dist/js/custom.js"></script>
<!-- page script -->
<script>
  $(function () {
    CKEDITOR.replace('editor1')
    CKEDITOR.replace('editor1Edit')
    
    let txtarea = $('.textarea').wysihtml5()

    let table = $('.dataTable').DataTable({ 
        "ajax": {
            "url": "API/showAllActivity.php",
            "type": "post"
        }
    })
    setInterval( function () {
        table.ajax.reload(null, false )
    }, 1000 )

    $('#birthDayDatePckr').datepicker({
      autoclose: true
    })
    $('#birthDayDatePckrEdit').datepicker({
      autoclose: true
    })
    
    
    $.hulla = new hullabaloo();
    

    $('.saveBtn').on('click',() => {
      let name = document.querySelector('#nameTxt').value
      let date = document.querySelector('#birthDayDatePckr').value
      let desc =  CKEDITOR.instances['editor1'].getData()

      $.ajax({
        type:'POST',
        data:{desc:desc,date:date,name:name},
        url:"API/insertActivity.php",
        success: function(result){
          if(result == 'Success'){
            document.querySelector('#nameTxt').value = ""
            document.querySelector('#birthDayDatePckr').value = ""
            CKEDITOR.instances['editor1'].setData("")
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
        url:"API/showActivity.php",
        success: function(result){
          document.querySelector('#nameTxtEdit').value = result.name
          $('#birthDayDatePckrEdit').datepicker('setDate', new Date(result.date));
          CKEDITOR.instances['editor1Edit'].setData(result.desc)
          $('#editBtn').data('id',result.id)
          
          
        },
        error:function(err){
          console.log(err)


        }
      })

    })

    $('#editBtn').on('click',function(){
    
      let name = document.querySelector('#nameTxtEdit').value
      let date = document.querySelector('#birthDayDatePckrEdit').value
      let desc =  CKEDITOR.instances['editor1Edit'].getData()
      let id = $('#editBtn').data('id') 

      $.ajax({
        type:'POST',
        data:{desc:desc,date:date,name:name,id:id},
        url:"API/updateActivity.php",
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
        url:"API/deleteActivity.php",
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

    function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreview').css('background-image', 'url('+e.target.result +')');
              $('#imagePreview').hide();
              $('#imagePreview').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }

    function readURLEdit(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              $('#imagePreviewEdit').css('background-image', 'url('+e.target.result +')');
              $('#imagePreviewEdit').hide();
              $('#imagePreviewEdit').fadeIn(650);
          }
          reader.readAsDataURL(input.files[0]);
      }
    }
    $('.dataTable').on('click','a.itemInfo',function(){
      $('#infoModal').modal('toggle')
      let id = $(this).data('id')
      $.ajax({
        type:'POST',
        data:{id:id},
        dataType:'json',
        url:"API/showActivityProfile.php",
        success: function(result){
          document.querySelector('#descSpan').innerHTML = result.desc 
        
          document.querySelector('#aliveSpan').innerHTML = `on ${result.date}` 
          document.querySelector('#nameSpan').innerHTML = result.name

        },
        error:function(err){
          console.log(err)


        }
      })


    })
    $("#imageUploadEdit").change(function() {
      readURLEdit(this);
    })
    $("#imageUpload").change(function() {
        readURL(this);
    })
  })
</script>
</body>
</html>
