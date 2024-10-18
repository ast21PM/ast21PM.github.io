<?php
	$now = time(); 
	$currentYear = date('Y');
	$birthday = mktime(0, 0, 0, 7, 29, $currentYear);

	if ($birthday < $now) {
		$birthday = mktime(0, 0, 0, 7, 29, $currentYear + 1);
	}

	$hour = getdate($now)['hours']; 

	if ($hour >= 0 && $hour < 6) {
		$welcome = 'Доброй ночи';
	} elseif ($hour >= 6 && $hour < 12) {
		$welcome = 'Доброе утро';
	} elseif ($hour >= 12 && $hour < 18) {
		$welcome = 'Добрый день';
	} elseif ($hour >= 18 && $hour < 23) {
		$welcome = 'Добрый вечер';
	} else {
		$welcome = 'Доброй ночи';
	}

	setlocale(LC_TIME, 'ru_RU.UTF-8');

	$formatter = new IntlDateFormatter('ru_RU', IntlDateFormatter::FULL, IntlDateFormatter::MEDIUM);
	$currentDate = $formatter->format($now);

	$timeToBirthday = $birthday - $now;
	$daysLeft = floor($timeToBirthday / (60 * 60 * 24));
	$hoursLeft = floor(($timeToBirthday % (60 * 60 * 24)) / (60 * 60));
	$minutesLeft = floor(($timeToBirthday % (60 * 60)) / 60);
	$secondsLeft = $timeToBirthday % 60;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
	<style>
		body {
			font-family: 'Arial', sans-serif;
			background-color: #1f1f1f;
			color: #ffffff;
			margin: 0;
			padding: 0;
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
			flex-direction: column;
			text-align: center;
		}
		h1 {
			color: #ff6b6b;
		}
		p {
			font-size: 1.2rem;
			margin: 10px 0;
		}
		.container {
			background-color: #2e2e2e;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
			max-width: 600px;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Использование функций даты и времени</h1>

		<?php
			echo "<p>$welcome</p>";
			echo "<p>Сегодня $currentDate</p>";
			echo "<p>До моего дня рождения осталось $daysLeft дней, $hoursLeft часов, $minutesLeft минут и $secondsLeft секунд</p>";
		?>
	</div>
</body>
</html>
