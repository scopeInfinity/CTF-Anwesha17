<?php
session_start();
require("dbConnection.php");

function getFlags() {
	$flags  = array();
	$flags[0] = "oea2G8Q62l";
	$flags[1] = "pdJIp9ilXL";
	$flags[2] = "fbXFXjX2Ps";
	$flags[3] = "DThfgcHIEU";
	$flags[4] = "pihOuW0mIt";
	$flags[5] = "i5WO1xspJr";
	$flags[6] = "ByEj2jLuD9";
	$flags[7] = "sRUeXYfCVS";
	$flags[8] = "95DULO9xnH";
	$flags['5596alpha'] = "X7V52Gl3le";
	return $flags;	
}

function getPoints($qid) {
	switch ($qid) {
		case 0:
			return 20;
			break;
		
		case 1:
			return 40;
			break;
		
		case 2:
			return 50;
			break;
		
		case 3:
			return 30;
			break;
		
		case 4:
			return 100;
			break;
		
		case 5:
			return 30;
			break;
		
		case 6:
			return 10;
			break;
		
		case 7:
			return 25;
			break;
		
		case 8:
			return 25;
			break;
		
		case '5596alpha':
			return 80;
			break;

		
		default:
			return 0;
			break;
	}
}

function getBaseFlag($qid) {
	return getFlags()[$qid];
}


function getFlagUser($qid,$userId) {
	$flag = getBaseFlag($qid);
	// echo "For ".$qid. " and ".$userId."\t".$flag."<br>";
	return sha1($flag . ":" . $userId);
}

function getFlag($qid) {
	if(!isLogin()) {
		echo "Please Login First";
		die();
		return "Please Login First";
	}
	$userId = $_SESSION['id'];
	$fflag = getFlagUser($qid,$userId);;
	return $fflag;
}

function isLogin() {

	if(isset($_SESSION['id']) && preg_match('/^[Aa][Nn][Ww][0-9]{4}$/',$_SESSION['id'])) {
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