<?php
session_start();
	echo "<!DOCTYPE>\n<html><head>";
	require_once 'functions.php';

	$userstr = ' (Guest)';

	if(isset($_SESSION['user']))
	{
		
		$user = $_SESSION['user'];
		$loggedin = TRUE;
		$userstr = " ($user)";
	}
	else $loggedin = FALSE;

	echo <<<_END
	<title>$appname$userstr</title><link rel='stylesheet' 
									href='styles.css' type='text/css'>
	</head>
	<body>
		<center id='logo'>$appname</center>
		<div class='appname'>$appname$userstr</div>
		<script src='javascript.js'></script>
_END;

	if($loggedin)
	{
		echo <<<_END
		<br><ul class='menu'>
		<li><a href='members.php?view=$user'>Home</a></li>
		<li><a href='members.php'>Members</a></li>
		<li><a href='friends.php'>Friends</a></li>
		<li><a href='messages.php'>Messages</a></li>
		<li><a href='profile.php'>Профиль</a></li>
		<li><a href='logout.php'>Выйти</a></li></ul><br>
_END;
	}	
	else
	{
		echo <<<_END
		<br><ul class='menu'>
		<div id='menu'><li><a href='index.php'>Моя страница</a></li>
		<li><a href='signup.php'>Регистрация</a></li>
		<li><a href='login.php'>Вход</a></li></ul></div><br>
		<span class='info'>&#8658; Зарегистрируйтесь или войдите, чтобы увидеть содержимое.</span><br><br>
_END;
	}
?>
