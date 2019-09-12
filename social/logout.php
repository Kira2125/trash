<?php
require_once 'header.php';

		if(isset($_SESSION['user']))
		{
			destroySession();
			echo "<div class='main'>Вы покинули сайт." . 
			       "<a href='index.php'>Щелкните здесь</a> чтобы обновить экран.";
		}
		else echo "<div class='main'><br>" .
					"Вы не можете завершить сеанс работы, потому что не входили на сайт";
		
?>
	<br><br></div>
  </body>
</html>