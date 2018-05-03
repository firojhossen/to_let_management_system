
<?php 
define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","db_home");



$dbhandle =new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("Unable to connect to MySQL");
if ($dbhandle->connect_error) {
    die("Connection failed: " . $dbhandle->connect_error);
} 

?>
