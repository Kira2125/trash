<?php
$appname = 'SKY';
$connect = mysqli_connect('localhost', 'mysql', 'mysql');
mysqli_query($connect, 'CREATE DATABASE IF NOT EXISTS social');

if (!$connect)
{
	echo "Нет подключения к базе данных";
}

$connection = mysqli_connect('localhost', 'mysql', 'mysql', 'social');

function createTable($name, $query)
{
	queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
	
}

createTable('members', 'user VARCHAR(16), pass VARCHAR(16), INDEX(user(6))');
	createTable('messages', 'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
							auth VARCHAR(16),
							recip VARCHAR(16),
							pm CHAR(1),
							time INT UNSIGNED,
							message VARCHAR(4096),
							INDEX(auth(6)),
							INDEX(recip(6))');
	createTable('friends', 'user VARCHAR(16),
							friend VARCHAR(16),
							INDEX(user(6)),
							INDEX(friend(6))');
	createTable('profiles', 'user VARCHAR(16),
							text VARCHAR(4096),
							INDEX(user(6))');

function queryMysql($query)
{
	global $connection;
	$result = mysqli_query($connection, $query);
	if(!$result)
	{
		echo 'Не удалось передать значение базе данных';
	}
	return $result;
}

function destroySession()
{
	$_SESSION = array();
	// if(session_id() != "" || isset($_COOKIE[session_name()]))
	// {
	// 	setcookie(session_name(), '', time()-2592000, '/');
		
	// }
	session_destroy();
}

function sanitizeString($var)
{
	global $connection;
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	return mysqli_real_escape_string($connection, $var);
}

function showProfile($user)
{
	if(file_exists("$user.jpg"))
		echo "<img src='$user.jpg' align='left'>";
	$result = queryMysql("SELECT * FROM profiles WHERE user='$user'");
	if(mysqli_num_rows($result))
	{
		$row = mysqli_fetch_assoc($result);
		
		echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
	}
}
?>