<?php
	if ( ($_POST['username'] == 'admin') && ($_POST['password'] == '111111')){
		echo '<h1>Xin chào '.$_POST['username'].'</h1>';
	}
	else {
		header('Location:form.php');
	}
?>
