<?php
declare(strict_types=1);

/**
 * Лабораторная работа: Создание онлайн-калькулятора.
 * Скрипт обрабатывает математические операции над двумя числами.
 */

/**
 * Выполняет арифметическую операцию над двумя числами.
 * * @param float $n1 Первое число.
 * @param float $n2 Второе число.
 * @param string $op Оператор (+, -, *, /).
 * @return float|string Результат вычисления или сообщение об ошибке.
 */
function calculate(float $n1, float $n2, string $op) {
    switch ($op) {
        case '+': return $n1 + $n2;
        case '-': return $n1 - $n2;
        case '*': return $n1 * $n2;
        case '/': 
            if ($n2 === 0.0) {
                return "Ошибка: деление на ноль!";
            }
            return $n1 / $n2;
        default: return "Неизвестный оператор";
    }
}

// ЗАДАНИЕ 1: Проверка отправки формы и фильтрация
$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Фильтрация и получение значений
    $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0.0;
    $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0.0;
    $operator = trim(strip_tags($_POST['operator'] ?? ''));

    // Сохранение результата
    $result = calculate($num1, $num2, $operator);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Калькулятор</title>
    <style>
        .result { padding: 10px; background: #e7f3fe; border: 1px solid #2196F3; display: inline-block; margin-bottom: 15px; }
    </style>
</head>
<body>

<h1>Калькулятор</h1>

<?php
/*
ЗАДАНИЕ 2: Если результат существует, выведите его
*/
if ($result !== null): ?>
    <div class="result">
        <strong>Результат:</strong> <?= $result ?>
    </div>
<?php endif; ?>

<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

<p><label for="num1">Число 1</label><br>
<input type="text" name="num1" id="num1" value="<?= htmlspecialchars($_POST['num1'] ?? '') ?>" required></p>

<p><label for="operator">Оператор</label><br>
<select name="operator" id="operator">
    <option value="+" <?= (($_POST['operator'] ?? '') === '+') ? 'selected' : '' ?>>+</option>
    <option value="-" <?= (($_POST['operator'] ?? '') === '-') ? 'selected' : '' ?>>-</option>
    <option value="*" <?= (($_POST['operator'] ?? '') === '*') ? 'selected' : '' ?>>*</option>
    <option value="/" <?= (($_POST['operator'] ?? '') === '/') ? 'selected' : '' ?>>/</option>
</select></p>

<p><label for="num2">Число 2</label><br>
<input type="text" name="num2" id="num2" value="<?= htmlspecialchars($_POST['num2'] ?? '') ?>" required></p>

<button type="submit">Считать!</button>

</form>

</body>
</html>