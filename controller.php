<?php
require('flagcontroller.php');
require('timehandler.php');

function canLogin($id, $pass)
{
	$loginAllowed = isContestTime();

	if(!preg_match('/^[Aa][Nn][Ww][0-9]{4}$/',$id)) {
		echo "Invalid Anwesha ID";
		return false;
	}
	$con = dbConnect();
	
	$sql="SELECT username,name,anwid,isadmin FROM login where anwid='$id' and password='".sha1($pass)."' ";
	
	$result=mysqli_query($con,$sql);
	if($result && mysqli_num_rows($result)==1) {
		$row=mysqli_fetch_array($result);
		if($row['isadmin']!=1 && !$loginAllowed) {
			echo "Contest is Not Running!";
			return false;
		}
		$_SESSION['isadmin'] = $row['isadmin'];
		$_SESSION['name']=$row['name'];
		$_SESSION['id']=$row['anwid'];
		$_SESSION['username']=$row['username'];
		echo "Login Success";
		return true;
	}
	//echo mysqli_error($con);
	echo "Invalid Credentials";
	return false;
}

function register($username, $id, $pass)
{
	if(!preg_match('/^[Aa][Nn][Ww]([0-9]{4})$/',$id,$match)) {
		echo "Invalid Anwesha ID";
		return false;
	}

	if(!preg_match('/^[A-Za-z0-9 ]{3,25}$/',$id)) {
		echo "Username should be like '[A-Za-z0-9 ]{3,25}'";
		return false;
	}
	$anwid = $match[1];
	
	$con = dbConnect();
	require("dbConnectionANW.php");
	$conAnw = dbConnectAnw();
	
	$sql="SELECT name FROM People P join LoginTable L on L.pId=P.pId where P.pid='$anwid' and password='".sha1($pass)."' and confirm>0";
	$result=mysqli_query($conAnw,$sql);
	if($result && mysqli_num_rows($result)==1) {
		$row=mysqli_fetch_array($result);
		$name=$row['name'];
		$sql="INSERT INTO login(username,name,anwid,password) VALUES('$username','$name','$id','".sha1($pass)."')";
		$result=mysqli_query($con,$sql);
		if($result) {
			echo "Register Success";
		} else {
			echo "Error!, May be Already Registered";
			// echo mysqli_error($con);
		}
		return true;
	}
	
	echo "Invalid Credentials";
	return false;
}

function attemptQuestion($flag) {
	$flag=trim($flag);
	if(!preg_match('/^[A-Za-z0-9]{30,50}$/',$flag)) {
		echo "Invalid Flag'";
		return;
	}
	if(!isContestTime() && !(isset($_SESSION['isadmin']) && $_SESSION['isadmin']==1)) {
		echo "Contest is Over!";
		return;
	}

	$flags = getFlags();
	$isSolved = false;
	$solvedQid = null;
	foreach ($flags as $qid => $value) {
		// echo $qid."\n";
		if(getFlag($qid)==$flag) {
			$isSolved = true;
			$solvedQid = $qid;
			break;
		}
	}
	if(!$isSolved) {
		echo "Wrong Flag!";
	}
	
	$con = dbConnect();

	$anwid = $_SESSION['id'];
	if($isSolved) {	
		$sql="INSERT INTO score(anwid,qid,flag) VALUES('$anwid','$solvedQid','$flag')";
		$result=mysqli_query($con,$sql);
		if($result) {
			echo "Flag Accepted!";
		} else {
			echo "Flag Already Accepted";
		}
	}

	$sql="SELECT flag,anwid FROM score where flag='$flag' and anwid<>'$anwid'";
	$result=mysqli_query($con,$sql);
	if($result && mysqli_num_rows($result)>=1) {
		$row=mysqli_fetch_array($result);
		$anwother = $row['anwid'];
		$sql="UPDATE login SET lastcheattime=now() WHERE anwid='$anwother' or anwid='$anwid'";
		$result=mysqli_query($con,$sql);
	}

}


?>