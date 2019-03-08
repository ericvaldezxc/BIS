
<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();
    include_once('sessionChecker.php');
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Resident | Baranggay Information System </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  
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
        Resident
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Residents</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Resident List</h3>
              <br/>
              <a class="btn btn-sm btn-success btn-flat residentAdd margin-top-lg" data-toggle="modal" data-target="#addModal">
                <i class="fa fa-plus"></i> Resident
              </a>
            </div>
            <div class="box-body">
              <table class="table dataTable table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Alive</th>
                  <th style="width:10%">Case</th>
                  <th style="width:10%">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Eric Valdez</td>
                  <td>Secret</td>
                  <td>Yes</td>
                  <td class="text-center" style="width:10%">
                    <a class="btn btn-sm btn-danger btn-flat">Number of Case <span class="badge">7</span></a>
                  </td>
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
    <div class="modal fade" id="addModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Adding New Resident</h4>
          </div>
          <div class="modal-body"> 
            <div class="row">
              <div class="col-lg-8">
                <div class="row margin-top-md">
                  <div class="col-lg-12">
                    <input class="form-control" type="text" id="fnameTxt" placeholder="First Name">
                  </div>
                </div>
                <div class="row margin-top-sm">
                  <div class="col-lg-12">
                    <input class="form-control" type="text" id="mnameTxt" placeholder="Middle Name">
                  </div>
                </div>
                <div class="row margin-top-sm">
                  <div class="col-lg-12">
                    <input class="form-control" type="text" id="lnameTxt" placeholder="Last Name">
                  </div>
                </div>                
              </div>
              <div class="col-lg-4">
                <div class="avatar-upload">
                  <div class="avatar-edit">
                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                  </div>
                  <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url(../dist/avatar/default-user.png);"></div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="row margin-top-sm">
              <div class="col-lg-6">
                <input class="form-control" maxlength="15" id="cnTxt"  type="text" placeholder="Contact Number">
              </div>
              <div class="col-lg-6">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="birthDayDatePckr">
                </div>
              </div>            
            </div>
            <div class="row margin-top-sm">
              <div class="col-lg-6">
                <select class="form-control" id="civilStatusDrp">
                  <option selected>Single</option>
                  <option>Married</option>
                  <option>Seperated</option>
                  <option>Widowed</option>
                  <option>Divorced</option>
                </select>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadios" id="maleRdbtn" checked>
                      Male
                    </label>
                    <label>
                      <input type="radio" name="optionsRadios" >
                      Female
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row margin-top-sm">
              <div class="col-lg-12">
                <textarea class="form-control" rows="3"  id="addressTxt" placeholder="Address"></textarea>
              </div>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
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
            <h4 class="modal-title">Edit Resident</h4>
          </div>
          <div class="modal-body"> 
            <div class="row">
              <div class="col-lg-8">
                <div class="row margin-top-md">
                  <div class="col-lg-12">
                    <input class="form-control" type="text" id="fnameTxtEdit" placeholder="First Name">
                  </div>
                </div>
                <div class="row margin-top-sm">
                  <div class="col-lg-12">
                    <input class="form-control" type="text" id="mnameTxtEdit" placeholder="Middle Name">
                  </div>
                </div>
                <div class="row margin-top-sm">
                  <div class="col-lg-12">
                    <input class="form-control" type="text" id="lnameTxtEdit" placeholder="Last Name">
                  </div>
                </div>                
              </div>
              <div class="col-lg-4">
                <div class="avatar-upload">
                  <div class="avatar-edit">
                    <input type='file' id="imageUploadEdit" accept=".png, .jpg, .jpeg" />
                    <label for="imageUploadEdit"></label>
                  </div>
                  <div class="avatar-preview">
                    <div id="imagePreviewEdit" style="background-image: url(../dist/avatar/default-user.png);"></div>
                  </div>
                </div>
              </div>
            </div> 
            <div class="row margin-top-sm">
              <div class="col-lg-6">
                <input class="form-control" maxlength="15" id="cnTxtEdit"  type="text" placeholder="Contact Number">
              </div>
              <div class="col-lg-6">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="birthDayDatePckrEdit">
                </div>
              </div>            
            </div>
            <div class="row margin-top-sm">
              <div class="col-lg-6">
                <select class="form-control" id="civilStatusDrpEdit">
                  <option selected>Single</option>
                  <option>Married</option>
                  <option>Seperated</option>
                  <option>Widowed</option>
                  <option>Divorced</option>
                </select>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="optionsRadiosEdit" id="maleRdbtnEdit" checked="">
                      Male
                    </label>
                    <label>
                      <input type="radio" name="optionsRadiosEdit" id="femaleRdbtnEdit">
                      Female
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row margin-top-sm">
              <div class="col-lg-12">
                <textarea class="form-control" rows="3"  id="addressTxtEdit" placeholder="Address"></textarea>
              </div>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" id="editBtn" >Save <i class="fa fa-save"></i></button>
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
              <li id="caseSpan">
                  <a href="#">Unsolved Case <span class="pull-right badge bg-blue" >31</span></a>
                </li>
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
<script src="../dist/js/custom.js"></script>
<!-- page script -->
<script>
  $(function () {
    let table = $('.dataTable').DataTable({ 
        "ajax": {
            "url": "API/showAllResident.php",
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
      let fname = document.querySelector('#fnameTxt').value
      let mname = document.querySelector('#mnameTxt').value
      let lname = document.querySelector('#lnameTxt').value
      let cn = document.querySelector('#cnTxt').value
      let bday = document.querySelector('#birthDayDatePckr').value
      let isMale= document.querySelector('#maleRdbtn').checked
      let address = document.querySelector('#addressTxt').value
      let civilStatus = document.querySelector('#civilStatusDrp').value
      let image = document.querySelector('#imageUpload').value;
      let form_data = new FormData();
      form_data.append("fname", fname)
      form_data.append("mname", mname)
      form_data.append("lname", lname)
      form_data.append("cn", cn)
      form_data.append("bday", bday)
      form_data.append("isMale", isMale)
      form_data.append("address", address)
      form_data.append("civilStatus", civilStatus)


      if(document.getElementById("imageUpload").files[0]){
        let name = document.getElementById("imageUpload").files[0].name
        
        let ext = name.split('.').pop().toLowerCase();
        if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
        {
          alert("Invalid Image File")
        }
        let oFReader = new FileReader()
        oFReader.readAsDataURL(document.getElementById("imageUpload").files[0])
        let f = document.getElementById("imageUpload").files[0]
        let fsize = f.size||f.fileSize
        if(fsize > 2000000)
        {
          alert("Image File Size is very big")
        }
        else
        {
          form_data.append("file", document.getElementById('imageUpload').files[0])
          form_data.append("image", "Yes")

        }

      }
      else{
        form_data.append("file", "");
        form_data.append("image", "No")
        
      }
      

      $.ajax({
        type:'POST',
        data:form_data,
        contentType: false,
        cache: false,
        processData: false,
        url:"API/insertResident.php",
        success: function(result){
          if(result == 'Success'){
            
            document.querySelector('#fnameTxt').value = ""
            document.querySelector('#mnameTxt').value = ""
            document.querySelector('#lnameTxt').value = ""
            document.querySelector('#cnTxt').value = ""
            document.querySelector('#birthDayDatePckr').value = ""
            document.querySelector('#maleRdbtn').checked = true
            document.querySelector('#addressTxt').value = ""
            document.querySelector('#civilStatusDrp').value = "Single"
            document.querySelector('#imageUpload').value = ""
            document.querySelector('#imagePreview').style.backgroundImage = "url('../dist/avatar/default-user.png')";
            $('#addModal').modal('toggle')
            $.hulla.send("Successfully Added", "success");
          }
          else{
            $.hulla.send("Error encountered while adding the data\nPlease try again", "danger");
          }
        },
        error:function(err){
          console.log(err)


        }
      })
    })


    $('.dataTable').on('click','a.residentEdit',function(){
      $('#editModal').modal('toggle')
      let id = $(this).data('id')
      $.ajax({
        type:'POST',
        data:{id:id},
        dataType:'json',
        url:"API/showResident.php",
        success: function(result){
          document.querySelector('#fnameTxtEdit').value = result.fname
          document.querySelector('#mnameTxtEdit').value = result.mname
          document.querySelector('#lnameTxtEdit').value = result.lname
          document.querySelector('#cnTxtEdit').value = result.cn
          $('#birthDayDatePckrEdit').datepicker('setDate', new Date(result.bday));
         if(result.gender == "Male")
            document.querySelector('#maleRdbtnEdit').checked = true
          else
            document.querySelector('#femaleRdbtnEdit').checked = true

          document.querySelector('#addressTxtEdit').value = result.address
          document.querySelector('#civilStatusDrpEdit').value = result.cs
          document.querySelector('#imageUploadEdit').value = ""
          $('#editBtn').data('id',result.id) 
          $('#editBtn').data('avatar',result.avatar) 

          document.querySelector('#imagePreviewEdit').style.backgroundImage = `url('../dist/avatar/${result.avatar}')`;
          
        },
        error:function(err){
          console.log(err)


        }
      })

    })

    $('#editBtn').on('click',function(){
      let fname = document.querySelector('#fnameTxtEdit').value
      let mname = document.querySelector('#mnameTxtEdit').value
      let lname = document.querySelector('#lnameTxtEdit').value
      let cn = document.querySelector('#cnTxtEdit').value
      let bday = document.querySelector('#birthDayDatePckrEdit').value
      let isMale= document.querySelector('#maleRdbtnEdit').checked
      let address = document.querySelector('#addressTxtEdit').value
      let civilStatus = document.querySelector('#civilStatusDrpEdit')
      .value
      let image = document.querySelector('#imageUploadEdit').value;
      let form_data = new FormData();
      let avatarName = $('#editBtn').data('avatar')
      avatarName = avatarName.substr(0,avatarName.indexOf('.')) 
      let id = $('#editBtn').data('id') 

      
      form_data.append("fname", fname)
      form_data.append("mname", mname)
      form_data.append("lname", lname)
      form_data.append("id", id)
      form_data.append("cn", cn)
      form_data.append("bday", bday)
      form_data.append("isMale", isMale)
      form_data.append("address", address)
      form_data.append("avatarName", avatarName)
      form_data.append("civilStatus", civilStatus)

      if(document.getElementById("imageUploadEdit").files[0]){
        let name = document.getElementById("imageUploadEdit").files[0].name
        
        let ext = name.split('.').pop().toLowerCase();
        if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
        {
          alert("Invalid Image File")
        }
        let oFReader = new FileReader()
        oFReader.readAsDataURL(document.getElementById("imageUploadEdit").files[0])
        let f = document.getElementById("imageUploadEdit").files[0]
        let fsize = f.size||f.fileSize
        if(fsize > 2000000)
        {
          alert("Image File Size is very big")
        }
        else
        {
          form_data.append("file", document.getElementById('imageUploadEdit').files[0])
          form_data.append("image", "Yes")

        }

      }
      else{
        form_data.append("file", "");
        form_data.append("image", "No")
        
      }

      $.ajax({
        type:'POST',
        data:form_data,
        contentType: false,
        cache: false,
        processData: false,
        url:"API/updateResident.php",
        success: function(result){
          if(result == 'Success'){
            
            document.querySelector('#fnameTxtEdit').value = ""
            document.querySelector('#mnameTxtEdit').value = ""
            document.querySelector('#lnameTxtEdit').value = ""
            document.querySelector('#cnTxtEdit').value = ""
            document.querySelector('#birthDayDatePckrEdit').value = ""
            document.querySelector('#maleRdbtnEdit').checked = true
            document.querySelector('#addressTxtEdit').value = ""
            document.querySelector('#civilStatusDrpEdit').value = "Single"
            document.querySelector('#imageUploadEdit').value = ""
            document.querySelector('#imagePreviewEdit').style.backgroundImage = "url('../dist/avatar/default-user.png')";
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

    $('.dataTable').on('click','a.residentDelete',function(){
      
      let id = $(this).data('id') 

      $.ajax({
        type:'POST',
        data:{id:id},
        url:"API/deleteResident.php",
        success: function(result){
          if(result == 'Success'){
            $.hulla.send("Successfully Deleted", "success");
          }
          else{
            $.hulla.send("Error encountered while deleting the data\nPlease try again", "danger");
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
    $('.dataTable').on('click','a.residentInfo',function(){
      $('#infoModal').modal('toggle')
      let id = $(this).data('id')
      $.ajax({
        type:'POST',
        data:{id:id},
        dataType:'json',
        url:"API/showResident.php",
        success: function(result){
          document.querySelector('#caseSpan').innerHTML =  `<a href="#">Address <span class="pull-right badge bg-blue" >0</span></a>`
          document.querySelector('#genderSpan').innerHTML = `<a href="#">Gender <span class="pull-right badge bg-blue" >${result.gender}</span></a>` 
          if(result.alive == 'Yes')
            document.querySelector('#aliveSpan').innerHTML = 'Alive'
          else
            document.querySelector('#aliveSpan').innerHTML = 'Dead'

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
