<?php
declare(strict_types=1);

/**
 * ЗАДАНИЕ 1
 */

// Инициализация счетчика посещений
$visitCount = 0;

// Если данные о посещениях есть в куки, сохраняем их
if (isset($_COOKIE['visitCount'])) {
    $visitCount = (int)$_COOKIE['visitCount'];
}

// Наращиваем счетчик
$visitCount++;

// Инициализация переменной для последнего посещения
$lastVisit = "";

// Если данные о дате есть в куки, фильтруем и сохраняем
if (isset($_COOKIE['lastVisit'])) {
    $lastVisit = htmlspecialchars(trim($_COOKIE['lastVisit'])); // Фильтрация
}

// Установка куки на 1 сутки (86400 секунд)
setcookie('visitCount', (string)$visitCount, time() + 86400);
setcookie('lastVisit', date("d-m-Y H:i:s"), time() + 86400); // Текущая дата

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Последний визит</title>
</head>
<body>

<h1>Последний визит</h1>

<?php
/**
 * ЗАДАНИЕ 2
 */
if ($visitCount === 1) {
    echo "<p>Добро пожаловать!</p>";
} else {
    echo "<p>Вы зашли на страницу <b>$visitCount</b> раз</p>";
    if (!empty($lastVisit)) {
        echo "<p>Последнее посещение: $lastVisit</p>";
    }
}
?>

</body>
</html>