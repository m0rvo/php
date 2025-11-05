<?php
$swap = function(&$a, &$b) {
    $temp = $a;
    $a = $b;
    $b = $temp;
};

$a = 5;
$b = 8;


$swap($a, $b);

echo "После обмена: a = $a, b = $b<br>";

echo "5 === \$b: ";
var_dump(5 === $b);
echo "<br>8 === \$a: ";
var_dump(8 === $a);
?>