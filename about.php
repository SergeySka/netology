<?php 
	$name='Сергей';
	$age='29';
	$email='ser_rus1@mail.ru';
	$city='Белгород';
	$about='Студент';
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Страница пользователя <?= $name ?></h2>
	<p>Имя: <?= $name ?></p>
	<p>Возраст: <?= $age ?></p>
	<p>Адрес электронной почты: <?= $email ?></p>
	<p>Город: <?= $city ?></p>
	<p>О себе: <?= $about ?></p>
</body>
</html>