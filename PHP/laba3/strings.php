<?php
	$login = ' ast ';
	$password = 'kdjfuwdjJDWKD72';
	$name = 'Никита';
	$email = 'hororov@inbox.ru';
	$code = '<?=$login?>';
	$login = strtolower(trim($login));


	function checkPasswordComplexity($password) {
		if (strlen($password) < 8) {
			return false;
		}
		if (!preg_match('/[A-Z]/', $password)) {
			return false;
		}
		if (!preg_match('/[a-z]/', $password)) {
			return false;
		}
		if (!preg_match('/[0-9]/', $password)) {
			return false;
		}
		return true;
	}


	$passwordValid = checkPasswordComplexity($password) ? 'Пароль сложный' : 'Пароль не сложный';


	$name = ucfirst($name);


	$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'Email корректен' : 'Email некорректен';

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>

<?php

	echo "<p>Логин: $login</p>";
	echo "<p>$passwordValid</p>";
	echo "<p>Имя: $name</p>";
	echo "<p>$emailValid</p>";
	echo "<p>Code: $code</p>";
?>

</body>
</html>
