<?php
require('../../flagcontroller.php');
mustLogin();
?>
<html>

<head>
	<title>Secure Login</title>
        <link rel="stylesheet" type="text/css" href="miss4.css">
</head>
<body>
	Mission 3 is Secure, can u still get in<br>
	<?php
	$success =false;
		if(isset($_POST['uname']) && isset($_POST['pwd'])) {
			$conv = mysqli_connect(DB_HOST,'ctfdbview',"wecandoitna","ctf");

			// Check connection
			if (mysqli_connect_errno())
			{
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  die();
			}

			//Secure
			$uname = mysqli_real_escape_string($conv,$_POST['uname']);
			$pwd = md5($_POST['pwd']);
			$query = "SELECT uname from m4_login where uname='$uname' and passwd='$pwd';";


			$result = mysqli_query($conv,$query);
			if($result) {
				if(mysqli_num_rows($result)>0) {
					echo "Logged In : Flag ".getFlag(4)."<br>";
					$success=true;
				} else {
					echo "Invalid Credentials";
				}
			} else {
				echo "Unexpected Error!";
			}
		}
	if(!$success){
	?>

	<form id='#' method='post'>
		<input type='text' name='uname' value='admin'>
		<input type='password' name='pwd' value=''>
		<input type='submit' value='Login'>
	</form>	
	<?php
	}
	?>
</body>
</html>
