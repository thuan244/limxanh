<?php
	session_destroy();
	setcookie('remember','',time()-120);
	setcookie('productIDS','',time()-120);
	header('Location: login.php');
?>