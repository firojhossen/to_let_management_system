

<?php
	
	include_once 'lib/Session.php';
	Session::init();
?>

	<?php include "connectdb.php"; ?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Basic Tables - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <?php
		if(isset($_GET['action']) && $_GET['action'] == "logout"){
			Session::destroy();
		}
	?>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
	
    <header class="app-header"><a class="app-header__logo" href="index.html"></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul>
		
            <li style="list-style:none;margin-left:585px;color:black;font-size:20px"><a class="dropdown-item" style="margin-top:10px;list-style:none;" href="?action=logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
			
			
          </ul>

    </header>
	
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class=""><img style="margin-left:38px;width:150px;height:150px;border-radius:50%" src="img/1.jpeg" alt="User Image">
        <div>
          <p style="color:white;text-align:center;font-size:22px;margin-top:">Firoj Hossen</p>
          
        </div>
      </div>
			
      <ul class="app-menu">
	    <?php
			$id = Session::get("id");
			$userlogin = Session::get("login");
			if($userlogin == true){
	    ?>
        <li><a class="app-menu__item" href="index.php">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="insertDistrict.php">Insert DIstrict</a></li>
        <li><a class="app-menu__item" href="insertUpozilla.php">Insert Upozilla</a></li>        
		 <li><a class="app-menu__item" href="viewUsers.php">View Users</a></li>
			<?php }else {
				header("Location: login.php");
			 } ?>
    </aside>
    <main class="app-content">
      
      <div class="row">         
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title" style="text-align:center">User Details</h3>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Index</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                </tr>
              </thead>
			  <?php
				$sql1="SELECT * FROM registration";
					$results=$dbhandle->query($sql1); 
						if($results){
							$i = 0;
						while($rs=$results->fetch_assoc()) {
							$i++;
						?>
              <tbody>
                <tr>
                  <td><?php echo $rs["id"]; ?></td>
                  <td><?php echo $rs["fname"]; ?></td>
                  <td><?php echo $rs["lname"]; ?></td>
                  <td><?php echo $rs["phone"]; ?></td>
                  <td><?php echo $rs["email"]; ?></td>
                </tr>                
              </tbody>
						<?php }}?>
            </table>
          </div>
        </div> 
        
        
       
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>