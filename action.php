
<?php 
$districts = $_POST['district'];		
		$upozillas = $_POST['uponame'];		
		$regions = $_POST['region'];
		$ranges = $_POST['range'];
		$descriptions = $_POST['description'];
		$mobiles = $_POST['mobile'];
		$emails = $_POST['email'];
		$user_ids = getUserId();
		
	?>	

			<table>
					<tr>
						<td></td>
						<td><?php echo $districts;?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $upozillas;?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $regions;?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $ranges;?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $descriptions;?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $mobiles;?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $emails;?></td>
					</tr>
					<tr>
						<td></td>
						<td><?php echo $user_ids;?></td>
					</tr>
				</table>