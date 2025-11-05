<?php
define("MY_CONSTANT", "Значение моей константы");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Константы</title>
</head>
<body>
	<h1>Константы</h1>
	
	<?php
	echo "<h2>Задание 2:</h2>";
	if (defined("MY_CONSTANT")) {
		echo "<p>Константа MY_CONSTANT существует: <strong>" . MY_CONSTANT . "</strong></p>";
	} else {
		echo "<p>Константа MY_CONSTANT не существует</p>";
	}
	
	echo "<h2>Задание 3:</h2>";
	echo "<p>Текущая версия PHP: <strong>" . PHP_VERSION . "</strong></p>";
	echo "<p>Директория скрипта: <strong>" . __DIR__ . "</strong></p>";
	?>
	
</body>
</html>