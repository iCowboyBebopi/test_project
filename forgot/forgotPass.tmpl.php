<!doctype html>
<html>
<head>
	<title>
		Forgot Password
	</title>
	<link rel="stylesheet" href="../reg/style.css">
</head>
<body>
	
	<h1>Please enter your registrate email. And we will sent the password there.</h1>

	<h1 class="matchDataH">
		<?php  
			if(isset($status)){echo $status;} 
			if(isset($status1)){echo $status1;}
			if(isset($status2)){echo $status2;}
		?>
	</h1>

	<form action="" method="post">
		
		<ul>
			<li>
				<label for="email">Enter yout registrate email</label>
				<input type="text" id="email" name="email" required>
			</li>
			<li>
				<input type="submit">
			</li>
		</ul>

	</form>

	<p><a href="../index/index.php">Back to start page</a></p>

</body>
</html>