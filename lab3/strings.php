<?php
declare(strict_types=1);

/**
 * ЗАДАНИЕ 1
 * Инициализация переменных
 */
$login = ' User ';
$password = 'megaP@ssw0rd';
$name = 'иван';
$email = 'ivan@petrov.ru';
$code = '<?=$login?>';

/**
 * Проверка сложности пароля.
 * Пароль должен содержать минимум одну заглавную латинскую букву, одну строчную, одну цифру и быть не короче 8 символов.
 * * @param string $password
 * @return bool
 */
function checkPasswordComplexity(string $password): bool {
    return strlen($password) >= 8 &&
           preg_match('/[A-Z]/', $password) &&
           preg_match('/[a-z]/', $password) &&
           preg_match('/[0-9]/', $password);
}

/**
 * Преобразование первого символа в верхний регистр (поддержка UTF-8).
 * * @param string $str
 * @param string $encoding
 * @return string
 */
if (!function_exists('mb_ucfirst')) {
    function mb_ucfirst(string $str, string $encoding = 'UTF-8'): string {
        $firstChar = mb_substr($str, 0, 1, $encoding);
        $then = mb_substr($str, 1, null, $encoding);
        return mb_strtoupper($firstChar, $encoding) . $then;
    }
}

/**
 * ЗАДАНИЕ 2
 * Обработка переменных
 */

// 1. Удаление пробелов и перевод логина в нижний регистр
$login = mb_strtolower(trim($login));

// 2. Проверка пароля на сложность
$isPasswordStrong = checkPasswordComplexity($password);

// 3. Первый символ имени — прописной
$name = mb_ucfirst($name);

// 4. Проверка корректности email
$isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL) !== false;

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Использование функций обработки строк</title>
</head>
<body>
    <h1>Результаты обработки строк</h1>
    <p><b>Логин:</b> <?= htmlspecialchars($login) ?></p>
    <p><b>Пароль сложный:</b> <?= $isPasswordStrong ? 'Да' : 'Нет' ?></p>
    <p><b>Имя:</b> <?= htmlspecialchars($name) ?></p>
    <p><b>Email корректен:</b> <?= $isEmailValid ? 'Да' : 'Нет' ?></p>
    <p><b>Код (вывод как в коде):</b> <code><?= htmlspecialchars($code) ?></code></p>
</body>
</html>