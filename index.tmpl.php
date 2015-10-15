<!--pip--!>
<!doctype html>
<html>
<head>
	<title>LogIn Page</title>
	<link rel="stylesheet" href="../reg/style.css">
</head>
<body>
	<h1>Hello stranger, please enter your Name and Password to continue</h1>
	<h1><?php 
		if (isset($status)){
			echo $status;
		} 
	?>
	</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="name" class="labels">Name</label>
				<input type="text" id ="name" name="name">
			</li>
			<li>
				<label for="password" class="labels">Password</label>
				<input type="password" id="password" name="password">
			</li>
			<li>
				<input type="submit" value="LogIn">
			</li>
		</ul>
	</form>
	<nav>
		<a href="../forgot/forgotPass.php">Lose your password</a>
		<a href="../reg/Registrate.php">New registration</a>
	</nav>
</body>
</html>