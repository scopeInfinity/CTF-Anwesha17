<?php
require('../../flagcontroller.php');
mustLogin();
?>
<html>
<head>
	<title>Shopping Complex</title>
        <link rel="stylesheet" type="text/css" href="shopping.css">
</head>
<body>

<center>
	<br>
<h2>John Shop</h2>
<br>

<?php
$isLoggedInShopping = false;
$isAdminShopping = false;
$myname = "";
if(isset($_POST['logout'])) {
	echo "Logged Out!";
	setcookie("usernameshopping", "");
	die();
}

if(isset($_POST['username']) && isset($_POST['passwd'])) {
	if($_POST['username']=='john' && '8a368184fd838dbc4306156c5ba67e2e'==md5($_POST['passwd'])) {
		$isLoggedInShopping = true;
		$isAdminShopping = true;
		$myname = $_POST['username'];
	} else if($_POST['username']=='marry' && '061fba5bdfc076bb7362616668de87c8'==md5($_POST['passwd'])) {
		$isLoggedInShopping = true;
		$myname = $_POST['username'];
	} else {
		echo "Invalid Username/Password";
	}
}
if($isLoggedInShopping)
	setcookie("usernameshopping", base64_encode($myname));

if(isset($_COOKIE['usernameshopping']) && !empty($_COOKIE['usernameshopping'])) {
	$myname = trim(base64_decode($_COOKIE['usernameshopping']));
	$isLoggedInShopping = true;
}
if($isLoggedInShopping && $myname=='john') {
	$isAdminShopping = true;
}

if(isset($_POST['deleteAll'])) {
	if($isAdminShopping) {
		echo "All Post Deleted, Flag : ".getFlag(1)." <br>";
		die();
 	} else {
 		echo "Only 'Admin' can delete Post's<br>";
 	}
}

if($isLoggedInShopping){
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
<br>
<br>
<form action='#' method='POST'>
<input type='text' name='username' value='' placeholder="Username"><br><br>
<input type='password' name='passwd' value='' placeholder="Password"><br><br>
<input type='submit'  value='Login'><br>
</form>
</center>
<?php
}
?>
</body>
</html>
