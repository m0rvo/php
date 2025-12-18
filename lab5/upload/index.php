<?php
declare(strict_types=1);

/**
 * Скрипт галереи: вывод списка изображений в каталоге
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Галерея изображений</title>
    <style>
        .gallery { display: flex; flex-wrap: wrap; gap: 10px; }
        .gallery img { width: 180px; height: auto; border: 1px solid #333; }
    </style>
</head>
<body>
    <h1>Галерея</h1>
    <div class="gallery">
        <?php
        // Получение списка файлов в текущем каталоге
        $files = scandir('.');
        
        foreach ($files as $file) {
            // Для каждого изображения добавляем элемент img
            if (preg_match('/\.(jpg|jpeg)$/i', $file)) {
                echo "<img src='$file' alt='Загруженное фото'>";
            }
        }
        ?>
    </div>
</body>
</html>