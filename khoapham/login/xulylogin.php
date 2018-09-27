<?php
	if( isset($_POST['username']) && isset($_POST['password']) && ($_POST['username'] =='admin') && ($_POST['password'] =='111111')){
		session_start();
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
		if( isset($_SESSION['username']) && isset($_SESSION['password']) ){
			if( isset($_POST['remember']) && $_POST['remember'] == 1){
				$cookies = json_encode(array('username'=>$_POST['username'],'password'=>$_POST['password']));
				$encoded = base64_encode($cookies);
				setcookie('remember', $encoded, time() + 120);
				
			}
		}
		
	}
	else{
		header('Location: login.php');
	}
?>