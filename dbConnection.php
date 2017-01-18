<?php
define("DB_HOST","127.0.0.1");
define("DB_username","root");
define("DB_password","");
define("DB_database","ctf");

$con = mysqli_connect(DB_HOST,DB_username,DB_password,DB_database);

// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  die();
}
?>
