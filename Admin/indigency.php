
<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();
    include_once('sessionChecker.php');
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Indigency | Baranggay Information System </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
  
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
      Indigency
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-print"></i> Reports</a></li>
        <li class="active">Indigency</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Indigency Records</h3>
              <br/>
              <a class="btn btn-sm btn-success btn-flat residentAdd margin-top-lg" data-toggle="modal" data-target="#addModal">
                <i class="fa fa-plus"></i> Generate
              </a>

            </div>
            <div class="box-body">
              <table class="table dataTable table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Control Number</th>
                  <th>Name</th>
                  <th>Alive</th>
                  <th>Purpose</th>
                  <th>Date</th>
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
    <div class="modal fade" id="generateModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Generate Indigency</h4>
          </div>
          <div class="modal-body"> 
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="">Generate <i class="fa fa-download"></i></button>
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
            <h4 class="modal-title">Generate Indigency</h4>
          </div>
          <div class="modal-body"> 
            <div class="row">
              <div class="col-lg-8">
                Name
                <select class="form-control select2 " id="nameDrp" style="width: 100%;">
                  <option selected="selected" disabled>Please Select</option>
                  <?php
                    $query = "select resident_id,concat(resident_first_name,' ',ifnull(resident_middle_name ,''),' ',resident_last_name) as fullname from r_resident where resident_active = 'Active' and (select count(*) from t_resident_case where resident_case_status = 'Pending' and resident_case_resident_id = resident_id and resident_case_active = 'Active') = 0 order by concat(resident_last_name,', ',resident_first_name,' ',ifnull(resident_middle_name ,'')) asc ";
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
                Purpose
                <input class="form-control" maxlength="15" id="purposeTxt"  type="text" placeholder="Enter Purpose">
              </div>
            </div>
            <div class="row margin-top-sm">
              <div class="col-lg-12">
                Remarks
                <textarea class="form-control" rows="3"  id="remarksTxt" placeholder="Enter Remarks"></textarea>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="generateBtn">Generate <i class="fa fa-download"></i></button>
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
<script src="../dist/js/custom.js"></script>
<script src="../dist/js/custom/jspdf.min.js"></script>
<script src="../bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- page script -->
<script>
  $(function () {
    let table = $('.dataTable').DataTable({ 
        "ajax": {
            "url": "API/showAllIndigencyRecord.php",
            "type": "post"
        }
    })
    setInterval( function () {
        table.ajax.reload(null, false )
    }, 1000 )

    $('.select2').select2()
    $.hulla = new hullabaloo()
    
    $('.dataTable').on('click','a.generate',function(){
      let id = $(this).data('id')
      $('#generateModal').modal('toggle')
      
     
      // $.ajax({
      //   type:'POST',
      //   data:{id:id},
      //   dataType:'json',
      //   url:"API/showResident.php",
      //   success: function(result){
      //     document.querySelector('#fnameTxtEdit').value = result.fname
      //     document.querySelector('#mnameTxtEdit').value = result.mname
      //     document.querySelector('#lnameTxtEdit').value = result.lname
      //     document.querySelector('#cnTxtEdit').value = result.cn
      //     $('#birthDayDatePckrEdit').datepicker('setDate', new Date(result.bday));
      //    if(result.gender == "Male")
      //       document.querySelector('#maleRdbtnEdit').checked = true
      //     else
      //       document.querySelector('#femaleRdbtnEdit').checked = true

      //     document.querySelector('#addressTxtEdit').value = result.address
      //     document.querySelector('#civilStatusDrpEdit').value = result.cs
      //     document.querySelector('#imageUploadEdit').value = ""
      //     $('#editBtn').data('id',result.id) 
      //     $('#editBtn').data('avatar',result.avatar) 

      //     document.querySelector('#imagePreviewEdit').style.backgroundImage = `url('../dist/avatar/${result.avatar}')`;
          
      //   },
      //   error:function(err){
      //     console.log(err)


      //   }
      // })

    })

    function openDataUriWindow(url) {
        var html = '<html>' +
            '<style>html, body { padding: 0; margin: 0; } iframe { width: 100%; height: 100%; border: 0;}  </style>' +
            '<body>' +
            '<iframe src="' + url + '"></iframe>' +
            '</body></html>';
        a = window.open();
        a.document.write(html);
    }
    

    $('#generateBtn').on('click',function(){
        let remarks = $('#remarksTxt').val()
        let purpose = $('#purposeTxt').val()
        let name = $('#nameDrp').val()
        $.ajax({
          type:'POST',
          data:{purpose:purpose,remarks:remarks,name:name},
          dataType:'json',
          url:"API/generateIndigency.php",
          success: function(results){
            $('#remarksTxt').val('')
            $('#purposeTxt').val('')
            $('#nameDrp').val('')
            $('#nameDrp').trigger('change')
            
            for(result of results){
              let residentName = result.Name
              var doc = new jsPDF('p', 'pt', 'letter');
              let residentAddress = result.Address
              let residentDOB= result.DOB
              let residentPOB = result.POB
              let residentPurpose = result.Purpose
              let residentRemarks = result.Remarks
              var avatar = new Image();
              avatar.src = "../dist/avatar/"+result.Avatar
              // avatar.src = "../dist/avatar/default-user.png"
              let controlNumber = result.ControlNumber
              let dateIssue = result.DateIssue
              let baranggayCaptain = result.Captain
              let baranggaySecretary = result.Secretary
              let baranggayTreasurer = result.Treasurer
              let baranggayName = result.BarrangayName
              let address = result.BaranggayAddress
              let gender = "Ms."
              if(result.gender == "Male")
                gender = "Mr."

        var breaker = '_______________________________________________________________________'
        let baranggayMembers =  result.Members
        // let baranggayMembers = [ 
        //                           'RYAN PETER S. MALANGEN',
        //                           'TERESITA N. MONFORTE',
        //                           'TERRENCE T. SANTOS',
        //                           'WILFRED F. LEE',
        //                           'ERLINDA G. AMOR',
        //                           'ANNABEL F. MORALES-MARTIN',
        //                           'JOENER A. LETADA'
                                
        //                         ]



        doc.setFontType("normal");
        doc.setFontSize(14.5);
        doc.text(15,15,breaker)
        let base = 35

        doc.setFontSize(8);
        doc.setFontType("bold");
        let header1 = "Republika ng Pilipinas",
            xOffset3 = (doc.internal.pageSize.width / 2) - (doc.getStringUnitWidth(header1) * doc.internal.getFontSize() / 2); 
        doc.text(header1, xOffset3, base-3);
        base = base + 5

        
        doc.setFontSize(14.5);

        let name = baranggayName,
            xOffset = (doc.internal.pageSize.width / 2) - (doc.getStringUnitWidth(name) * doc.internal.getFontSize() / 2); 
        doc.text(name, xOffset, base+5);
        base = base + 5


        doc.setFontType("italic");
        doc.setFontSize(8);
        let add = address,
            xOffset2 = (doc.internal.pageSize.width / 2) - (doc.getStringUnitWidth(add) * doc.internal.getFontSize() / 2); 
        doc.text(add, xOffset2, base+10);
        base = base+10

        doc.setFontType("italic");
        doc.setFontSize(8);
        let header2 = "OFFICE OF THE BARANGAY CAPTAIN";
        let header2Offset2 = (doc.internal.pageSize.width / 2) - (doc.getStringUnitWidth(header2) * doc.internal.getFontSize() / 2); 
        doc.text(header2, header2Offset2, base+10);
        base = base+10

        doc.setFontType("normal");
        doc.setFontSize(14.5);
        doc.text(15,base+5,breaker)
        base = base+5

        doc.setFontType("bold");
        doc.setFontSize(14.5);
        let header3 = "CERTIFICATE OF INDIGENCY";
        let header3Offset = (doc.internal.pageSize.width / 2) - (doc.getStringUnitWidth(header3) * doc.internal.getFontSize() / 2); 
        doc.text(header3, header3Offset, base+40);
        base = base+40

        doc.setFillColor(240, 229, 229);
        doc.rect(150, 130, 440, 300, 'FD');


        doc.setFontType("normal");
        doc.setFontSize(12);
        // let header4 = "TO WHOM IT MAY CONCERN:";
        // doc.text(header4, 155, base+40);
        base = base+45

        doc.setFontType("italic");
        doc.setFontSize(10.5);

        let header5 = "This is to certify that " + gender +" " + residentName + " is a bona fide resident" 
        doc.text(header5, 165, base+15);
        base = base+15

        let header6 = "of " + address +""
        doc.text(header6, 165, base+15);
        base = base+15
      
        let header7 = "This will further certify that " + gender + " and family are among the indigent "
        doc.text(header7, 165, base+15);
        base = base+15
        header7 = "residents of this barangay"
        doc.text(header7, 165, base+15);
        base = base+20


        doc.text("This certification is issued upon the request of " + gender + " " + residentName +" as a", 165, base+40);
        doc.text("requirement for availing " + purpose, 165, base+55);
        doc.text("Issued this " + dateIssue + " at " + baranggayName, 165, base+85);



        // doc.setTextColor(0,136,204);



        doc.setFillColor(240, 229, 229);
        doc.rect(20, 130, 130, 300, 'FD');

        doc.setTextColor(0,0,0);
        doc.setFontSize(8); 	
        let bcOffset = (170 / 2) - (doc.getStringUnitWidth(baranggayCaptain) * doc.internal.getFontSize() / 2); 
        doc.text(baranggayCaptain, bcOffset, 150);

        doc.setFontSize(7); 	
        let bcOffset2 = (170 / 2) - (doc.getStringUnitWidth("PUNONG BARANGAY") * doc.internal.getFontSize() / 2); 

        doc.text("PUNONG BARANGAY", bcOffset2, 160);

        doc.setFontSize(8); 	
        doc.text("MGA KAGAWAD", bcOffset2, 180);
        
        let memberBase = 200
        for(member of baranggayMembers){
          let rowOffset = (170 / 2) - (doc.getStringUnitWidth(member) * doc.internal.getFontSize() / 2); 
          doc.text(member, rowOffset, memberBase);
          memberBase = memberBase + 20
        }

        doc.setTextColor(0,0,0);
        doc.setFontSize(8); 	

        let rowOffset = (170 / 2) - (doc.getStringUnitWidth(baranggaySecretary) * doc.internal.getFontSize() / 2); 

        doc.text(baranggaySecretary, rowOffset, memberBase+15);
        memberBase = memberBase + 15
        doc.setFontSize(7); 	
        doc.text("Barangay Secretary", bcOffset2, memberBase+10);
        memberBase = memberBase + 20

        doc.setTextColor(0,0,0);
        doc.setFontSize(8); 	
        rowOffset = (170 / 2) - (doc.getStringUnitWidth(baranggayTreasurer) * doc.internal.getFontSize() / 2); 
        doc.text(baranggayTreasurer, rowOffset, memberBase+15);
        memberBase = memberBase + 15
        doc.setFontSize(7); 	
        doc.text("Barangay Treasurer", bcOffset2, memberBase+10);

        doc.setFontSize(11); 	
        let newTitle = "HON." + result.Captain
        rowOffset = (doc.internal.pageSize.width / 2) - (doc.getStringUnitWidth(newTitle) * doc.internal.getFontSize() / 2); 

        doc.text(newTitle, rowOffset, 480);

        doc.setFontSize(9); 	
        doc.setFontType("italic");
        newTitle = "Punong Barangay" 
        rowOffset = (doc.internal.pageSize.width / 2) - (doc.getStringUnitWidth(newTitle) * doc.internal.getFontSize() / 2); 
        doc.text(newTitle, rowOffset, 495);

        specialElementHandlers = {
          '#bypassme': function(element, renderer){
            return true
          }
        }

        var myImage = new Image();
        myImage.src =  "../dist/img/qc.png";
        
        if(result.Avatar!= 'default-user.png'){
          avatar.onload = function(){
            myImage.onload = function(){
              doc.addImage(myImage , 'png', 520, 20, 50, 50);
              doc.addImage(avatar , 'png', 490, 160, 75, 75);
              // var uri = doc.output('dataurlstring');
              // openDataUriWindow(uri);
              doc.save(result.fileName+'.pdf');
              $.hulla.send("Successfully Generated", "success");


              
          
          
          };

            
          
        };

        }
        else{
          myImage.onload = function(){
              doc.addImage(myImage , 'png', 520, 20, 50, 50);
              // var uri = doc.output('dataurlstring');
              // openDataUriWindow(uri);
              doc.save(result.fileName+'.pdf');
              $.hulla.send("Successfully Generated", "success");

              //  var blob = doc.output('blob');
              
              // var formData = new FormData()
              // formData.append('pdf', blob)

              // let form_data = new FormData();
              // form_data.append("fname", "erc")

              // $.ajax({
              //   type:'POST',
              //   data:formData,
              //   contentType: false,
              //   cache: false,
              //   processData: false,
              //   url:"API/savePDF.php",
              //   success: function(result){
              //     alert('done')
              //   },
              //   error:function(err){
              //     console.log(err)
              //   }
              // })
              
          
        }
      }

            }
           
            
           
            
          },
          error:function(err){
            $.hulla.send("Error encountered ", "danger");


          }
      })

        // let residentName = "ANGELICA MAE P. BANZON"
        // let residentAddress = "28 PALANZA STREET"
        // let residentDOB= "September 12, 1995"
        // let residentPOB = "MANILA"
        // let residentPurpose = "RESIDENCY"
        // let residentRemarks = "No deragatory record on file as of date"
        // var avatar = new Image();
        // avatar.src = "../dist/img/icon.png"
        // let controlNumber = "BC-0017841"
        // let dateIssue = "12/08/2019"
        // let baranggayCaptain = "FERDINAND C. UBALDO"
        // let baranggaySecretary = "EVANGELYN E. ALARCIO"
        // let baranggayTreasurer = "IMELDA E. ALAS"
        // let baranggayName = 'Baranggay Doña Imelda'
        // let address = "145 Bayani Cor. Guirayan St., Area 22, District IV, Quezon City";


        

        
      

    })
  })
</script>
</body>
</html>
