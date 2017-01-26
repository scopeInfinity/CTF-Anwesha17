<?php
require('../../flagcontroller.php');
mustLogin();
?>
<html>
<head>
	<title>Flag</title>
</head>
<body style='background-color:yellow;'>
	<center><br><h1>It's free points</h1><br><br><br>
	<?php
	echo "Flag : ".getFlag(6)." <br>";
	?>
	</center>	
</body>
</html>