<html>
	<head>
	<title>VerPreguntas</title>
	<link rel='stylesheet' type='text/css' href='registro.css' content-type />
	</head>
</html>

<?php
	
	
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	
	
	
	$resultado = mysqli_query($link,"SELECT * FROM preguntas");
	if(!$resultado){
		
		die('Error'.mysqli_error($link));
		
	}
	
	echo '<center><table border=1> <tr> <th> Autor </th> <th> Dificultad </th> <th> Pregunta </th> </tr></center>';
	
	while($row = mysqli_fetch_array($resultado))
	{
	echo '<tr> <td>'.$row['Email'].'</td><td>'.$row['Dificultad'].'</td><td>'.$row['Pregunta'].'</td></tr>';
	
	}
	
	mysqli_close($link);
	

?>