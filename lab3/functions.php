<?php
declare(strict_types=1);

/**
 * Скрипт для вывода функций всех загруженных расширений PHP
 */

/**
 * Выводит список функций для каждого расширения и их общее количество
 * @return void
 */
function displayExtensionFunctions(): void {
    // Получаем список всех загруженных модулей
    $extensions = get_loaded_extensions();
    $totalFunctions = 0;

    foreach ($extensions as $ext) {
        echo "<h3>Модуль: $ext</h3>";
        
        // Получаем функции конкретного модуля
        $functions = get_extension_funcs($ext);

        if ($functions) {
            echo "<ul>";
            foreach ($functions as $func) {
                echo "<li>$func</li>";
                $totalFunctions++;
            }
            echo "</ul>";
        } else {
            echo "<p><i>У этого модуля нет встроенных функций или они недоступны.</i></p>";
        }
        echo "<hr>";
    }

    echo "<h2>Общее количество функций: $totalFunctions</h2>";
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Функции загруженных модулей</title>
</head>
<body>
    <h1>Функции по модулям PHP</h1>
    <?php displayExtensionFunctions(); ?>
</body>
</html>