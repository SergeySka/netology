<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$resource = fopen(__DIR__ .DIRECTORY_SEPARATOR.'data.csv', 'a+');
if (!$resource) {
	echo 'can`t read the file';
	exit;
};
$date = date('Y-m-d');
$array = [];
if (isset($argv[1]) && isset($argv[2]) && $argv[1] !== '--today' ) {
	$array[0] = $date;
	$array[1] = $argv[1];
	$array[2] = implode(' ', array_slice($argv, 2, count($argv)-2));
	fputcsv($resource, $array);
	echo "Добавлена строка: " . iconv("windows-1251", "utf-8//IGNORE", implode(', ', $array)); //иначе cmd кодировка у меня не распознает
	unset($array);	
}
elseif (isset($argv[1]) && $argv[1] === '--today') {
	$sum = 0;
	for($i=0; $array = fgetcsv($resource, 0,","); $i++) {
			if ($array[0] === $date) {
			$sum += $array[1] ;
			}
	}
	echo $date . ' расход за день: ' . $sum;
}	
else {	
	echo "Ошибка! Аргументы не заданы. Укажите флаг --today или запустите скрипт с аргументами {цена} и {описание покупки}";
	exit;
};
fclose($resource);
 ?>