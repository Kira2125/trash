<?php

require_once 'header.php';

if (!$loggedin) die();

echo "<div class='main'>";

if(isset($_GET['view']))
{
	$view = sanitizeString($_GET['view']);

	if($view == $user) $name = "Ваши";
	else 			   $name = "$view's";

	echo "<h3>Ваш профиль</h3>";
	showProfile($view);
	echo "<a class='button' href='messages.php?view=$view'>" .
		 "$name сообщения</a><br><br>";
	die("</div></body></html>");
}

if(isset($_GET['add']))
{
	$add = sanitizeString($_GET['add']);
	$result = queryMysql("SELECT * FROM friends WHERE user='$add' AND friend='$user'");

	if(!mysqli_num_rows($result))
		queryMysql("INSERT INTO friends VALUES ('$add', '$user')");
}
elseif(isset($_GET['remove']))
{
	$remove = sanitizeString($_GET['remove']);
	queryMysql("DELETE FROM friends WHERE user='$remove' AND friend='$user'");
}

$result = queryMysql("SELECT user FROM members ORDER BY user");
$num = mysqli_num_rows($result);

echo "<h3>Пользователи сети</h3><ul>";

for ($j = 0; $j < $num; ++$j)
{
	$row = mysqli_fetch_assoc($result);
	if (($row['user']) == $user) continue;
	
	echo "<li><a href='members.php?view=" .
	$row['user'] . "'>" . $row['user'] . "</a>";
	$follow = "Добавить в друзья";

	$result1 = queryMysql("SELECT * FROM friends WHERE
 		user='" . $row['user'] . "' AND friend='$user'");//////////////////
 	$t1 = mysqli_num_rows($result1);
 	$result1 = queryMysql("SELECT * FROM friends WHERE
 		user='$user' AND friend='" . $row['user'] . "'");
 	$t2 = mysqli_num_rows($result1);

 	if(($t1 + $t2) > 1) echo " &harr; ваш друг";
 	elseif($t1) echo " &larr; вы отправили запрос в друзья";
 	elseif($t2)
 	{
 	 echo " &rarr; хочет добавить вас в друзья";
 	$follow = "Принять дружбу";
 	}

 	if(!$t1) echo " [<a href='members.php?add=" . $row['user'] . "'>$follow</a>]";
 	else echo " [<a href='members.php?remove=" . $row['user'] . "'>удалить из друзей</a>]";
}
?>

	</ul></div>
</body>
</html>