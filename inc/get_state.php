
<?php
require_once("connectdb.php");

//$db_handle = new DBController();


	$query ="SELECT * FROM upozilla WHERE districtid = '" . $_POST["id"] . "'";
	$results = $dbhandle->query($query);
?>
	<option value="">Select State</option>
<?php
	while($rs=$results->fetch_assoc()) {
?>
	<option value="<?php echo $rs["id"]; ?>"><?php echo $rs["uponame"]; ?></option>
<?php

}
?>


