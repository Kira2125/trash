<?php
	require_once 'header.php';
	echo "<br><span class='main'>Добро пожаловать в $appname. ";

	if($loggedin) echo " $user, вы вошли.";
	else echo "Пожалуйста войдите  под своим именем или зарегестрируйтесь.";
?>

	</span><br><br>
</body>
</html>