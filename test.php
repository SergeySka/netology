<?php 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

if (isset($_GET["test"])) {
$data = file_get_contents(__DIR__ .DIRECTORY_SEPARATOR.$_GET["test"]);
$test = json_decode($data, true);
}
else {
	echo "Вы не выбрали тест";
	exit;
};
if(!empty($_POST)) {
	$correct = 0;
	$i = 0;	
	foreach ($_POST as $key => $value) {
		if ($value === $test["answers"][$i]) {
			$correct++;
		}
		$i++;
	}
	unset($i,$key,$value);
}
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Ответьте на вопросы</title>
 </head>
 <body>
 	<p>Прочитайте вопрос и выберите вариант ответа</p>
 	<form action="" method="POST">
 		<?php $i=1; foreach ($test["questions"] as $key => $question) : ?>
		<fieldset>	
 		<legend><?=$key ?></legend>
 			<?php foreach ($question as $variant) : ?>	
 		<label><?='<input type="radio" name="q'.$i.'" value="'.$variant.'" required>'.$variant?></label>
 			<?php endforeach; ?>
 		</fieldset>		
 	<?php $i++; endforeach; ?>
 	<input type="submit">
 	</form>
 	<p>
	<?php if(isset($correct)) {echo "Правильных ответов: ".$correct;}?>
 	</p>
 	<p><a href="list.php">К списку тестов</a></p>
 </body>
 </html>

