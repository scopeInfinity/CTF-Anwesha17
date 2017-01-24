<?php
require('../../flagcontroller.php');
?>
<html>

<head>
	<title>Just Login</title>
</head>
<body>
	<?php
	$success =false;
		if(isset($_POST['uname']) && isset($_POST['pwd'])) {
			$conv = mysqli_connect(DB_HOST,'ctfdbview',"wecandoitna","CTF17");

			// Check connection
			if (mysqli_connect_errno())
			{
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  die();
			}

			$uname = mysqli_real_escape_string($conv,$_POST['uname']);
			$pwd = $_POST['pwd'];

			$query = "SELECT uname from m3_login where uname='$uname' and passwd='$pwd';";
			$result = mysqli_query($conv,$query);
			if($result) {
				if(mysqli_num_rows($result)>0) {
					echo "Logged In : Flag ".getFlag(3)."<br>";
					$success=true;
				} else {
					echo "Invalid Credentials";
				}
			} else {
				echo "Error in query <br>$query<br> ".mysqli_error($conv);
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