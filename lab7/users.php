<?php
declare(strict_types=1);

// Регистрация автозагрузчика классов
spl_autoload_register(function ($class): void {
    // Превращаем namespace в путь: src\Classes\User -> src/Classes/User.php
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

use src\Classes\User;
use src\Classes\SuperUser;

echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <title>User Info (Lab 7)</title>
    <link rel=\"stylesheet\" href=\"css/style.css\">
</head>
<body>";

// Создание обычных пользователей
$user1 = new User("Дима", "dimon355", "password1");
$user2 = new User("Влад", "vladick345", "password2");
$user3 = new User("Макс", "maks223", "password3");

echo $user1->showInfo();
echo $user2->showInfo();
echo $user3->showInfo();

// Создание суперпользователя
$userAdmin = new SuperUser("Admin", "mega_admin", "password4", "administrator");
echo $userAdmin->showInfo();

// Принудительное удаление объектов для срабатывания деструкторов
unset($user1, $user2, $user3, $userAdmin);

echo "</body></html>";
