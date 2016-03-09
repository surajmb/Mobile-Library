<?php
	if($_POST["submit"]){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Contact Form';
		$to = 'example@domain.com';
		$subject = 'Message from Contact Form';
		$body = "From: $name\n Email: $email\n Message: $message";
		
		if(!$_POST['name']){
			$errName = 'Please enter your name.';
		}
		if(!$_POST['email'] || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
			$errEmail= 'Please enter a valid email address.'; 
		}
		if(!$_POST['message']) {
			$errMessage = 'Please enter your message.';
		}
		if($human!==5){
			$errHuman = 'Your anti-spam answer is incorrect.';
		}
		
		if(!$errName && !$errEmail && !$errHuman && !$errMessage) {
			if(mail($to, $subject, $body, $from)){
				$result = '<div class="alert alert-success"> Thank you! Your email has been sent.</div>';
			}
			else {
				$result = '<div class="alert alert-danger"> Sorry, there was an error sending your message. Please try again later.</div>';
			}
		}
		
	}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mobile Library</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
				<a class="navbar-brand" href="index.html">Mobile Library</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.html">Home</a></li>
					<li><a href="#">About</a></li>
                    <li><a href="login1.php">Login</a></li>
					<li><a href="regform.php">Register</a></li>
				<!--	<li class="dropdown">
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
					<li class="active"><a href="#">Contact</a></li>
				</ul>
			</div>
		</div>
	</div> 
	<!--Header End-->
	<div class="container">
		<div class="page-header">
			<h1 align="center">Contact</h1>
		</div>
		<form class="form-horizontal" role="form" method="post" action="contact1.php">
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
					<?php echo "<p class='text-danger'>$errName</p>"; ?>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
					<?php echo "<p class='text-danger'>$errEmail</p>"; ?>
				</div>
			</div>
			<div class="form-group">
				<label for="message" class="col-sm-2 control-label">Message</label>
				<div class="col-sm-10">
					<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']); ?></textarea>
					<?php echo "<p class='text-danger'>$errMessage</p>"; ?>
				</div>
			</div>
			<div class="form-group">
				<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
					<?php echo "<p class='text-danger'>$errHuman</p>"; ?>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-10 col-sm-offset-2">
					<?php echo $result; ?>
				</div>
			</div>
		</form>
			
				
				
				
				
	<!--Fixed Footer-->
	<div class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container">
			<div class="navbar-text pull-left">
				<p>Copyrights 2015 Clockworks</p>
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
  </body>
</html>