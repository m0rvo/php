<?php
declare(strict_types=1);

/**
 * Отрисовка таблицы умножения
 * @param int $cols
 * @param int $rows
 * @param string $color
 */
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): void {
    echo "<table>";
    for ($r = 1; $r <= $rows; $r++) {
        echo "<tr>";
        for ($c = 1; $c <= $cols; $c++) {
            $style = ($r == 1 || $c == 1) ? "style='background-color:$color; font-weight:bold;'" : "";
            echo "<td $style>" . ($r * $c) . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

/**
 * Отрисовка меню
 * @param array $menu
 * @param bool $vertical
 */
function getMenu(array $menu, bool $vertical = true): void {
    $style = $vertical ? "" : "style='display:inline; margin-right:10px;'";
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li $style><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    echo "</ul>";
}