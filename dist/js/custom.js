$('#logoutBtn').on('click',function(){
    $.ajax({
        type:'POST',
        url:"../Controller/LogoutController.php",
        success: function(result){
          window.location.replace("../index.php");
        }
        
      })

})