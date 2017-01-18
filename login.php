<?php
session_start();
if(isset($_POST['id']) && isset($_POST['token'])) {
	require("dbConnection.php");
	require("controller.php");
	if (canLogin($_POST['id'], $_POST['token'])) {
		session_regenerate_id(true);
		$_SESSION['id']=$_POST['id'];
		echo json_encode(0,"Logged In");
	}
	else
		echo json_encode(-1,"Invalid Authentication");
}
else
	echo json_encode(-1,"Invalid Input");
?>