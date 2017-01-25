<?php
if(isset($_GET['flag'])) {
	require("controller.php");
	mustLogin();
	attemptQuestion($_REQUEST['flag']);
}
else
echo "Invalid Input";
?>