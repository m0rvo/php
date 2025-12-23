<?php
declare(strict_types=1);


// Открываем сессию
session_start();

// Подключаем код для сохранения информации о странице
include('savepage.inc.php');
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Страница 1</title>
</head>
<body>

<h1>Страница 1</h1>

<?php
// Подключаем меню
include('menu.inc.php');

// Подключаем код для вывода посещенных страниц
include('visited.inc.php');
?>

</body>

</html>
