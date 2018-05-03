<?php 
	 include 'inc/header.php'; 
	 include 'lib/User.php'; 
 
	$user = new User();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])){
		$userRegi = $user->insertData($_POST);
		
	}
?>
<?php include "connectdb.php"; ?>
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
<div class="panel panel-default">
	<div class="panel-body">
		<div style="max-width:600px; margin:0 auto">
			<form>
				<div class="form-group">
					<label for="name">Advertisement Title</label>
					<input type="text" id="title" name="title" class="form-control" required="1"/>
				</div>
				<div class="form-group">
					<label style="font-size:20px" >District:</label>
					<select name="district" id="country-list" class="demoInputBox"  onChange="getState(this.value);">
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
					<label style="font-size:20px" >Upozilla:</label>
					<select id="state-list" name="state"  >
					<option value="">Select Upozilla</option>
					</select>
				</div>
				<div class="form-group">
					<label for="region">Enter region name</label>
					<input type="text" id="reg" name="reg" class="form-control" required="1"/>
				</div>
				<div class="form-group">
					<label for="name"></label>
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