<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// $data = file_get_contents(__DIR__ . DIRECTORY_SEPARATOR .'data.json');
$data = file_get_contents("http://university.netology.ru/u/soleinikov/me/data.json");
$json =json_decode($data, true);
?>
 <!doctype html>
 <html lang="ru">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<style>
 		table {border-collapse: collapse; margin: 15px 15px;}
 	</style>
 </head>
 <body>
 	<table cellpadding="10px" border="1px solid black">
 	<thead>
 		<th>Имя</th>
 		<th>Фамилия</th>
 		<th>Город</th>
 		<th>Телефон</th>
 	</thead>	
	<? foreach ($json as $value): ?>
	<tr>
		<td><?=$value['firstName']?></td>
		<td><?=$value['lastName']?></td>
		<td><?=$value['address']?></td>
		<td><?=$value['phoneNumber']?></td>
	</tr>
	<? endforeach; ?>	
 	</table>
 </body>
 </html>