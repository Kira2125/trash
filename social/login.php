<?php

require_once 'header.php';

echo "<div class='main'>
			<h3>Введите свои данные для входа</h3>";

$user = $pass = $error = "";

if(isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);

	if($user == "" || $pass == "")
	{
		$error = "Вы не заполнили поле";
	}

	else 
	{
		$result = queryMySQL("SELECT user, pass FROM members WHERE user='$user' AND pass='$pass'");
		if(mysqli_num_rows($result) == 0)
		{
			$error = "<span class='error'>Неверно введены данные</span><br><br>";
		}
		else 
		{
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
			die("Вы вошли под именем $user. Перейти к своему <a href='members.php?view=$user'>профилю</a><br><br>");
		}
	}
}
echo <<<_END
<form method='POST' action='login.php'>$error
<span class='fieldname'>Имя</span><input type='text' maxlength='16' name='user' value='$user'><br>
<span class='fieldname'>Пароль</span><input type='password' maxlength='16' name='pass' value='$pass' autocomplete='on'>
_END;
?>
	<br>
	<span class='fieldname'>&nbsp;</span>
	<input type='submit' value="Войти">
	</form><br></div>
</body>
</html>