<?php
declare(strict_types=1);

use src\Classes\User;
use src\Classes\SuperUser;

spl_autoload_register(function ($class): void {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file))
        require $file;
});

// HTML-заголовок и стили
echo "<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>User Info</title>
    <link rel=\"stylesheet\" href=\"css/style.css\">
    
</head>
<body>";

$user1 = new User("Дима", "dimon355", "password1");
$user2 = new User("Влад", "vladick345", "password2");
$user3 = new User("Макс", "maks223", "password3");

echo $user1->showInfo();
echo $user2->showInfo();
echo $user3->showInfo();

$user = new SuperUser("Admin", "mega_admin", "password4", "administrator");
echo $user->showInfo();

unset($user1);
unset($user2);
unset($user3);
unset($user);

echo "</body></html>";