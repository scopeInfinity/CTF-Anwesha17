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
foreach ($flags as $qid => $value) 
if($qid>0 && $qid<=8) 
{
	$returndata[$qid-1][0]=getPoints($qid);
	$returndata[$qid-1][1]=false;
	if(isset($data[$qid]))
		$returndata[$qid-1][1]=true;
}
echo json_encode($returndata);

?>