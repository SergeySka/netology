<?php 
if (empty($_FILES)) {
	echo 'Ошибка файла / файл не загружен';
}
else {
	move_uploaded_file($_FILES["upload"]["tmp_name"], $_FILES["upload"]["name"]);
};
$type = glob('*.json');
if (empty($type)) {
	echo 'Нет доступных тестов';
	exit;
}
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Список тестов</title>
 	<style>
		ul {list-style: none;}
 	</style>
 </head>
 <body>
 	<p>Выберите доступный тест:</p>
 	<ul>
 	<?php $i=1; foreach ($type as $value) : ?>
 	<li><?='<a href="test.php?test='.$value.'">Тест №'.$i.'</a>'?></li>
 	<?php $i++; endforeach; ?>
	</ul>
 </body>
 </html>