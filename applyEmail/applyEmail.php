<?php
require '../functions/functions.php';
session_start();
$conn = db_connect();
db_insert_regInfo("UPDATE registInfo SET activation = 1 WHERE login= :id",array('id'=>$_SESSION['username']),$conn);
?>
<!doctype html>
<html>
<head>
	<title>
		Activation page
	</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../reg/style.css">
	<style>
		body{

		}
	</style>
</head>
<body>
	
	<h1>Hello <?php echo $_SESSION['username'];?></h1>

	<p>Thank you to confirm you email adress</p>
	
	<p><a href="../index/index.php">Now LogIn please</a></p>
</body>
</html>