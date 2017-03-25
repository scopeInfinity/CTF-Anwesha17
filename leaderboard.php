[[360,"BuddyGo","2017-01-27 20:00:00",false],[290,"ILLUMINATI","2017-02-07 20:05:07",false],[280,"tameeshb","2017-01-27 12:32:12",false],[230,"jthacker","2017-01-26 21:31:48",false],[230,"go_girl","2017-01-26 21:35:35",false],[110,"luduk","2017-01-27 12:50:45",false],[90,"muks14","2017-01-27 09:57:08",false],[90,"Escanor","2017-01-27 12:08:57",false],[90,"sasuke420","2017-01-27 14:05:51",false],[80,"zuckerberg","2017-01-26 18:10:52",false],[80,"xk_","2017-01-26 20:31:21",false],[80,"L","2017-01-26 20:38:20",false],[65,"godFather","2017-01-27 01:07:11",false],[65,"kushal10","2017-01-27 06:03:05",false],[65,"DreamPearl","2017-01-27 13:12:56",false]]
<?php
//Hardcoded - Frozen Leaderboard
exit(0);
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