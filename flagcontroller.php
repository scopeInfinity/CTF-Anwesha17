<?php
require("dbConnection.php");
function getFlag($qid) {
	$flag = "123";
	$userId = 123;
	return sha1($flag . ":" . $userId);
}

?>