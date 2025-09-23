<?php

ini_set("session.use_only_cookies","0");

ini_set("session.use_trans_sid","1");


session_start();




include('savepage.inc.php');

?>

<!doctype html>



<html>

<head>

	<meta charset="utf-8">

	<title>Страница 2</title>

</head>

<body>



<h1>Страница 2</h1>



<?php


include('menu.inc.php');




include('visited.inc.php');

?>



</body>

</html>