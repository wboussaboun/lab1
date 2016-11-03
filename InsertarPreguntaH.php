<html>
	<head>
	<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
	<title>Insertar Pregunta</title>
	<link rel='stylesheet' type='text/css' href='registro.css' />
	</head>

	<body>
	<center>
	<p> *Obligatorio</p>
	<form id='insertar' method="post"  name='insertar' onSubmit='return checkform()' enctype="multipart/form-data">
		
		Pregunta
		<textarea rows="1" cols="40" name='pregunta' id='pregunta' value=''></textarea> <br>
		Respuesta
		<input type="text" name='respuesta' id='respuesta' value=''><br>
		Dificultad
		<input type="text" name='dificultad' id='dificultad' value=''>
		Tematica
		<input type="text" name='tematica' id='tematica' value=''>
		<input type="submit" name='guardar' id='guardar' value="Enviar Pregunta">
	</form>
	</center>
	</body>
</html>


<?php


	
	
	session_start();
	$usuario=$_SESSION["email"];
	
	
	if(isset($_POST['pregunta'])){
	
	require_once('verificar.php');
	require_once('preguntaxml.php');
	
	
	$pregunta = $_POST['pregunta'];
	$respuesta = $_POST['respuesta'];
	$dificultad = $_POST['dificultad'];
	$tematica = $_POST['tematica'];
	
	$error = '';
	
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	$error=vPreg($pregunta,$dificultad,$respuesta,$tematica);
	
	if ($error == ''){
		
	$resultado = mysqli_query($link,"SELECT (Num_preg) FROM preguntas");
	if(!$resultado){
		
		die('Error'.mysqli_error($link));
	}
	
	$cont= mysqli_num_rows($resultado);

	if($cont == 0)
	$numero=0;
	else
	$numero=$cont;
	
	$sql="INSERT INTO preguntas(Email,Pregunta,Respuesta,Dificultad,Num_preg,Tematica)VALUES('$usuario','$pregunta','$respuesta','$dificultad','$numero','$tematica')";
	if(!mysqli_query($link,$sql))
				{
					
					die('Error'.mysqli_error($link));
		
				}else{
					if(!addPregunta($pregunta,$respuesta,$dificultad,$tematica)){
			
						die("Error con el xml");
			
						}
					
					header('location:Insertado.php');
				}
				
			
	}
	else
		{
		
			die('Error'.$error);
		
		}
		
		
	mysqli_close($link);
	
	
		
	}
	

?>