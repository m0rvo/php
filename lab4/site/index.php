<?php
declare(strict_types=1);
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';

/**
 * Определение приветствия в зависимости от часа
 * @param int $hour Текущий час
 * @return string
 */
function getWelcome(int $hour): string {
    if ($hour >= 0 && $hour < 6) return 'Доброй ночи';
    if ($hour >= 6 && $hour < 12) return 'Доброе утро';
    if ($hour >= 12 && $hour < 18) return 'Добрый день';
    return 'Добрый вечер';
}

$hour = (int)getdate()['hours'];
$welcome = getWelcome($hour);

// Инициализация заголовков страницы
$title = 'Сайт нашей школы';
$header = "$welcome, Гость!";
$id = strtolower(strip_tags(trim($_GET['id'] ?? '')));

switch($id) { 
    case 'about':
        $title = 'О сайте';
        $header = 'О нашем сайте';
        break;
    case 'contact':
        $title = 'Контакты';
        $header = 'Обратная связь';
        break;
    case 'table':
        $title = 'Таблица умножения';
        $header = 'Таблица умножения';
        break;
    case 'calc':
        $title = 'Онлайн калькулятор';
        $header = 'Калькулятор';
        break; 
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header><?php include 'inc/top.inc.php'; ?></header>
  <section>
    <h1><?= $header ?></h1>
    <?php
    // Динамическое подключение контента
    switch($id) {
        case 'about': include 'about.php'; break;
        case 'contact': include 'contact.php'; break;
        case 'table': include 'table.php'; break;
        case 'calc': include 'calc.php'; break;
        default: include 'inc/index.inc.php'; 
    }
    ?>
  </section>
  <nav><?php include 'inc/menu.inc.php'; ?></nav>
  <footer><?php include 'inc/bottom.inc.php'; ?></footer>
</body>
</html>