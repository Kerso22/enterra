<?php

	$admin = 'admin';
	//md5(12345)
	$pass = '827ccb0eea8a706c4c34a16891f84e7b';
	session_start();
		
	if($_POST['submit']){
		if($admin == $_POST['login'] AND $pass == md5($_POST['pass'])){
		$_SESSION['admin'] = $admin;
		header("Location:index.php");
		exit;
	}else 
		header("Location:authorization.php?msg1=denied");
	}
	
	if($_GET['do'] == 'logout'){
		unset($_SESSION['admin']);
		session_destroy();
	}
	
	
	
?>