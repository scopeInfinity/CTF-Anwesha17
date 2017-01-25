<?php
session_start();
require("dbConnection.php");
function getFlagUser($qid,$userId) {
	$flag = getBaseFlag($qid);
	return sha1($flag . ":" . $userId);
}

function getFlag($qid) {
	if(!isLogin()) {
		return "Please Login First";
	}
	$flag = getBaseFlag();
	$userId = $_SESSION['id'];
	return getFlagUser($userId,$flag);
}

function isLogin() {
	//Temperary
	if(isset($_COOKIE['username']) && $_COOKIE['username']=='weareadmins') {
		return true;
	}
	return false;
}
function mustLogin() {
	if(!isLogin()) {
		echo "User Must Login!";
		die();
	}
}

?>