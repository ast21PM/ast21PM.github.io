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
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
        }

        th {
            background-color: yellow; 
        }

        .header-red {
            background-color: red;
        }

        .header-yellow {
            background-color: yellow; 
        }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>

    <?php 

    function generateMultiplicationTable($size, $headerClass) {
        echo "<table><tbody>";

        // Заголовок таблицы
        echo "<tr>";
        echo "<th class='$headerClass'></th>";  
        for ($i = 1; $i <= $size; $i++) {
            echo "<th class='$headerClass'>$i</th>";  
        }
        echo "</tr>";

        // Строки таблицы
        for ($i = 1; $i <= $size; $i++) {
            echo "<tr>";
            echo "<th class='$headerClass'>$i</th>";  
            for ($j = 1; $j <= $size; $j++) {
                echo "<td>" . ($i * $j) . "</td>";  
            }
            echo "</tr>";
        }

        echo "</tbody></table>"; 
    }

    $tableCount = 0;


    generateMultiplicationTable(5, 'header-yellow');
    $tableCount++;


    generateMultiplicationTable(10, 'header-red');
    $tableCount++;


    generateMultiplicationTable(8, 'header-yellow');
    $tableCount++;


    generateMultiplicationTable(5, 'header-yellow');
    $tableCount++;

    echo "<hr>Таблица была отрисована $tableCount раз."; 
    ?> 
</body>
</html>
