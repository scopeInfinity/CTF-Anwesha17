<?php
require("flagcontroller.php");
mustLogin();
$con = dbConnect();
	
$sql="SELECT qid FROM score where anwid='".$_SESSION['id']."'";
$result=mysqli_query($con,$sql);
$data = array();
while($row = $result->fetch_assoc())
    {
    	$data[$row['qid']]=1;
	}

$flags = getFlags();
$returndata = array();
foreach ($flags as $qid => $value) {
	$returndata[$qid][0]=getPoints($qid);
	$returndata[$qid][1]=false;
	if(isset($data[$qid]))
		$returndata[$qid][1]=true;
}
echo json_encode($returndata);

?>