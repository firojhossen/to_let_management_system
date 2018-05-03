<?php 
	 include 'inc/header.php'; 
	 include 'lib/User.php'; 
 
	$user = new User();
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['insert'])){
		$userRegi = $user->insertData($_POST);
		
	}
?>
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

	<form>
		<label style="font-size:20px" >DIstrict:</label>
		<select name="district" id="district-list" class="demoInputBox"  onChange="getState(this.value);">
			<option value="">Select Districts</option>
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
        
	
		
		<button value="submit" >Submit</button>
	</form>

<?php include "inc/footer.php"; ?>		
