<?php
$bmw = [
	'model' => 'Bmw 3 series',
	'speed, km/h' => 220,
	'doors' => 4,
	'year' => 2019
];

$koenigsegg = [
	'model' => 'Agera Rs',
	'speed, km/h' => 445,
	'doors' => 2,
	'year' => 2017
];

$nissan = [
	'model' => 'Skyline',
	'speed, km/h' => 160,
	'doors' => 2,
	'year' => 2001
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Массивы</title>
</head>
<body>
	<h1>Массивы</h1>
	<?php
	echo "bmw - {$bmw['model']} - {$bmw['speed, km/h']} - {$bmw['doors']} - {$bmw['year']}<br>";
	echo "koenigsegg - {$koenigsegg['model']} - {$koenigsegg['speed, km/h']} - {$koenigsegg['doors']} - {$koenigsegg['year']}<br>";
	echo "nissan - {$nissan['model']} - {$nissan['speed, km/h']} - {$nissan['doors']} - {$nissan['year']}<br>";
	?>
</body>
</html>
