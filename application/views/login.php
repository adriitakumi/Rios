<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>/assets/img/dark.png">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>/assets/imgn/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sign In - Library Management System</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>

<body class="signup-page">
	<div style="background: url('<?php echo base_url();?>/assets/img/26102.jpg')no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"> 
	<nav class="navbar navbar-transparent navbar-absolute"></nav>

    <div class="wrapper">
			<div class="container" style="margin-top: 50px;">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card" style="padding-bottom: 25px;">
							<form method="post" action="<?php echo site_url('Login/verify_login'); ?>">
								<div class="header text-center">
									<img src="<?php echo base_url(); ?>assets/img/dark.png" style="width: 50%;" >
								</div>
								<div class="content">
									<center><font style="font-size: 12px" class="text-danger"><?php if(isset($_SESSION['fd'])) { echo $_SESSION['fd']; } ?></font></center>
									<div class="form-group">
										<label>Username</label>
										<input type="text" class="form-control" name="username" placeholder="Username" required>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" placeholder="Password" name="password" class="form-control" required />
									</div>
								</div>
								<div class="footer text-center">
									<button type="submit" class="btn btn-simple btn-fill" style="background-color: #9b59b6; width: 90%;">Sign In</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<footer style="position:absolute;  bottom:0; width:100%; height:150px;">
		        <div class="container" style="color: gray	;">
		            <nav class="pull-left">
						<ul>
							<li style="list-style-type: none;">
								Library Management System
							</li>
						</ul>
		            </nav>
		            <div class="copyright pull-right">
		                &copy; 2018, made with <i class="fa fa-heart heart"></i> by Adrielle Kristine Nicolette Escaro
		            </div>
		        </div>
		    </footer>

		</div>

</div>


</body>
	<!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script> 

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>


</html>
