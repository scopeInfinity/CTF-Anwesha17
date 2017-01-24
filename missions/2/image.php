<html>
<head><title>Upload File</title></head>
<body>
	<?php
	if(isset($_FILES["file"]["tmp_name"])) {
		if(exif_imagetype($_FILES["file"]["tmp_name"]) == IMAGETYPE_JPEG && $_FILES["file"]["size"]==2048) {
		    require('../../flagcontroller.php');
			echo "Congo! Flag ".getFlag(2)."<br>";
		} else {
			echo 'Not This<br>	';
		}
	}
	?>
	<form action='#' method='POST'  enctype="multipart/form-data">
	Select file upload 
    <input type="file" name="file">
    <input type="submit" value="Upload" name="submit">
	</form>
</body>
</head>