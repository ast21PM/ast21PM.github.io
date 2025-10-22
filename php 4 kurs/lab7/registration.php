<?php 
session_start();

$message = '';
$image_enabled = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['image_check']) && $_POST['image_check'] === '') {
        $image_enabled = false;
        $message = '<p class="error">Внимание! Изображения отключены в вашем браузере. Пожалуйста, включите отображение изображений.</p>';
    } else {
        if (isset($_POST['answer']) && isset($_SESSION['captcha_code'])) {
            $user_answer = trim($_POST['answer']);
            $captcha_code = $_SESSION['captcha_code'];
            
            if ($user_answer === $captcha_code) {
                $message = '<p class="success">Отлично! Вы правильно ввели символы с изображения.</p>';
            } else {
                $message = '<p class="error">Ошибка! Введенные символы не совпадают с изображением. Попробуйте еще раз.</p>';
            }
            
            unset($_SESSION['captcha_code']);
        } else {
            $message = '<p class="error">Ошибка! Пожалуйста, введите символы с изображения.</p>';
        }
    }
}
?>
<!DOCTYPE HTML>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <title>Регистрация</title>
  <style>
    body {
      background-color: #121212;
      color: #e0e0e0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
      padding: 40px 20px;
      margin: 0;
    }
    h1 {
      color: #ffffff;
      text-align: center;
      margin-bottom: 30px;
      text-shadow: 0 0 5px #00bcd4;
    }
    form {
      background: #1e1e1e;
      padding: 25px 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0, 188, 212, 0.4);
      width: 320px;
    }
    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #b0bec5;
    }
    input[type="text"] {
      width: 100%;
      padding: 8px 12px;
      border-radius: 6px;
      border: 1px solid #333;
      background-color: #2b2b2b;
      color: #e0e0e0;
      font-size: 16px;
      transition: border-color 0.3s ease;
      box-sizing: border-box;
      margin-bottom: 20px;
    }
    input[type="text"]:focus {
      border-color: #00bcd4;
      outline: none;
      box-shadow: 0 0 5px #00bcd4;
      background-color: #3a3a3a;
    }
    input[type="submit"] {
      background-color: #00bcd4;
      border: none;
      color: #121212;
      font-weight: 700;
      padding: 10px 0;
      width: 100%;
      font-size: 18px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 4px 10px rgb(0 188 212 / 0.6);
    }
    input[type="submit"]:hover {
      background-color: #0097a7;
      box-shadow: 0 6px 14px rgb(0 151 167 / 0.8);
    }
    .captcha-container {
      text-align: center;
      margin-bottom: 18px;
    }
    .captcha-container img {
      border: 2px solid #00bcd4;
      border-radius: 8px;
      max-width: 100%;
      height: auto;
      box-shadow: 0 0 8px #00bcd4;
    }
    .captcha-refresh {
      display: inline-block;
      margin-top: 8px;
      color: #00bcd4;
      cursor: pointer;
      font-size: 14px;
      transition: color 0.3s ease;
      text-decoration: underline;
      user-select: none;
    }
    .captcha-refresh:hover {
      color: #80deea;
    }
    .success {
      color: #4caf50;
      font-weight: 600;
      margin-top: 15px;
      text-align: center;
    }
    .error {
      color: #ef5350;
      font-weight: 600;
      margin-top: 15px;
      text-align: center;
    }
  </style>

  <script>
    window.onload = function() {
      var img = document.getElementById('captcha_img');
      if (img.complete && img.naturalHeight !== 0) {
        document.getElementById('image_check').value = '1';
      }
    };
    
    function refreshCaptcha() {
      document.getElementById('captcha_img').src = 'noise-picture.php?rand=' + Math.random();
    }
  </script>
</head>

<body>
  <form action="" method="post" autocomplete="off">
    <h1>Регистрация</h1>
    <div class="captcha-container">
      <img id="captcha_img" src="noise-picture.php" alt="Проверочный код">
      <br>
      <a class="captcha-refresh" href="javascript:refreshCaptcha()">Обновить изображение</a>
    </div>
    <label for="answer">Введите строку</label>
    <input type="text" name="answer" id="answer" size="6" autocomplete="off" required>
    <input type="hidden" name="image_check" id="image_check" value="">
    <input type="submit" value="Подтвердить">
    <?php 
      if (!empty($message)) {
          echo $message;
      }
    ?>
  </form>
</body>

</html>
