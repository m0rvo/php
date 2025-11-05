<?php
$day = 7; 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Конструкция switch</title>
</head>
<body>
	<h1>Конструкция switch</h1>
	<?php
	echo "<p>Номер дня: <strong>$day</strong></p>";
	echo "<hr>";
	
	switch ($day) {
		case 1:
		case 2:
		case 3:
		case 4:
		case 5:
			echo "<p style='color: green;'>Это рабочий день</p>";
			break;
		case 6:
		case 7:
			echo "<p style='color: blue;'>Это выходной день</p>";
			break;
		default:
			echo "<p style='color: red;'>Неизвестный день</p>";
			break;
	}
	?> 
	
	<hr>
	<p><small>Попробуйте изменить значение переменной \$day в коде для тестирования разных условий (от 1 до 7, а также другие числа).</small></p>
</body>
</html>