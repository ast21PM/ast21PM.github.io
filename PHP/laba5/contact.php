<?php 
    $message = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $subject = htmlspecialchars(trim($_POST['subject']));
        $body = htmlspecialchars(trim($_POST['body']));

        $to = "nikanika773@yandex.ru"; 
        $headers = "From: admin@center.ogu\r\n";
        $headers .= "Reply-To: admin@center.ogu\r\n";
        $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

        if (mail($to, $subject, $body, $headers)) {
            $message = "Ваше сообщение было успешно доставлено";
        } else {
            $message = "ошибка при доставлении письма";
        }
    }
?>


<!DOCTYPE html>
<html>

<head>
  <title>Контакты</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <header>
    <img src="logo.png" width="130" height="80" alt="Наш логотип" class="logo">
    <span class="slogan">приходите к нам учиться</span>
  </header>

  <section>
    <h1>Обратная связь</h1>
    <h3>Адрес</h3>
    <address>123456 Москва, Малый Американский переулок 21</address>
    <h3>Задайте вопрос</h3>
    <form action='' method='post'>
      <label>Тема письма: </label>
      <br>
      <input name='subject' type='text' size="50">
      <br>
      <label>Содержание: </label>
      <br>
      <textarea name='body' cols="50" rows="10"></textarea>
      <br>
      <br>
      <input type='submit' value='Отправить'>
      <span><?php echo $message; ?></span>
    </form>
  </section>
  <nav>
    <h2>Навигация по сайту</h2>
    <ul>
      <li><a href='index.php'>Домой</a>
      </li>
      <li><a href='about.php'>О нас</a>
      </li>
      <li><a href='contact.php'>Контакты</a>
      </li>
      <li><a href='table.php'>Таблица умножения</a>
      </li>
      <li><a href='calc.php'>Калькулятор</a>
      </li>
    </ul>
  </nav>
  <footer>
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 20xx
  </footer>
</body>

</html>