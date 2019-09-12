<?php
	require_once 'header.php';
	 if (!$loggedin) die();

	 if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
	 else $view = $user;

	 if ($view == $user)
	 {
	 $name1 = $name2 = "Ваши"; 
	  
	 }
	 else
	 {
	 $name1 = "<a href='members.php?view=$view'>$view</a>'s";
	 $name2 = "$view's";
	 $name3 = "$view is";
	 }

 	 echo "<div class='main'>";

 	 showProfile($view);

	 $followers = array();
	 $following = array();

	 $result = queryMysql("SELECT * FROM friends WHERE user='$view'");
	 $num = mysqli_num_rows($result);
	 for ($j = 0 ; $j < $num ; ++$j)
	 {
	 $row = mysqli_fetch_assoc($result);
	 $followers[$j] = $row['friend'];
	 }
	 $result = queryMysql("SELECT * FROM friends WHERE friend='$view'");
	  $num = mysqli_num_rows($result);
	 for ($j = 0 ; $j < $num ; ++$j)
	 {
	 $row = mysqli_fetch_assoc($result);
	 $following[$j] = $row['user'];
	 }

	 $mutual = array_intersect($followers, $following);
	 $followers = array_diff($followers, $mutual);
	 $following = array_diff($following, $mutual);
	 $friends = FALSE;

	 if (sizeof($mutual))
	 {
	 echo "<span class='subhead'>$name2 друзья</span><ul>";
	 // Взаимные друзья
	 foreach($mutual as $friend)
	 echo "<li><a href='members.php?view=$friend'>$friend</a>";

	 echo "</ul>";
	 $friends = TRUE;
	 }
	 if (sizeof($followers))
	 {
	 echo "<span class='subhead'>$name2 подписчики</span><ul>";
	 // Интересующиеся в дружбе с...
	 foreach($followers as $friend)
	 echo "<li><a href='members.php?view=$friend'>$friend</a>";

	 echo "</ul>";
	 $friends = TRUE;
	 }
	 if (sizeof($following))
	 {
	 echo "<span class='subhead'>$name2 подписки</span><ul>";
	 // Заинтересован в дружбе с...
	 foreach($following as $friend)
	 echo "<li><a href='members.php?view=$friend'>$friend</a>";

	 echo "</ul>";
	 $friends = TRUE;
	 }
	 if (!$friends) echo "<br>На данный момент у вас нет друзей.<br><br>";
	 // Пока у вас нет друзей
	 echo "<a class='button' href='messages.php?view=$view'>" .
	 " $name2 сообщения</a>";
	 // Просмотр сообщений от ...
?>
 </div><br>
 </body>
</html>