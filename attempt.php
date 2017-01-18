<?php
session_start();
if(isset($_POST['qid']) && isset($_POST['flag'])) {
	require("dbConnection.php");
	require("controller.php");
	echo attemptQuestion($_POST['qid'], $_POST['flag']);
}
else
	echo json_encode(-1,"Invalid Input");

?>