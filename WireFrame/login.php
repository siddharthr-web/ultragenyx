<!DOCTYPE html>
<html lang="en" class="loading">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title>Ultragenyx Pharmaceutical</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="AdminPanel/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="AdminPanel/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="AdminPanel/dist/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<style>
.brandImg {
	height: auto;
	width: 250px;
}
.login-box-msg{font-weight:700; text-transform:uppercase;}
.login-card-body{ border-radius:10px;}
</style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"> <img src="images/logo.png" class="brandImg" /> </div>
  <!-- /.login-logo -->
  <div style="color: red;text-align: center;margin-bottom: 10px;"> </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign In</p>
      <form class="form" method="post" action="./dashboard.php">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username"  data-val="true" data-val-required="The Email field is required." id="Email" name="Email" value="">
          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-envelope"></span> </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" data-val="true" data-val-required="The Password field is required." id="Password" name="Password">
          <div class="input-group-append">
            <div class="input-group-text"> <span class="fas fa-lock"></span> </div>
          </div>
        </div>
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4 mr-auto ml-auto">
            <input type="submit" name="Login" id="Login" value="Login" class="btn btn-primary btn-block" />
          </div>
          <!-- /.col --> 
        </div>
      </form>
      <!-- /.social-auth-links --> 
    </div>
    <!-- /.login-card-body --> 
  </div>
</div>
<!-- /.login-box --> 
<!-- jQuery --> 
<script src="AdminPanel/plugins/jquery/jquery.min.js"></script> 
<!-- Bootstrap 4 --> 
<script src="AdminPanel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- AdminLTE App --> 
<script src="AdminPanel/dist/js/adminlte.min.js"></script>
</body>
</html>