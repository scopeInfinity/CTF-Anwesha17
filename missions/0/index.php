<?php
require('../../flagcontroller.php');
mustLogin();
?>
<html>

<head>
	<title>Get Flag</title>
	<link rel="stylesheet" type="text/css" href="miss0.css">
</head>
<body>
	<script type="text/javascript">
	function done () {
		var key=document.getElementById("key").value;
		if(key=="yipeeeeeeeeee") {
			document.getElementById("keyhere").innerHTML="Flag is "+<?php echo '"'.getFlag(0).'"';?>;
		}
		else {
			alert("Wrong Key");
		}
		
	}</script>
	<div class="cont">
	<input type='text' id='key' placeholder='Enter Key'><br>
	<input type='button' onclick='done();' value='Give me Flag'> <br>
	<span id='keyhere' >
	</div>
</body>
</html>
