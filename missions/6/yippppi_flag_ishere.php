<?php
require('../../flagcontroller.php');
mustLogin();
?>
<html>
<head>
	<title>Flag</title>
</head>
<body>
<?php
echo "Flag : ".getFlag(6)." <br>";

?>
	
</body>
</html>