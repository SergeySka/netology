<?php 
	$x = $_GET['x'];
	$a = '1';
	$b = '1';

 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<?php 
 		echo "Число ".$x;
 		while ( $a < $x ) {
	 		$c = $a;
        	$a = $a + $b;
        	$b = $c;

	 	}	
 		
	 	if ( $a > $x ) {
	 		echo 'задуманное число НЕ входит в числовой ряд';
	 	}
	 	elseif ( $a == $x) {
	 		echo 'задуманное число входит в числовой ряд';
	 	}
	 	
 	 ?>

 	
 </body>
 </html>