<?php
session_start();
include("includes/config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $myusername = addslashes($_POST['username']);
    $mypassword = md5(addslashes($_POST['password']));
    
    $sql = "SELECT userid FROM tbl_users WHERE username='$myusername' and password='$mypassword'";
    $result = mysqli_query($bd,$sql);
    $count = mysqli_num_rows($result);
 /*   if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6LddcBgTAAAAADB_yoJq4TzJudR8x0jMjl8CHYJX";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }
		else { */
			if($count == 1){
    $_SESSION['login_admin']=$myusername;
    header("location: admin/");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <style>
      body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="dist/ladda-themeless.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
  <!-- Fixed Header -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container"> 
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Mobile Library</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">About</a></li>
                    <li><a href="#">Login</a></li>
					<li><a href="regform.php">Register</a></li>
					<!-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">Admin & Dashboard</li> 
							<li><a href="#">As Admin</a></li>
							<li><a href="#">As User</a></li>
							<li class="divider"></li>
							<li class="dropdown-header">Portfolio</li>
							<li><a href="#">Portfolio 1</a></li>
							<li><a href="#">Portfolio 2</a></li> 
						</ul>
					</li>
					</li> -->
					<!-- <li><a href="#contact" data-toggle="modal">Contact</a></li> -->
					<li><a href="contact1.php">Contact</a></li>
					
					
				</ul>
			</div>
		</div>
	</div>
      <div class="container">
      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="username" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
		<!-- <div class="g-recaptcha" data-sitekey="6LddcBgTAAAAAMBc2wVzMpL4-NqgGsoSFPhbwd9_"></div> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
      </div>
	<!--Fixed Footer-->
	<div class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<div class="navbar-text pull-left">
				<p>Copyrights 2015</p>
			</div>
			<div class="navbar-text pull-right">
				<a href="#"><i class="fa fa-facebook-official fa-2x"></i></a> &nbsp;&nbsp;
				<a href="#"><i class="fa fa-twitter fa-2x"></i></a> &nbsp;&nbsp;
				<a href="#"><i class="fa fa-google-plus fa-2x"></i></a>
			</div>
		</div>
	</div>
	<div class="modal fade" id="contact" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form class="form-horizontal" role="form">
					<div class="modal-header">
						<h4>Contact</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="contact-name" class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="contact-name" placeholder="First & Last Name">
							</div>
						</div>
						<div class="form-group">
							<label for="contact-email" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="contact-email" placeholder="example@domain.com">
							</div>
						</div>
						<div class="form-group">
							<label for="contact-message" class="col-sm-2 control-label">Message</label>
							<div class="col-sm-10">
								<textarea class="form-control" rows="4"></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a class="btn btn-default" data-dismiss="modal">Close</a>
						<button type="submit" class="btn btn-primary">Send</button>
					</div>
			</div>
		</div>
	</div> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
        <script src="dist/spin.min.js"></script>
<script src="dist/ladda.min.js"></script>
  </body>
</html>