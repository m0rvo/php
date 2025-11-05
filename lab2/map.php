<?php
function map($array, $callback) {
    $result = [];
    foreach ($array as $value) {
        $result[] = $callback($value);
    }
    return $result;
}

$numbers = [1, 2, 3, 4, 5];
$squared = map($numbers, fn($x) => $x * $x);

echo "Исходный массив: ";
print_r($numbers);
echo "<br>Массив в квадрате: ";
print_r($squared);
?>