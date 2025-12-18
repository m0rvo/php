<?php 
declare(strict_types=1);
require_once 'inc/lib.inc.php'; //
require_once 'inc/data.inc.php'; //
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Контакты</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <?php include 'inc/top.inc.php'; // ?>
  </header>
  <section>
    <h1>Обратная связь</h1>
    <h3>Адрес</h3>
    <address>123456 Москва, Малый Американский переулок 21</address>
    <h3>Задайте вопрос</h3>
    <form method='post'>
      <label>Тема письма: </label><br>
      <input name='subject' type='text' size="50"><br>
      <label>Содержание: </label><br>
      <textarea name='body' cols="50" rows="10"></textarea><br><br>
      <input type='submit' value='Отправить'>
    </form>
  </section>
  <nav>
    <?php include 'inc/menu.inc.php'; // ?>
  </nav>
  <footer>
    <?php include 'inc/bottom.inc.php'; // ?>
  </footer>
</body>
</html>