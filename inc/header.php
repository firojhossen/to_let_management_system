<?php
	$filepath = realpath(dirname(__FILE__));
	include_once $filepath.'/../lib/Session.php';
	Session::init();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hose Renting</title>
		<link rel="stylesheet" href="inc/Bootstrap-min.css"/>
		<link rel="stylesheet" href="inc/jquery-ui.min.css"/>
		
		
		<script src="inc/bootstrap-min.js"></script>
		<script src="inc/jquery-ui.min.js"></script>
		<script src = "inc/jquery.js"></script>
		<script src = "js/jquery.js"></script>
	    <script src = "js/jquery-ui.min.js"></script>.
		<script src="inc/code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
		<style>
			.dropbtn {
				background-color: #4CAF50;
				color: white;
				padding: 16px;
				font-size: 16px;
				border: none;
			}
				.dropbtn_search {
				background-color: #4CAF50;
				color: white;
				padding: 16px;
				font-size: 16px;
				border: none;
				margin-left:3px;
			}

			.dropdown {
				
				display: inline-block;
			}

			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #f1f1f1;
				min-width: 160px;
				box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
				z-index: 1;
			}

			.dropdown-content a {
				color: black;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
			}

			.dropdown-content a:hover {background-color: #ddd}

			.dropdown:hover .dropdown-content {
				display: block;
			}

			.dropdown:hover .dropbtn {
				background-color: #3e8e41;
				margin-left:2px;
			}
</style>
	</head>
	<?php
		if(isset($_GET['action']) && $_GET['action'] == "logout"){
			Session::destroy();
		}
	?>
	<body>
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid" style="background:navy;color:blue;">
					<div class="navbar-header">
						<a class="navbar-brand" href="index.php" style="color:white;">To-Let Management System</a> 
					</div>
					<ul class="nav navbar-nav pull-right" style="margin-right:-10px">
						<?php
							$id = Session::get("id");
							$userlogin = Session::get("login");
							if($userlogin == true){
						?>
						
						
						<li><div class="dropdown">
							 <button class="dropbtn_search">Profile</button>
							  <div class="dropdown-content">
								<a href="family_profile.php">For Family</a>
								<a href="student_profile.php">For Students</a>								
							  </div>
						</div>
						<li><div class="dropdown">
							 <button class="dropbtn_search">Home</button>
							  <div class="dropdown-content">
								<a href="family_home.php">For Family</a>
								<a href="student_home.php">For Students</a>								
							  </div>
						</div>
						</li>
						<li><div class="dropdown">
							 <button class="dropbtn_search">Advertise</button>
							  <div class="dropdown-content">
								<a href="family.php">For Family</a>
								<a href="student.php">For Students</a>								
							  </div>
						</div>
						</li>
						<li><div class="dropdown">
							 <button class="dropbtn_search">Search</button>
							  <div class="dropdown-content">
								<a href="search_family.php">For Family</a>
								<a href="search_student.php">For Students</a>								
							  </div>
						</div></a></li>
												
						<li><a href="?action=logout" style="color:white;">Logout</a></li>
						<?php }else{ ?>
						
						<li><a href="register.php" style="color:white;">Register</a></li>
						<li><a href="login.php" style="color:white;">Log in</a></li>
						<?php } ?>
					</ul>
				</div>
			</nav>