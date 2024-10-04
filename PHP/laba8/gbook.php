<?php
$mysqli = new mysqli("localhost", "f1036422_db", "qwerty123456", "f1036422_db");
$mysqli->set_charset("utf8");

if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name'], $_POST['email'], $_POST['msg'])) {
    $name = trim(htmlspecialchars(mysqli_real_escape_string($mysqli, $_POST['name'])));
    $email = trim(htmlspecialchars(mysqli_real_escape_string($mysqli, $_POST['email'])));
    $msg = trim(htmlspecialchars(mysqli_real_escape_string($mysqli, $_POST['msg'])));

    if (!empty($name) && !empty($email) && !empty($msg)) {
        $sql = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
        $mysqli->query($sql);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}


if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $sql = "DELETE FROM msgs WHERE id=$id";
    $mysqli->query($sql);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}


$sql = "SELECT * FROM msgs ORDER BY id DESC";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 20px;
            transition: background-color 0.3s, color 0.3s;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        h1 {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .messages {
            margin-top: 20px;
        }
        .message {
            padding: 10px;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ccc;
            position: relative;
        }
        .message h3 {
            margin: 0;
            color: #007BFF;
        }
        .message h3 span {
            font-size: 0.8em;
            color: #666;
            margin-left: 10px;
        }
        .delete-link {
            color: #ff4d4d;
            text-decoration: none;
            position: absolute;
            right: 10px;
            top: 10px;
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
        .container.dark-mode {
            background-color: #1e1e1e;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
        }
        input.dark-mode, textarea.dark-mode {
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
        .message.dark-mode {
            background-color: #2c2c2c;
        }
        .delete-link.dark-mode {
            color: #ff6b6b;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Гостевая книга</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        Ваше имя:<br>
        <input type="text" name="name" required><br>
        Ваш E-mail:<br>
        <input type="email" name="email" required><br>
        Сообщение:<br>
        <textarea name="msg" cols="30" rows="5" required></textarea><br>
        <button type="submit">Добавить</button>
    </form>

    <?php if ($result->num_rows > 0): ?>
        <div class="messages">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="message <?= isset($_POST['theme']) && $_POST['theme'] === 'dark' ? 'dark-mode' : '' ?>">
                    <h3>
                        <?php echo htmlspecialchars($row['name']); ?>
                        <span><?php echo date('d.m.Y H:i', strtotime($row['created_at'])); ?></span>
                    </h3>
                    <p><?php echo nl2br(htmlspecialchars($row['msg'])); ?></p>
                    <a class="delete-link" href="?delete=<?php echo $row['id']; ?>">Удалить</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>Записей пока нет.</p>
    <?php endif; ?>
    
    <button class="theme-toggle" id="theme-toggle">🌙</button>
</div>

<script>
    const toggleButton = document.getElementById('theme-toggle');
    const body = document.body;
    const container = document.querySelector('.container');
    const inputs = document.querySelectorAll('input, textarea, button');
    const messages = document.querySelectorAll('.message');

    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark-mode');
        container.classList.add('dark-mode');
        inputs.forEach(input => input.classList.add('dark-mode'));
        messages.forEach(message => message.classList.add('dark-mode'));
        toggleButton.textContent = '☀️';
    }

    toggleButton.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        container.classList.toggle('dark-mode');
        inputs.forEach(input => input.classList.toggle('dark-mode'));
        messages.forEach(message => message.classList.toggle('dark-mode'));
        toggleButton.textContent = body.classList.contains('dark-mode') ? '☀️' : '🌙';

        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });
</script>

</body>
</html>

<?php
$mysqli->close();
?>
