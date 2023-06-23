<!-- tête -->
<?php 
session_start();
include 'includes/tete_page.php' 
?>

<body class="hold-transition login-page">
<div class="login-box">

	<!-- mesg error and success -->
	<?php include 'includes/msg_error_success.php' ?>
	
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="../controllers/signin.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Email" >
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signin"><i class="fa fa-sign-in"></i> Sign In</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="password_forgot.php">I forgot my password</a><br>
      <a href="./signup.php" class="text-center">Register a new membership</a><br>
      <a href="../"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>
	
<!-- liens script -->
<?php include 'includes/script.php' ?>

</body>
</html>