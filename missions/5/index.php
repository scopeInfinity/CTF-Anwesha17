<?php
require('../../flagcontroller.php');
mustLogin();
?>
<html>
<head><title>Careless Server Admin</title>
<link rel="stylesheet" type="text/css" href="miss5.css">
</head>
<body>
	<center><h1>Careless Server Admin</h1><br><br></center>
<?php
if(isset($_POST['key']) && !empty($_POST['key'])) {
	if($_POST['key']=='gotit')
		{echo "Yuhuuuuu Flag ".getFlag(5)."<br>";die();}
	else
		echo "Invalid Key<br>";
}
?>
<div class="cont">
	This from is created using gedit <img src="http://www.hey.fr/fun/emoji/twitter/en/twitter/649-emoji_twitter_face_with_stuck-out_tongue_and_winking_eye.png" width=25 height=25> <br>
<br>
<form action='#' method="POST">
	<input type='password' name='key' placeholder='Key'><br><br>
	<input type='submit' value='Test'> <br><br>
</form>
</div>

</body>
</html>
