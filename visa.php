<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$resource = fopen('https://data.gov.ru/opendata/7704206201-country/data-20180609T0649-structure-20180609T0649.csv?encoding=UTF-8', 'r');
if (!$resource) {
	$resource = fopen('https://raw.githubusercontent.com/netology-code/php-2-homeworks/master/files/countries/opendata.csv', 'r');
		if (!$resource) {
			echo 'Файл недоступен';
			exit;
		}
};
$shortest = -1;
if (!isset($argv[1])) {
	echo "Ошибка! Аргументы не заданы. Введите название страны";
	exit;
};
$argv[1] = iconv("windows-1251", "utf-8//IGNORE",$argv[1]); //иначе cmd кодировка у меня не распознает и не может сравнить
for($i=0; $array = fgetcsv($resource, 0,","); $i++) {
	$lev = levenshtein($argv[1], $array[1]);
			if ($lev == 0) {
				$closest = $array[1];
        		$shortest = 0;
        		$visa = $array[4];
        		break;
			};
			if ($lev <= $shortest || $shortest < 0) {
				$closest  = $array[1];
        		$shortest = $lev;
        		$visa = $array[4];
        	};	
};
if ($shortest == 0) {
    echo $closest . ': ' . $visa;
} 
else {
    echo 'Возможно вы имели ввиду: ' . $closest . '? ' . $closest . ': ' . $visa;
};
fclose($resource);	
?>
