<?php
	require_once 'functions.php';

	if(isset($_POST['user']))
	{
		$user = sanitizeString($_POST['user']);
		$result = queryMysql("SELECT * FROM members WHERE user='$user'");

		if(mysqli_num_rows($result))
		{
			echo "<span class='taken'>&nbsp;&#x2718; " . "Извините, но это имя уже занято</span>";

		}
		else echo "<span class='available'>&nbsp;&#x2714; " . "Это имя доступно</span>";
	}
?>