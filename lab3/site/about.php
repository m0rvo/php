<?php 
declare(strict_types=1);
require_once 'inc/lib.inc.php'; //
require_once 'inc/data.inc.php'; //
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>О сайте</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <?php include 'inc/top.inc.php'; // ?>
  </header>
  <section>
    <h1>О нашем сайте</h1>
    <p>
      Сайт создан на общественных началах и управляется на некоммерческой основе.
    </p>
    <h3>Цели создания проекта</h3>
    <ol>
      <li>поднятие престижа нашей школы.</li>
      <li>информирование родителей будущих учеников.</li>
      <li>общение выпускников и учителей.</li>
    </ol>
  </section>
  <nav>
    <?php include 'inc/menu.inc.php'; // ?>
  </nav>
  <footer>
    <?php include 'inc/bottom.inc.php'; // ?>
  </footer>
</body>
</html>