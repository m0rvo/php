<?php
	/**
	 * Генерирует таблицу умножения
	 * @param int $cols Количество столбцов
	 * @param int $rows Количество строк  
	 * @param string $color Цвет фона заголовков
	 * @return int Количество вызовов функции
	 */
	function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int {
		static $count = 0;
		$count++;
		
		echo "<table>";
		
		for ($i = 1; $i <= $rows; $i++) {
			echo "<tr>";
			for ($j = 1; $j <= $cols; $j++) {
				$result = $i * $j;
				if ($i == 1 || $j == 1) {
					echo "<th style='background-color: $color;'>$result</th>";
				} else {
					echo "<td>$result</td>";
				}
			}
			echo "</tr>";
		}
		
		echo "</table>";
		
		return $count;
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения</title>
	<style>
		table {
			border: 2px solid black;
			border-collapse: collapse;
			margin: 20px 0;
		}

		th,
		td {
			padding: 10px;
			border: 1px solid black;
			text-align: center;
		}
	</style>
</head>
<body> 
	<h1>Таблица умножения</h1>
	
	<?php
	// Вызовы функции с разными параметрами
	echo "<h2>Без параметров (по умолчанию)</h2>";
	$count1 = getTable();
	
	echo "<h2>С одним параметром (cols=5)</h2>";
	$count2 = getTable(5);
	
	echo "<h2>С двумя параметрами (cols=3, rows=4)</h2>";
	$count3 = getTable(3, 4);
	
	echo "<h2>С тремя параметрами (cols=6, rows=6, color=lightblue)</h2>";
	$count4 = getTable(6, 6, 'lightblue');
	
	echo "<h2>Общее число вызовов функции: $count4</h2>";
	?> 
</body>
</html>