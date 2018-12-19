<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$countries = [
	'Africa' => ['Hippopotamus amphibius', 'Acinonyx jubatus', 'Giraffa camelopardalis', 'Panthera leo', 'Chamaeleonidae'],
	'North America' => ['Castor fiber', 'Canis lupus', 'Nasua', 'Gulo gulo', 'Lynx'],
	'Arctic' => ['Vulpes lagopus', 'Ovibos moschatus', 'Orcinus orca', 'Odobenus rosmarus', 'Ursus maritimus']
];
$array_two_words = [];
$first = [];
$second = [];
$test = [];
$aaa = [];
foreach ($countries as $key => $value) {
	foreach ($value as $a => $b) {
		$c = trim($b);
		if (count(explode(' ', $c)) ==2) {
			array_push($array_two_words, $c);
			$explode = explode(' ', $c);
			array_push($first, $explode[0]);
			array_push($second, $explode[1]);
		}
	}
};
$two_words = implode( ", ", $array_two_words);
shuffle($second);	
$i=0;
$count = count($first);
?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<h2>"Жестокое обращение с животными"</h2>
 	<h3>1. Исходный массив:</h3>
 	<details>
 		<pre>
<?php  var_dump($countries); ?>
 		</pre>	
 	</details>
 	<h3>2. Названия, состоящие из двух слов:</h3>
 		<?= $two_words ?>	
 	<h3>3. "Фантазийные" названия:</h3>
 	<?php 
 		while ($i<$count) {
			echo $first[$i].' '.$second[$i].'<br>';
			$i++;
}

?>
 	 <h3>Дополнительное задание</h3>
 <?php
 	$i=0;
 	while ($i<$count) {
 		foreach ($countries as $key => $value) {
 			echo '<h3>'.$key.'</h3>';
			foreach ($value as $a => $b) {
				if (preg_match("/$first[$i]/", $b)) {
					echo $first[$i].' '.$second[$i].', ';
					$i++;
				}
			}
		}	
};
  ?>	 	


 	
 </body>
 </html>
