<?php
session_start();

?>

<html>
<head>
	<title>
		<title>User page</title>
		<link rel="stylesheet" href="reg/style.css">
	</title>
</head>
<body>
	<h1><?php echo "Hello {$_SESSION['username']}";?></h1>
	<h1><?php echo "<a href='logout/logout.php'>LogOut</a>";;?></h1>
</body>
</html>