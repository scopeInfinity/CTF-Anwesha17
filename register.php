<?php
if(isset($_POST['anwid']) && isset($_POST['username']) && isset($_POST['pass'])) {
	require("controller.php");
	register($_POST['username'],$_POST['anwid'], $_POST['pass']);
}
else
echo "Invalid Input";
?>