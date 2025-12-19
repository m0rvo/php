<?php
declare(strict_types=1);

/**
 * ЗАДАНИЕ 1
 */
$now = time();

$birthday = mktime(0, 0, 0, 5, 20, 2026); 
$dateArray = getdate();
$hour = $dateArray['hours'];

/**
 * Определение приветствия
 * @param int $hour
 * @return string
 */
function getWelcomeMessage(int $hour): string {
    if ($hour >= 0 && $hour < 6) return 'Доброй ночи';
    if ($hour >= 6 && $hour < 12) return 'Доброе утро';
    if ($hour >= 12 && $hour < 18) return 'Добрый день';
    if ($hour >= 18 && $hour < 24) return 'Добрый вечер';
    return 'Доброй ночи';
}

$welcome = getWelcomeMessage($hour);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Использование функций даты и времени</title>
</head>
<body>
    <h1>Использование функций даты и времени</h1>
    <p><?= $welcome ?></p>
    
    <?php
    // Установка локали и форматирование даты
    setlocale(LC_TIME, 'ru_RU.UTF-8');
    $fmt = datefmt_create('ru_RU', IntlDateFormatter::FULL, IntlDateFormatter::MEDIUM);
    echo "Сегодня: " . datefmt_format($fmt, $now) . "<br>";

    // Расчет времени до дня рождения
    $diff = $birthday - $now;
    $days = floor($diff / (60 * 60 * 24));
    $hours = floor(($diff % (60 * 60 * 24)) / (60 * 60));
    $minutes = floor(($diff % (60 * 60)) / 60);
    $seconds = $diff % 60;

    echo "До моего дня рождения осталось: $days дн., $hours час., $minutes мин., $seconds сек.";
    ?>
</body>

</html>
