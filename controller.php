<?php
function canLogin($id, $token)
{
	//use $con
	return false;
}

function attemptQuestion($qid, $flag) {
	$arr = array(0,"Not Coded");
	// $arr[0] = 1; Success
	// $arr[0] = 0; Failed
	// $arr[1] = ""; Messge
	// return json_encode($arr);

	return json_encode($arr); 

}

?>