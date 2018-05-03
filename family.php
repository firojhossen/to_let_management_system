<?php 
	 include 'inc/header.php'; 
	 include 'lib/User.php'; 
 
	$user = new User();
	?>
<section>
<?php	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])){	
		$advertise = $user->insertFamily($_POST);		
	}
	?>
</section>
<?php include "connectdb.php"; ?>
<style>

	
	.back{
		background-image: url("img/1.jpeg");
	}
</style>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'id='+val,
	success: function(data){
		$("#state-list").html(data);
	}
	});
}





</script>
		<div class="panel panel-default back">
			
			<div class="panel-body">
			<marquee direction="left"><h2 style="color:maroon;"><strong>Advertise For Family</strong></h2></marquee>
				<div style="max-width:271px; margin:0 auto">
				<?php
				
					if(isset($advertise)){
						echo $advertise;
						
					}
					
					
				?>
				
					<h4 style="color:blue; font-style:bold;">Fill up the following term...</h4>
					<form action="" method="POST" style="background:#BEAA91;padding: 10px 10px 10px 10px;">
						<div class="form-group">
						<select name="district" id="country-list" class="demoInputBox"  onChange="getState(this.value);" style="height:40px;border-radius:3px;	min-width:250px;background:fff">
						<option value="">Select District</option>
						<?php
						$sql1="SELECT * FROM districts";
						 $results=$dbhandle->query($sql1); 
						while($rs=$results->fetch_assoc()) { 
						?>
						<option value="<?php echo $rs["id"]; ?>"><?php echo $rs["name"]; ?></option>
						<?php
						}
						?>
						</select>
						</div>
						<div class="form-group">
							<select id="state-list" name="uponame"  onChange="getRegion(this.value);" style="height:40px;border-radius:3px;	min-width:250px;background:fff">
							<option value="">Select Upozilla</option>
							</select>				
						</div>
						<div class="form-group">
							
							<label for="village">Region:</label>
							<input type="text" id="region" name="region" class="form-control" placeholder="It refers to your home region." required="1"/>
						
						</div>
						<div class="form-group">
							<select name="range" style="height:40px;border-radius:3px;	min-width:250px;background:fff">
									<option>Range From Main Town</option>
									<option>0 km</option>
									<option>1 km</option>
									<option>2 km</option>
									<option>3 km</option>
									<option>4 km</option>
									<option>5 km</option>
									<option>5 km+</option>
									
									
							</select>
						</div>	
						<div class="form-group">
							<label for="description">Enter description about your home.</label>
							<textarea class="form-control" rows="4" id="description" name="description"></textarea>
						</div>
						
						<div class="form-group">
							<label for="mobile">Mobile Number</label>
							<input type="text" id="mobile" name="mobile" class="form-control" placeholder="+08801xxxxxxxxxx" required="1"/>
						</div>
						<div class="form-group">
							<label for="email">Email:</label>
							<input type="text" id="email" name="email" class="form-control" required="1"/>
						</div>
								
						<button type="submit" name="insert" class="btn btn-success" >Submit</button>
					</form>
				</div>
			</div>
		</div>
	<?php include "inc/footer.php"; ?>		