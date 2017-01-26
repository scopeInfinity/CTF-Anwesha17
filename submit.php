<?php
if(isset($_POST['flag'])) {
	require("controller.php");
	mustLogin();
	attemptQuestion($_REQUEST['flag']);
}
else
echo "Invalid Input";
?>