<?php
declare(strict_types=1);

/**
 * Логика калькулятора для вставки в основной макет.
 */

$result = null;

// Обработка данных только если форма была отправлена методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Фильтрация входных данных
    $n1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0.0;
    $n2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0.0;
    $operator = trim(strip_tags($_POST['operator'] ?? ''));

    // Математическая логика
    switch ($operator) {
        case '+': $result = $n1 + $n2; break;
        case '-': $result = $n1 - $n2; break;
        case '*': $result = $n1 * $n2; break;
        case '/': 
            if ($n2 == 0) {
                $result = "На 0 делить нельзя!";
            } else {
                $result = $n1 / $n2;
            }
            break;
        default: $result = "Выберите оператор";
    }
}
?>

<div class="calc-container">
    <h3>Результат: <?= ($result !== null) ? $result : 'ожидание ввода' ?></h3>

    <form action="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="POST">
        <p>
            <label>Число 1:</label><br>
            <input name='num1' type='text' value="<?= htmlspecialchars($_POST['num1'] ?? '') ?>">
        </p>
        <p>
            <label>Оператор: </label><br>
            <select name="operator">
                <option value="+" <?= (($_POST['operator'] ?? '') === '+') ? 'selected' : '' ?>>+</option>
                <option value="-" <?= (($_POST['operator'] ?? '') === '-') ? 'selected' : '' ?>>-</option>
                <option value="*" <?= (($_POST['operator'] ?? '') === '*') ? 'selected' : '' ?>>*</option>
                <option value="/" <?= (($_POST['operator'] ?? '') === '/') ? 'selected' : '' ?>>/</option>
            </select>
        </p>
        <p>
            <label>Число 2: </label><br>
            <input name='num2' type='text' value="<?= htmlspecialchars($_POST['num2'] ?? '') ?>">
        </p>
        <p>
            <input type='submit' value='Считать'>
        </p>
    </form>
</div>