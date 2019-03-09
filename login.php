<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in | Baranggay Information System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="icon" href="dist/img/icon.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Baranggay</b><br/>Information System</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="form-group has-feedback">
      <input type="email" id="usernameTxt" class="form-control" placeholder="Username">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" id="passwordTxt" class="form-control" placeholder="Password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">        
      <div class="col-xs-12">
        <button type="button" id="loginBtn" class="btn btn-primary btn-block btn-flat">Login</button>
      </div>
    </div>
  </div>
</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="dist/js/custom/hullabaloo.js" ></script>
<script src="dist/js/custom.js" ></script>

<script>
  $(function () {
    $.hulla = new hullabaloo()
    $('#loginBtn').on('click',function(){
      let username = document.querySelector('#usernameTxt').value
      let password = document.querySelector('#passwordTxt').value
      $.ajax({
        type:'POST',
        data:{username:username,password:password},
        url:"Controller/LoginController.php",
        dataType:'JSON',
        success: function(result){
          if(result.userpassmatch == '0' && result.usermatch == '1'){
            $.hulla.send("Wrong Password", "danger");
          }
          else if(result.usermatch == '1' ){
            window.location.replace("Admin/");
            
          }
          else{
            $.hulla.send("Username doesn't exist", "danger");
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
