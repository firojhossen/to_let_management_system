<?php 
	 include 'inc/header.php'; 
	 include 'lib/User.php'; 
 
	$user = new User();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])){
		$userRegi = $user->insertData($_POST);
		
	}
?>
		<div class="panel panel-default">
			
			<div class="panel-body">
				<div style="max-width:600px; margin:0 auto">
				<?php
					if(isset($userRegi)){
						echo $userRegi;
						
					}
				?>
					<form action="" method="POST">
						<select name="district">
									<option>Select District</option>
									<?php
											$user = new User();
											$userdata = $user->getVillage();
											if(isset($userdata)){							
												foreach($userdata as $data){
												
												
										?>
									<option><?php echo $data['villname'];?></option><?php  }}?>
						</select>
						<div class="form-group">
							<select name="district">if ($conn->query($sql) === TRUE) 
									<option>Select District</option>
									<?php
											$user = new User();
											$userdata = $user->getVillage();
											if(isset($userdata)){							
												foreach($userdata as $data){
												
												
										?>
									<option><?php echo $data['villname'];?></option><?php  }}?>
						</select>
									
							
						</div>
						<div class="form-group">
							<div class="form-group">
							<select name="district">
									<option>Select Village</option>
									<?php
											$user = new User();
											$userdata = $user->getVillage();
											if(isset($userdata)){							
												foreach($userdata as $data){
												
												
										?>
									<option><?php echo $data['villname'];?></option><?php  }}?>
							</select>
						</div>
						</div>
						<div class="form-group">
							<label for="Email">Price</label>
							<input type="text" id="email" name="price" class="form-control" required="1"/>
						</div>
						<div class="form-group">
							<label for="name">Product Name</label>
							<input type="text" id="name" name="product_name" class="form-control" required="1"/>
						</div>
						<div class="form-group">
							<label for="username">Quantity</label>
							<input type="text" id="username" name="quantity" class="form-control" required="1"/>
						</div>
						<div class="form-group">
							<label for="Email">Price</label>
							<input type="text" id="email" name="price" class="form-control" required="1"/>
						</div>		
						<button type="submit" name="insert" class="btn btn-success" >Submit</button>
					</form>
				</div>
			</div>
		</div>
	<?php include "inc/footer.php"; ?>		