<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		if ( isset($_POST['username']) && $_POST['password'] && ($_POST['username'] == 'admin') && ($_POST['password'] == '111111')){
			echo '<h1>Xin chào '.$_POST['username'].'</h1>';
		}
		else {	
	?>
	<form method="post">
		<p>
			<label for="username">Username:</label>
			<input type="text" name="username" value="<?=isset($_POST['username']) ? $_POST['username'] : ''?>"/>
		</p>
		<p>
			<label for="password">Password: </label>
			<input type="password" name="password" />
		</p>
		
		<button type="submit">Đăng nhập</button>
	</form>
	<?php
	}
	?>
</body>
</html>