<?php
declare(strict_types=1);

/**
 * Получение текущего года для футера
 */
$currentDate = getdate();
$year = $currentDate['year'];
?>
&copy; Супер Мега Веб-мастер, 2000 &ndash; <?= $year ?>