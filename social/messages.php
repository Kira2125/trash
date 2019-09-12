<?php

require_once 'header.php';

if(!$loggedin) die();

if(isset($_GET['view'])) $view = sanitizeString($_GET['view']);
else 					 $view = $user;

if(isset($_POST['text']))
{
	$text = sanitizeString($_POST['text']);

	if($text != "")
	{
		$pm = substr(sanitizeString($_POST['pm']), 0, 1);
		$time = time();
		queryMysql("INSERT INTO messages VALUES(NULL, '$user',
					'$view', '$pm', $time, '$text')");
	}
}

if($view != "")
{
	if($view == $user) $name1 = $name2 = "Ваши";
	else
	{
		$name1 = "<a href='members.php?view=$view'>$view</a>";
		$name2 = "$view";
	}

	echo "<div class='main'><h3>Сообщение к $name1</h3>";

	showProfile($view);

	echo <<<_END
<form method='post' action='messages.php?view=$view'>
	Текст сообщения<br>
<textarea name='text' cols='40' rows='3'></textarea><br>
	Публичное<input type='radio' name='pm' value='0' checked='checked'>
	Личное<input type='radio' name='pm' value='1'>
	<input type='submit' value='Отправить'></form><br>
_END;

	if(isset($_GET['erase']))
	{
		$erase = sanitizeString($_GET['erase']);
		queryMysql("DELETE FROM messages WHERE id=$erase AND recip='$user'");
	}

	$query = "SELECT * FROM messages WHERE recip='$view' ORDER BY time DESC";
	$result = queryMysql($query);
	$num = mysqli_num_rows($result);

	for($j = 0; $j < $num; ++$j)
	{
		$row = mysqli_fetch_assoc($result);

		if($row[3] == 0 || $row[1] == $user || $row[2] == $user)
		{
			echo date('M jS \'y g:ia:', $row['time']);

			echo " <a href='messages.php?view=" . $row['auth'] . "'>" . $row['auth'] . "</a> ";


			if($row['pm'] == 0)
			{
				echo "публичное сообщение: '" . $row['message'] . "'";
			}
			else echo "личное сообщение: <span class='whisper'>" . "'" . $row['message'] . "'</span>";

			if($row['recip'] == $user)
				echo "[<a href='messages.php?view=$view" . 
						"&erase=" . $row['id'] . "'>удалить</a>]";

			echo "<br>";
		}
	}
}

if (!$num) echo "<br><span class='info'>
			У вас нет сообщений на данный момент</span><br><br>";

echo "<br><a class='button'
			href='messages.php?view=$view'>Обновить сообщения</a>".
			"<a class='button' href='friends.php?view=$view'>$name2 друзья</a>";
?>

	</div><br>
	</body>
</html>
