<?php
require('../../flagcontroller.php');
?>
<html>
<head>
	<title>Shopping Complex</title>
</head>
<body>
<?php
$isLoggedIn = false;
$isAdmin = false;
$myname = "";
if(isset($_POST['logout'])) {
	echo "Logged Out!";
	setcookie("username", "");
	die();
}

if(isset($_POST['username']) && isset($_POST['passwd'])) {
	if($_POST['username']=='john' && '8a368184fd838dbc4306156c5ba67e2e'==md5($_POST['passwd'])) {
		$isLoggedIn = true;
		$isAdmin = true;
		$myname = $_POST['username'];
	} else if($_POST['username']=='marry' && '061fba5bdfc076bb7362616668de87c8'==md5($_POST['passwd'])) {
		$isLoggedIn = true;
		$myname = $_POST['username'];
	} else {
		echo "Invalid Username/Password";
	}
}
if($isLoggedIn)
	setcookie("username", base64_encode($myname));

if(isset($_COOKIE['username']) && !empty($_COOKIE['username'])) {
	$myname = trim(base64_decode($_COOKIE['username']));
	$isLoggedIn = true;
}
if($isLoggedIn && $myname=='john') {
	$isAdmin = true;
}

if(isset($_POST['deleteAll'])) {
	if($isAdmin) {
		echo "All Post Deleted, Flag : ".getFlag(1)." <br>";
		die();
 	} else {
 		echo "Only 'Admin' can delete Post's<br>";
 	}
}

if($isLoggedIn){
?>
	You are Logged in as "<?php echo $myname; ?>" <br>
	Items Available in shop <br>
	<li>Item 1</li>
	<li>Item 2</li>
	<li>Item 3</li>
	<li>Item 4</li>
	<form input='#' method='POST'>
		<input type='hidden' name='deleteAll' value='1'><br>
		<input type='submit' value='Delete All'> <br>
	</form>
	<br>
	<br>
	<form input='#' method='POST'>
		<input type='hidden' name='logout' value='1'>
		<input type='submit' value='Logout'> 
	</form>

<?php
}
else
{
?>
<form action='index.php' method='POST'>
<input type='text' name='username' value=''>
<input type='password' name='passwd' value=''>
<input type='submit'  value='Login'>
</form>
<?php
}
?>
</body>
</html>