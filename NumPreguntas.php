<?php 

	session_start();
	$usuario=$_SESSION["email"];
	
	if(isset($usuario)){
		
		$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
		if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	
	$totales = mysqli_query($link,"SELECT (Email) FROM preguntas");
	if(!$totales){
		
		die('Error'.mysqli_error($link));
	}
	
	$pre_tot= mysqli_num_rows($totales);
	
	$resultado = mysqli_query($link,"SELECT (Email) FROM preguntas WHERE Email='$usuario'");
	if(!$resultado){
		
		die('Error'.mysqli_error($link));
	}
	$pre_usu= mysqli_num_rows($resultado);
		
	echo '<b>'."Preguntas propias/Preguntas totales:".$pre_usu."/".$pre_tot.'</b>';
		
		
	}
	else echo '<b>'."No estas logueado".'</b>';



?>