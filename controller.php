<?php
require('flagcontroller.php');
function getEmail() {
	return "gagan1kumar.cs@gmail.com";
}
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

function getBaseFlag($qid) {
	return $flags[$qid];
}

function canLogin($id, $pass)
{
	if(!preg_match('/[Aa][Nn][Ww][0-9]{4}/',$id)) {
		echo "Invalid Anwesha ID";
		return false;
	}
	$con = dbConnect();
	
	$sql="SELECT username,name,anwid FROM login where anwid='$id' and password='".sha1($pass)."'";
	$result=mysqli_query($con,$sql);
	if($result && mysqli_num_rows($result)==1) {
		$row=mysqli_fetch_array($result);
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
	if(!preg_match('/[Aa][Nn][Ww]([0-9]{4})/',$id,$match)) {
		echo "Invalid Anwesha ID";
		return false;
	}

	if(!preg_match('/[A-Za-z0-9 ]{3,25}/',$id)) {
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
		$pass=sha1($pass);
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