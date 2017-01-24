<?php
require("dbConnection.php");
function getFlag($qid) {
	$flag = "123";
	$userId = 123;
	return sha1($flag . ":" . $userId);
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