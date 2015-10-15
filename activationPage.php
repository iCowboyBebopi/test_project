<?php
session_start();
?>
<!doctype html>
<html>
<head>
	<title>
		Activation page
	</title>
	<meta charset="utf-8">
	<style>
		body{

		}
	</style>
</head>
<body>
	
	<h1>Hello <?php echo $_SESSION['username'];?></h1>

	<p>To finish regestration please confirm you email adress</p>

</body>
</html>