$('#logoutBtn').on('click',function(){
    $.ajax({
        type:'POST',
        url:"../Controller/LogoutController.php",
        success: function(result){
          window.location.replace("../index.php");
        }
        
      })

})


let title = document.title
if(title == "Barangay | Baranggay Information System"){
  $('#sysSetup').addClass('active')
  $('#barangay').addClass('active')
  
}
else if(title == "Case | Baranggay Information System"){
  $('#sysSetup').addClass('active')
  $('#case').addClass('active')
  
}
else if(title == "Officer Position | Baranggay Information System"){
  $('#sysSetup').addClass('active')
  $('#officerPosition').addClass('active')
  
}
else if(title == "Term | Baranggay Information System"){
  $('#sysSetup').addClass('active')
  $('#term').addClass('active')
  
}
else if(title == "User | Baranggay Information System"){
  $('#sysSetup').addClass('active')
  $('#user').addClass('active')
  
}

else if(title == "Resident | Baranggay Information System"){
  $('#transaction').addClass('active')
  $('#resident').addClass('active')
  
}
else if(title == "Resident Case | Baranggay Information System"){
  $('#transaction').addClass('active')
  $('#residentCase').addClass('active')
  
}
else if(title == "Officer | Baranggay Information System"){
  $('#transaction').addClass('active')
  $('#officer').addClass('active')
  
}
else if(title == "Activity | Baranggay Information System"){
  $('#transaction').addClass('active')
  $('#activity').addClass('active')
  
}
else if(title == "Clearance | Baranggay Information System"){
  $('#report').addClass('active')
  $('#clearance').addClass('active')
  
}
else if(title == "Indigency | Baranggay Information System"){
  $('#report').addClass('active')
  $('#indigency').addClass('active')
  
}
else if(title == "Dashboard | Baranggay Information System"){
  $('#dashboard').addClass('active')
  
}

$('#notificationBtn').on('click',function(){
    $.ajax({
      type:'POST',
      url:"../Controller/NotificationController.php",
      success: function(result){
          if(result == 'Success'){
              
          }
          else{
              
          }
      },
      error:function(err){

      }
  })

})

window.setInterval(function(){
  fillNotification()
}, 1000);

function fillNotification(){
    $.ajax({
      type:'POST',
      url:"../Admin/API/fillNotification.php",
      dataType:"json",
      success: function(result){
        $('#notificationBody').html(result.Notification)
        $('#countNewNotification').html(result.NewNotification)
        // $('#notificationHeader').html(result.Header)
      },
      error:function(err){

      }
  })

}

$('#notificationBody').on('click',' a.clearanceBtn',function(){
  $('#notificationModal').modal('toggle')
  let type = $(this).data('type')
  let name = $(this).data('name')
  let date = $(this).data('date')
  let purpose = $(this).data('purpose')
  let residentId = $(this).data('resident-id')
  let id = $(this).data('id')
  $('#generateRequestBtn').data('resident-id',residentId)
  $('#generateRequestBtn').data('id',id)
  $('#requestNameTxt').val(name)
  $('#requesttypeTxt').val(type)
  $('#requestpurposeTxt').val(purpose)
  $('#requestdateTxt').val(date)

})

$('#notificationBody').on('click',' a.indigencyBtn',function(){
  $('#notificationIndigencyModal').modal('toggle')
  let type = $(this).data('type')
  let name = $(this).data('name')
  let date = $(this).data('date')
  let purpose = $(this).data('purpose')
  let residentId = $(this).data('resident-id')
  let id = $(this).data('id')
  $('#generateRequestBtnIndigency').data('resident-id',residentId)
  $('#generateRequestBtnIndigency').data('id',id)
  $('#requestNameTxtIndigency').val(name)
  $('#requesttypeTxtIndigency').val(type)
  $('#requestpurposeTxtIndigency').val(purpose)
  $('#requestdateTxtIndigency').val(date)

  // alert('wala pato par, yung clearance meron na , bali kulang nalang neto map then indigency ')
})
$('#generateRequestBtn').on('click',function(){
  let name = $(this).data('resident-id')
  let remarks = $('#requestRemarksTxt').val()
  let purpose = $('#requestpurposeTxt').val()
  let id = $(this).data('id')
 
  $('#generateRequestBtn').data('resident-id','')
  $('#generateRequestBtn').data('id','')
  $('#requestNameTxt').val('')
  $('#requesttypeTxt').val('')
  $('#requestpurposeTxt').val('')
  $('#requestdateTxt').val('')
  $('#requestRemarksTxt').val('')
  $.ajax({
    type:'POST',
    data:{id:id,purpose:purpose,remarks:remarks,name:name},
    dataType:'json',
    url:"API/generateClearance2.php",
    success: function(results){
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
  let header3 = "BARANGAY CLEARANCE";
  let header3Offset = (doc.internal.pageSize.width / 2) - (doc.getStringUnitWidth(header3) * doc.internal.getFontSize() / 2); 
  doc.text(header3, header3Offset, base+40);
  base = base+40

  doc.setFillColor(240, 229, 229);
  doc.rect(150, 130, 440, 300, 'FD');


  doc.setFontType("normal");
  doc.setFontSize(12);
  let header4 = "TO WHOM IT MAY CONCERN:";
  doc.text(header4, 155, base+40);
  base = base+45

  doc.setFontType("italic");
  doc.setFontSize(9);

  let header5 = "This is to certify that the person whose name, right thumb mark and" 
  doc.text(header5, 165, base+10);
  base = base+10

  let header6 = "picture appearon has requested a Record and Barangay Clearance"
  doc.text(header6, 165, base+10);
  base = base+10

  let header7 = "from this office and result/s is are listed below:"
  doc.text(header7, 165, base+10);
  base = base+50

  doc.setFontType("normal");
  doc.setFontSize(9.5);



  doc.text("Name", 165, base+10);
  doc.text(":", 250, base+10);
  doc.text(residentName, 270, base+10);
  base = base+10
  doc.text("Address", 165, base+10);
  doc.text(residentAddress, 270, base+10);
  doc.text(":", 250, base+10);
  base = base+30

 


  doc.text("Date of Birth", 165, base+10);
  doc.text(":", 250, base+10);
  doc.text(residentDOB, 270, base+10)
  base = base+10
  doc.text("Place of Birth", 165, base+10);
  doc.text(residentPOB, 270, base+10)
  doc.text(":", 250, base+10);
  base = base+30

  doc.text("Purpose", 165, base+10);
  doc.text(residentPurpose, 270, base+10);
  doc.text(":", 250, base+10);
  base = base+10
  doc.text("Remarks", 165, base+10);
  doc.text(":", 250, base+10);
  doc.text(residentRemarks, 270, base+10);
  base = base+30

  doc.text("CTC No.#", 165, base+10);
  doc.text(":", 250, base+10);
  base = base+10
  doc.text("Issued At", 165, base+10);
  doc.text(":", 250, base+10);
  base = base+10
  doc.text("Issued On", 165, base+10);
  doc.text(":", 250, base+10);
  base = base+30

  doc.setFontSize(7.5);

  doc.text("Control # : " + controlNumber, 480, 145);
  doc.text("Date of Issue : " + dateIssue, 480, 155);

  doc.setFontType("italic");
  doc.setFontSize(16); 	
  doc.text("_____________", 470, 240);

  doc.setFontType("italic");
  doc.setFontSize(7); 	
  doc.text("Applicants Signature ", 495, 255);

  doc.setFillColor(240, 229, 229);
  doc.rect(480, 270, 100, 70, 'FD');
  doc.text("Right Thumb Mark ", 500, 350);

  doc.setFontType("italic");
  doc.setFontSize(7); 	
  doc.text("This certification is valid only from six (6) months from date of issue.", 270, 400);

  doc.setTextColor(0,136,204);
  doc.setFontSize(7); 	
  doc.text("Note: Not valid without Barangay Seal", 300, 410);

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

  doc.text(newTitle, rowOffset, 450);

  doc.setFontSize(9); 	
  doc.setFontType("italic");
  newTitle = "Punong Barangay" 
  rowOffset = (doc.internal.pageSize.width / 2) - (doc.getStringUnitWidth(newTitle) * doc.internal.getFontSize() / 2); 
  doc.text(newTitle, rowOffset, 465);

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
        doc.save(result.fileName+'.pdf');
        $('#notificationModal').modal('toggle')
        
    
    
    };

      
    
  };

  }
  else{
    myImage.onload = function(){
        doc.addImage(myImage , 'png', 520, 20, 50, 50);
        doc.save(result.fileName+'.pdf');
        $('#notificationModal').modal('toggle')
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

})

$('#generateRequestBtnIndigency').on('click',function(){
  let name = $(this).data('resident-id')
  let remarks = $('#requestRemarksTxtIndigency').val()
  let purpose = $('#requestpurposeTxtIndigency').val()
  let id = $(this).data('id')
 
  $('#generateRequestBtnIndigency').data('resident-id','')
  $('#generateRequestBtnIndigency').data('id','')
  $('#requestNameTxtIndigency').val('')
  $('#requesttypeTxtIndigency').val('')
  $('#requestpurposeTxtIndigency').val('')
  $('#requestdateTxtIndigency').val('')
  $('#requestRemarksTxtIndigency').val('')
  $.ajax({
    type:'POST',
    data:{id:id,purpose:purpose,remarks:remarks,name:name},
    dataType:'json',
    url:"API/generateIndigency2.php",
    success: function(results){
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
        doc.save(result.fileName+'.pdf');
        $('#notificationIndigencyModal').modal('toggle')
        
    
    
    };

      
    
  };

  }
  else{
    myImage.onload = function(){
        doc.addImage(myImage , 'png', 520, 20, 50, 50);
        doc.save(result.fileName+'.pdf');
        $('#notificationIndigencyModal').modal('toggle')
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

})




