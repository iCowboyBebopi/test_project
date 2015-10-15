<!doctype html>
<html>
<head>
	<title>Hey-ho</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<h1>Hello stranger, so if you whant to have your page. Registrate here.</h1>

	<form action="" method='post'>
		<ul>
			<li>
				<div class="labels"><label for="login">login</label></div>
				<input type="text" id="login" name="login" required>
				<p class="matchData"> 
					<?php if(isset($status1)){echo $status1;}?>
				</p>
			</li>
			<li>
				<div class="labels"><label for="password">password</label></div>
				<input type="password" id="password" name="password" required>
			</li>
			<li>
				<div class="labels"><label for="email">email</label></div>
				<input type="text" id="email" name="email" required>
				<p class="matchData"> 
					<?php 
						  if(isset($status2)){echo $status2;}
						  if(isset($status2_1)){echo $status2_1;}
					?>
				</p>
			</li>
			<li>
				<input type="submit" value="Registrate">
			</li>
		</ul>
	</form>
</body>
</html>