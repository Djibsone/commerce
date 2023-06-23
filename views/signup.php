<!-- tête de page -->
<?php 
session_start();
include 'includes/tete_page.php' 
?>

<body class="hold-transition register-page">
    <div class="register-box">
        
        <!-- mesg error and success -->
       <?php include 'includes/msg_error_success.php' ?>
  	  	<div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="../controllers/signup.php" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="" >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="lastname" placeholder="Lastname" value=""  >
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="" >
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" >
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="repassword" placeholder="Retype password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group" style="width:100%;">
                <div class="g-recaptcha" data-sitekey="6LevO1IUAAAAAFX5PpmtEoCxwae-I8cCQrbhTfM6"></div>
            </div>
                <hr>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-sign-in"></i> Sign Up</button>
                    </div>
                </div>
            </form>
            <br>
            <a href="signin.php">I already have a membership</a><br>
            <a href="../"><i class="fa fa-home"></i> Home</a>
  	    </div>
    </div>
	
    <!-- liens script -->
    <?php include 'includes/script.php' ?>
</body>
</html>