<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$type = glob('*.json');
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
 	<?php  if (empty($type)) {
	echo 'Нет доступных тестов';	
}
?>
 	<ul>
 	<?php $i=1; foreach ($type as $value) : ?>
 	<li><?='<a href="test.php?test='.$value.'">Тест №'.$i.'</a>'?></li>
 	<?php $i++; endforeach; ?>
	</ul>
	<p><a href="admin.php">На страницу загрузки теста</a></p>
 </body>
 </html>
