<?php
require('../../controller.php');
mustLogin();
if(isset($_POST['name'])) {
	$name = $_POST['name'];
	$email = getEmail();
	// Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$headers .= 'From: CTF <ctf@anwesha.info>' . "\r\n";
	$content = "Hello $name,</br>   You are welcome from the Team of CTF</br></br>Regards</br>CTF, Anwesha 17";
	mail($email,$subject,$message,$headers);
}
?>
<html>

<head>
	<title>Email Client</title>
</head>
<body>

	<br>
	<form id='#' method='post'>
	<input type='text' name='name' placeholder='Name'><br>
	<input type='submit' value='Submit'> <br>
	</form>
	
</body>
</html>