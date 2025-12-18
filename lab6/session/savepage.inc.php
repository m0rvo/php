<?php
declare(strict_types=1);

/**
 * ЗАДАНИЕ 1: Сохранение пути к текущей странице в массив сессии
 */

// Инициализируем массив в сессии, если его нет
if (!isset($_SESSION['visited_pages'])) {
    $_SESSION['visited_pages'] = [];
}

// Сохраняем путь к текущей странице
$_SESSION['visited_pages'][] = $_SERVER['REQUEST_URI'];