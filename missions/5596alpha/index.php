<?php
require('../../flagcontroller.php');
mustLogin();
?>
<html>
<head><title>Hack using logs</title>
<link rel="stylesheet" type="text/css" href="miss8.css">
</head>
<body style='background-color:yellow'>
	<center>
		<h1>Story</h1><br>
		<div style='text-align:left;'>
	<?php
	if(isset($_GET['name'])) {
		if(preg_match('/<script>.*alert\(([\'"])[A-Za-z0-9 ]+\1\).*;.*<\/script>/i',$_GET['name']))	
		echo "Flag is ". getFlag("5596alpha"). " <br><br><br>";
		echo "Hello, ".$_GET['name']."<br>";
	?>
		"Landlord!" said I, "what sort of chap is he -- does he always keep such late hours?" It was now hard upon twelve o'clock.The landlord chuckled again with his lean chuckle, and seemed to be mightily tickled at something beyond my comprehension. "No," he answered, "generally he's an early bird -- airley to bed and airley to rise -- yea, he's the bird what catches the worm. -- But to-night he went out a peddling, you see, and I don't see what on airth keeps him so late, unless, may be, he can't sell his head.""Can't sell his head? -- What sort of a bamboozingly story is this you are telling me?" getting into a towering rage. "Do you pretend to say, landlord, that this harpooneer is actually engaged this blessed Saturday night, or rather Sunday morning, in peddling his head around this town?"
		</div><br>
	<?php
	}
	else{
	?>
	<h1>Story Narrator</h1><br>
	This form open's up page with your name along with a short description.<br>
	Show your friend that you are geeky, Show them Name is alert box rather than simple text<br><br>
	<form method='get' action='#'>
		<input type='text' name='name' placeholder='Name'>
		<input type='submit' value='Done'>
	</form>
	<?php
	}
?>
</center>
</body>
</html>
