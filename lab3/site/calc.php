<?php 
declare(strict_types=1);
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Калькулятор</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header><?php include 'inc/top.inc.php'; ?></header>
  <section>
    <h1>Калькулятор</h1>
    <form action='calc.php' method="POST">
      <input name='n1' type='text'>
      <select name='op'>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
      </select>
      <input name='n2' type='text'>
      <input type='submit' value='OK'>
    </form>
  </section>
  <nav><?php include 'inc/menu.inc.php'; ?></nav>
  <footer><?php include 'inc/bottom.inc.php'; ?></footer>
</body>
</html>