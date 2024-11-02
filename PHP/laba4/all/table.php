<?php
$result = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);

    if ($num1 === false || $num2 === false) {
        echo "Введите корректные числа.";
    } else {
        switch ($_POST["operator"]) {
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
                    echo "Ошибка: деление на ноль.";
                } else {
                    $result = $num1 / $num2;
                }
                break;
        }
    }
}

if ($result !== null) {
    echo "<h2>Результат: $result</h2>";
}
?>

<form action="index.php?id=calc" method="post">

<p><label for="num1">Число 1</label><br>
<input type="number" name="num1" id="num1" required></p>

<p><label for="operator">Оператор</label><br>
<select name="operator" id="operator">
    <option value="+" selected >+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
</select></p>

<p><label for="num2">Число 2</label><br>
<input type="number" name="num2" id="num2" required></p>

<button type="submit">Считать!</button>

</form>