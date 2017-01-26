<?php
require('../../flagcontroller.php');
mustLogin();
?>
<html>
<head><title>We use gedit</title></head>
<body>
	Yeh we can create php using gedit too :P <br>
<?php
if(isset($_POST['key']) && !empty($_POST['key'])) {
	if($_POST['key']=='gotit')
		{echo "Yuhuuuuu Flag ".getFlag(5)."<br>";die();}
	else
		echo "Invalid Key<br>";
}
?>
<form action='#' method="POST">
	<input type='password' name='key' placeholder='Key'>
	<input type='submit' value='Test'> 
</form>
</body>
</html>