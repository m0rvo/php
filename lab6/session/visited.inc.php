<?php
declare(strict_types=1);

/**
 * ЗАДАНИЕ 2: Вывод списка посещенных страниц
 */

echo "<hr><h3>Список посещённых страниц:</h3>";

// Проверяем наличие массива в сессии
if (isset($_SESSION['visited_pages']) && is_array($_SESSION['visited_pages'])) {
    echo "<ul>";
    // Перебираем массив и выводим каждый элемент
    foreach ($_SESSION['visited_pages'] as $page) {
        echo "<li>" . htmlspecialchars($page) . "</li>";
    }
    echo "</ul>";
}