<?php
require('../../flagcontroller.php');
mustLogin();
?>
<html>
<head><title>Secret Code</title>
<link rel="stylesheet" type="text/css" href="miss8.css">
</head>
<body>
	<?php
	$ua = $_SERVER['HTTP_USER_AGENT'];
	if(!(preg_match('/Version\/10/i',$ua) && preg_match('/iPhone/i',$ua) ))
	echo "Sorry Secret Code is only for IPhone 10 Users <br>";
	else
	echo "Flag is ". getFlag(8). " <br>";
	?>

</body>
</html>
