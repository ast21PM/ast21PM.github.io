<?php 
$login = ' ast '; 
$password = '0fICkiFsMR5VYD6J'; 
$name = 'никита'; 
$email = 'hororov@inbox.ru'; 
$code = '<?=$login?>'; 

$login = strtolower(trim($login)); 

function pass($password) { 
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

$passwordValid = pass($password) ? 'Пароль сложный' : 'Пароль не сложный'; 

$name = trim($name); 

$emailValid = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'Email корректен' : 'Email некорректен'; 
?> 

<!doctype html> 
<html lang="ru"> 
<head> 
    <meta charset="utf-8"> 
    <title>Использование функций обработки строк</title> 
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
        <h1>Использование функций обработки строк</h1> 

        <?php 
        echo "<p>Логин: $login</p>"; 
        echo "<p>$passwordValid</p>"; 
        echo "<p>Имя: " . mb_convert_case($name, MB_CASE_TITLE, "UTF-8") . "</p>"; 
        echo "<p>$emailValid</p>"; 
        echo htmlspecialchars($code, ENT_QUOTES, 'UTF-8'); 
        ?> 
    </div> 
</body> 
</html>
