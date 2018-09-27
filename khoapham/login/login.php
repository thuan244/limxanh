<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		h1{
			text-align: center;
		}
		.login-form{
			display:  flex;
		}
		form{
			align-items: center;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<?php
		if (isset($_COOKIE['remember'])) {
			header('Location: home.php');
		}
		else{
	?>
	<h1>Login form</h1>
	
	<div class="login-form">
		<form action="xulylogin.php" method="post">
			<p>
				<label >Username:</label>
				<input type="text" name="username">
			</p>
			<p>
				<label >Password:</label>
				<input type="password" name="password">
			</p>
			<p>
				<label >Remember me?</label>
				<input type="checkbox" name="remember" value="1">
			</p>
			<button>Login</button>
		</form>
	</div>
	<?php
		}
	?>
</body>
</html>