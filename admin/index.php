<?php
include("../includes/config.php");
include("del.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //add books
    $addTitle = addslashes($_POST['title']);
    $addAuthor = addslashes($_POST['author']);
    $addIsbn = addslashes($_POST['isbn']);
    $addPublisher = addslashes($_POST['publisher']);
    $addCopies = addslashes($_POST['copies']);
    
    $addBooks = "INSERT INTO books(title,author,isbn,publisher,copies) VALUES('$addTitle','$addAuthor','$addIsbn','$addPublisher','$addCopies')";
    $result = mysqli_query($bd,$addBooks);
    if($result){
    $message = '<div class="alert alert-success"> Successfully added. </div>';
    }
    else{
    $message = '<div class="alert alert-danger"> Oops! Something went wrong. Try again. </div>';
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/custom.css" rel="stylesheet">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="../css/simple-sidebar.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style>
    body {
  padding-top: 50px;
}
.starter-template {
  padding: 40px 15px;
  text-align: center;
}
    </style>
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
					<li><a href="../index.html">Home</a></li>
					<li><a href="#">About</a></li>
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
					<li><a href="../contact1.php">Contact</a></li>
                    <li><a href="../logout.php">Logout</a></li>
					
					
				</ul>
			</div>
		</div>
	</div>
      <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Tools
                    </a>
                </li>
                <li>
                    <a href="#add" data-toggle="collapse">Add Books</a>
                </li>
                <li>
                    <a href="#delete" data-toggle="collapse">Delete Books</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
           <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle"><span class="glyphicon glyphicon-circle-arrow-right"></span> Menu</a>
                    </div>
                    <div class="col-sm-9">
                        <h1 style="margin-left:100px;">Admin Dashboard</h1>
                    </div>
                </div>
            </div>
            
          <form class="form-horizontal collapse in" role="form" name="addForm" method="POST" action="index.php" id="add">
              <div class="col-sm-12" align="center"><h4>Add Books</h4></div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Title</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="title" name="title" placeholder="Title of the Book">
				</div>
			</div>
              <div class="form-group">
				<label for="author" class="col-sm-2 control-label">Author</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="author" name="author" placeholder="Author Name">
				</div>
			</div>
              <div class="form-group">
				<label for="isbn" class="col-sm-2 control-label">ISBN</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="isbn" name="isbn" placeholder="ISBN">
				</div>
			</div>
              <div class="form-group">
				<label for="publisher" class="col-sm-2 control-label">Publisher</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="publisher" name="publisher" placeholder="Publisher Name">
				</div>
			</div>
              <div class="form-group">
				<label for="copies" class="col-sm-2 control-label">Copies</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="copies" name="copies" placeholder="No. of Copies">
				</div>
			</div>
              <div class="form-group">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-1"></div>
				<div class="col-sm-4">
					<button class="btn btn-md btn-primary" type="submit">Add</button>
				</div>
			</div>
              &nbsp;
              <div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
                   <?php echo $message; ?>
				</div>
			</div>
               </form>
               <form class="form-horizontal collapse" name="delForm" role="form" method="POST" action="del.php" id="delete">
              <div class="col-sm-12" align="center"><h4>Delete Books</h4></div>
			<div class="form-group">
				<label for="name" class="col-sm-2 control-label">Title</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="dtitle" name="dtitle" placeholder="Title of the Book to be deleted">
				</div>
			</div>
              <div class="form-group">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-1"></div>
				<div class="col-sm-4">
					<button class="btn btn-md btn-primary" type="submit">Delete</button>
				</div>
			</div>
              &nbsp;
              <div class="form-group">
				<div class="col-sm-4 col-sm-offset-2">
                   <?php echo $message; ?>
				</div>
			</div>
               </form>
    
              </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
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
<!--	<div class="modal fade" id="contact" role="dialog">
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
	</div> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
      <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
  </body>
</html>
