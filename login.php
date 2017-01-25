<?php
if(isset($_POST['anwid']) && isset($_POST['pass'])) {
	require("controller.php");
	if (canLogin($_POST['anwid'], $_POST['pass'])) {
		session_regenerate_id(true);
	}
}
else
echo "Invalid Input";
?>