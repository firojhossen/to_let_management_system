<?php 
	  include 'inc/header.php'; 
	  include 'lib/User.php';
	  Session::checkLogin();
	  
 
	$user = new User();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){	
		
		$userLogin = $user->userLogin($_POST);
		
	}
	
?>
		<div class="panel panel-default">
			<div class="panel-heading" style="background:#ddd">
				<h2>User Login</h2>
			</div>
			<div class="panel-body">
				<div style="max-width:600px; margin:0 auto">
	<?php
					if(isset($userLogin)){
						echo $userLogin;
					}
	?>			
	
<script>
$(document).ready(function(){
	$(document).tooltip({
		track:true,
		show:{delay:100, duration:500, effect:'slideDown'},
		hide:{delay:100, duration:500, effect:'slideUp'}
	
	});<!-------sobgulo field dhorar jonno eta. specific vabe  dhorar jonno $("#id").tooltip(); ei function use hobe.----->
	
});
</script>	
					<form action="" method="POST">
						<div class="form-group">
							<label for="Email">Email</label>
							<input type="text" id="email" name="email" class="form-control" title="Enter your email address that had been used here."/>
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control" title="Enter your email address that has been used here."/>
						</div>
						<button type="submit" name="login" class="btn btn-success" >Login</button>
					</form>
				</div>
			</div>
		</div>
		
	<?php include "inc/footer.php"; ?>		