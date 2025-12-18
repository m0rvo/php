<?php
declare(strict_types=1);

/**
 * Скрипт для вывода всех определенных констант PHP
 */

/**
 * Получает и выводит список всех констант
 * @return void
 */
function showAllConstants(): void {
    // Получаем массив всех констант, сгруппированных по категориям
    $constants = get_defined_constants(true);

    foreach ($constants as $category => $items) {
        echo "<h2>Категория: $category</h2>";
        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr><th>Имя константы</th><th>Значение</th></tr>";
        
        foreach ($items as $name => $value) {
            // Преобразуем значение в строку для корректного вывода
            $displayValue = is_array($value) ? implode(', ', $value) : (string)$value;
            echo "<tr>
                    <td style='padding: 5px;'><b>$name</b></td>
                    <td style='padding: 5px;'>" . htmlspecialchars($displayValue) . "</td>
                  </tr>";
        }
        echo "</table>";
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Константы PHP</title>
</head>
<body>
    <h1>Список всех определенных констант</h1>
    <?php showAllConstants(); ?>
</body>
</html>