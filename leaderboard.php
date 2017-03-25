<?php
require("flagcontroller.php");
$con = dbConnect();
	
$sql="SELECT S.anwid as id,username,qid,time,now()-lastcheattime as t FROM `score` S JOIN login L on L.anwid=S.anwid where isadmin=0 ORDER BY time";
$result=mysqli_query($con,$sql);
$data = array();
while($row = $result->fetch_assoc())
    {
	   if(!isset($data[$row['id']]))
	   	$data[$row['id']][0]=0;
       $data[$row['id']][0] += getPoints($row['qid']);
       $data[$row['id']][1] = $row['username'];
       $data[$row['id']][2] = $row['time'];
       $time = $row['t'];
       if($time!=null && $time<3600) 
       	$time = true;
       else 
       	$time = false;
	   $data[$row['id']][3] = $time ;
	}
function sortByOrder($a, $b) {
	if($a[0]>$b[0])
		return -1;
	if($a[0]<$b[0])
		return +1;
	if($a[2]<$b[2])
		return -1;
	return +1;
}
usort($data,'sortByOrder');
$size = min(15,sizeof($data));
$ndata = array();
for ($i=0; $i < $size; $i++) { 
	$ndata[$i] = $data[$i];
}
echo json_encode($ndata);
?>