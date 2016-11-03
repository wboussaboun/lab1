<!DOCTYPE html>
<html>
<body>

<?php

	$xml=simplexml_load_file("preguntas.xml") or die("Error: Cannot create object");
	
		echo'<center>';
		echo'<table border="1" class="comentarios">';
		echo('<tr class="cabecera">');
		echo('<td>');
		echo "Enunciado";
		echo('</td>');
		echo('<td>');
		echo "Complejidad";
		echo('</td>');
		echo('<td>');
		echo "Tematica";
		echo('</td>');
		echo('</tr>');
		
				
		foreach($xml->assessmentItem as $preguntas){
			$atributos= $preguntas->attributes();
				$difi=$atributos['complexity'];
				$tem= $atributos['subject'];
			foreach($preguntas->itemBody as $pregunta){
			echo('<tr class="preguntas">');
			echo('<td>');
			echo $pregunta->p."<br />";
			echo('</td>');
			echo('<td>');
			echo $difi;
			echo('</td>');
			echo('<td>');
			echo $tem;
			echo('</td>');
			echo('</tr>');
				
			}
		}
		echo'</table>';
		echo'</center>';
	

	
?>

</body>
</html>