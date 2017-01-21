<?php
require('flagcontroller.php');
function canLogin($id, $token)
{
	//use $con
	return false;
}

function attemptQuestion($qid, $flag) {
	$arr = array(0,"Not Coded");
	if(getFlag($qid)==$flag) {
		$arr[0]=1;
		//If not solved
		$arr[1]="Points Given";
	} else {
		$arr[1]="Invalid Flag";
	}

	return json_encode($arr); 

}


?>