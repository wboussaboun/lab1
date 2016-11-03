<html>

<head>
<meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
<title>Login</title>
<link rel='stylesheet' type='text/css' href='registro.css' />
</head>

<body>
	<center>
	<p> *Obligatorio</p>
	<form id='login' method="post"  name='login' onSubmit='return checkform()' enctype="multipart/form-data">
	Introduce el Usuario
	<input type='text' name='usuario' id='usuario' value=''><br>
	Introduce la contraseña
	<input type='password' name='contrasena' id='contrasena' value=''>
	<input type="submit" name='login' id='login' value="Login">
	</form>
		<p align='center'><a href='layout.html'>Volver a la pagina de inicio</a></p>
	</center>
</body>
</html>



<?php
	
	if(isset($_POST['usuario'])){
	
	$usuario = $_POST['usuario'];
	$pass = $_POST['contrasena'];
	$contrasena = MD5($pass);
	
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	$usuarios = mysqli_query($link,"SELECT * FROM usuario WHERE Email='$usuario' and Contrasena='$contrasena'");
	
	$cont= mysqli_num_rows($usuarios);
	
	if($cont == 1){
			$resultado = mysqli_query($link,"SELECT * FROM conexiones");
			if(!$resultado){
		
			die('Error'.mysqli_error($link));
			}
	
			$session= mysqli_num_rows($resultado);

			if($session == 0)
			$num_session=0;
			else
			$num_session=$session;
		
			$idc="conexion".$num_session;
			
			$hora=date("H");
			$minuto=date("i");
			$segundo=date("s");
			$timestamp = $hora.":".$minuto.":".$segundo;
			$hco=$timestamp;
			
			$sqls=("INSERT INTO conexiones(IdC,Email,HCo) VALUES('$idc','$usuario','$hco')");
			if(!mysqli_query($link,$sqls)){
				
				die('Error'.mysqli_error($link));
				
			}
			
			session_start();
			$_SESSION["email"]=$usuario;
			header('location:GestionPreguntas.php');
				
					}
	else{
		
		echo '<p>No se puede conectar</p>';
		
	}

	}


?>