<?php
	date_default_timezone_set('Asia/Calcutta');
	
	$starttime = '01/26/2017 09:00:00 pm';
	$endtime = '01/27/2020 09:00:00 pm';
	$now  = date('m/d/Y h:i:s a', time());
	
	if(isset($_GET['status'])) {
		echo "Start Time : ".$starttime."<br>";
		echo "End Time : ".$endtime."<br>";
		echo "Current Time : ".$now."<br>";
	}

	$starttime = strtotime($starttime);
	$endtime = strtotime($endtime);
	$now = strtotime($now);

	function getStartTimeLeft() {
		return $GLOBALS['starttime']-$GLOBALS['now'];
	}
	function getEndTimeLeft() {
		return $GLOBALS['endtime']-$GLOBALS['now'];
	}
	function isContestTime() {
		if(getStartTimeLeft()<=0 && getEndTimeLeft()>0)
			return true;
		return false;
	}

	

?>