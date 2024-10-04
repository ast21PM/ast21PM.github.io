<?php
declare(strict_types=1);


$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = htmlspecialchars($_POST['operator']);


    if ($num1 === false || $num2 === false) {
        $result = 'Ошибка: введите корректные числа.';
    } else {
  
        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    $result = 'Ошибка: деление на ноль невозможно.';
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                $result = 'Ошибка: некорректный оператор.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            transition: background-color 0.3s, color 0.3s;
        }
        .calculator-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #4CAF50;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            font-size: 18px;
            color: #333;
            margin-top: 20px;
        }
        .error {
            color: #f44336;
        }
        .theme-toggle {
            margin-top: 10px;
            cursor: pointer;
            background-color: transparent;
            border: none;
            font-size: 18px;
            color: #333;
        }


        body.dark-mode {
            background-color: #121212;
            color: #f0f0f0;
        }
        .calculator-container.dark-mode {
            background-color: #1e1e1e;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
        }
        h1.dark-mode {
            color: #4CAF50;
        }
        input[type="text"].dark-mode, select.dark-mode {
            background-color: #333;
            color: #f0f0f0;
            border: 1px solid #444;
        }
        button.dark-mode {
            background-color: #3f51b5;
        }
        button.dark-mode:hover {
            background-color: #2c3e9a;
        }
        .theme-toggle.dark-mode {
            color: #f0f0f0;
        }
        .result.dark-mode {
            color: #ffffff; 
        }
    </style>
</head>
<body>

<div class="calculator-container">
    <h1>Калькулятор</h1>

    <?php if ($result !== ''): ?>
        <p class="result <?= isset($_POST['theme']) && $_POST['theme'] === 'dark' ? 'dark-mode' : '' ?>">
            <?= is_numeric($result) ? "Результат: $result" : "<span class='error'>$result</span>" ?>
        </p>
    <?php endif; ?>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">

        <label for="num1">Число 1</label>
        <input type="text" name="num1" id="num1" required>

        <label for="operator">Оператор</label>
        <select name="operator" id="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>

        <label for="num2">Число 2</label>
        <input type="text" name="num2" id="num2" required>

        <button type="submit">Считать!</button>
    </form>

    <button class="theme-toggle" id="theme-toggle">🌙</button>
</div>

<script>
    const toggleButton = document.getElementById('theme-toggle');
    const body = document.body;
    const container = document.querySelector('.calculator-container');
    const inputs = document.querySelectorAll('input, select, button');
    const result = document.querySelector('.result');

    toggleButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        container.classList.toggle('dark-mode');
        toggleButton.classList.toggle('dark-mode');
        inputs.forEach(input => input.classList.toggle('dark-mode'));
        if (result) {
            result.classList.toggle('dark-mode');
        }
        toggleButton.textContent = body.classList.contains('dark-mode') ? '☀️' : '🌙';
    });
</script>

</body>
</html>
