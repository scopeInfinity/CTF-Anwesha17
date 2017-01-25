<?php
define("DB_HOST2","127.0.0.1");
define("DB_username2","root");
define("DB_password2","");
define("DB_database2","anwesha");

function dbConnectAnw() {
	$con = mysqli_connect(DB_HOST2,DB_username2,DB_password2,DB_database2);
	// Check connection
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  die();
	}
	return $con;
}

?>
