<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (!isset($argv[1])) {
	echo "Ошибка! Аргументы не заданы.";
	exit;
};
$url = "https://www.googleapis.com/books/v1/volumes?q=";
$query = urlencode(iconv("windows-1251", "utf-8//IGNORE",implode(' ', array_slice($argv, 1, count($argv)-1)))); //без iconv cmd у меня не распознает русский
$full_url = $url.$query;
var_dump($full_url);
$filecontent = file_get_contents($full_url);
$result = json_decode($filecontent, true);
$lines = [];
$i=0;
while (isset($result['items'][$i])) {
	if (isset($result['items'][$i]['id'])) {
		$lines[$i][] = $result['items'][$i]['id'];
		echo $result['items'][$i]['id'];
	};
	if (isset($result['items'][$i]['volumeInfo']['title'])) {
		echo ' '. $result['items'][$i]['volumeInfo']['title'];
		$lines[$i][] = $result['items'][$i]['volumeInfo']['title'];
	 };
	if (isset($result['items'][$i]['volumeInfo']['authors'])) {
		$authors = implode(', ', $result['items'][$i]['volumeInfo']['authors']);
		echo ' '. $authors .'</br>';
		$lines[$i][] = $authors;
	 }; 
	$i++;
};
$csv = fopen(__DIR__ . DIRECTORY_SEPARATOR . 'books.csv', 'a+');
foreach ($lines as $line) {
	fputcsv($csv,$line);
};
fclose($csv);
 ?>
