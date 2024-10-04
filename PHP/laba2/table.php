<?php
$cols = rand(1, 10);
$rows = rand(1, 10);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table {
			border: 2px solid black;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 10px;
			border: 1px solid black;
			text-align: center;
		}

		th {
			background-color: yellow;
		}

		td {
			background-color: white;
		}

		.first-row,
		.first-col {
			background-color: yellow;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<h1>Таблица умножения</h1>
	<table>
		<?php
		echo "<tr><th></th>";
		for ($i = 1; $i <= $cols; $i++) {
			echo "<th class='first-row'>$i</th>";
		}
		echo "</tr>";
		for ($i = 1; $i <= $rows; $i++) {
			echo "<tr>";
			echo "<th class='first-col'>$i</th>";
			for ($j = 1; $j <= $cols; $j++) {
				$result = $i * $j;
				echo "<td>$result</td>";
			}
			echo "</tr>";
		}
		?>
	</table>
</body>
</html>
