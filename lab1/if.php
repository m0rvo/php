<?php

$age = 20; 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Конструкции if-elseif-else</title>
</head>
<body>
	<h1>Конструкции if-elseif-else</h1>
	<?php

	echo "<p>Текущий возраст: <strong>$age</strong></p>";
	echo "<hr>";
	
	if ($age >= 18 && $age <= 59) {
		echo "<p style='color: green;'>Вам ещё работать и работать</p>";
	} elseif ($age > 59) {
		echo "<p style='color: blue;'>Вам пора на пенсию</p>";
	} elseif ($age >= 1 && $age <= 17) {
		echo "<p style='color: orange;'>Вам ещё рано работать</p>";
	} else {
		echo "<p style='color: red;'>Неизвестный возраст</p>";
	}
	?> 
	
	<hr>
	<p><small>Попробуйте изменить значение переменной \$age в коде для тестирования разных условий.</small></p>
</body>
</html>