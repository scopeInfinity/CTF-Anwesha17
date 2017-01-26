<?php
require('../../flagcontroller.php');
mustLogin();
?>
<html>
<head><title>We use gedit</title>
<link rel="stylesheet" type="text/css" href="miss5.css">
</head>
<body>
<?php
if(isset($_POST['key']) && !empty($_POST['key'])) {
	if($_POST['key']=='gotit')
		{echo "Yuhuuuuu Flag ".getFlag(5)."<br>";die();}
	else
		echo "Invalid Key<br>";
}
?>
<div class="cont">
Yeh we can create php using gedit too :P <br>
<form action='#' method="POST">
	<input type='password' name='key' placeholder='Key'>
	<input type='submit' value='Test'> 
</form>
</div>
</body>
</html>
