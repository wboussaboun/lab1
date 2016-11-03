
<html>
	<head>
	<title>VerUsuarios</title>
	<link rel='stylesheet' type='text/css' href='registro.css' content-type />
	</head>
</html>

<?php
	
	
	
	$link = mysqli_connect("mysql.hostinger.es","u349629874_espi","Pepitogrillo","u349629874_quiz");
	if(!$link)
	{
		
		echo"Fallo al conectar a la base de datos".$link->connect_error;
		
	}
	
	$resultado = mysqli_query($link,"SELECT * FROM usuario");
	
	echo '<center><table border=1> <tr> <th> Nombre </th> <th> Apellidos </th> <th> E-mail </th> <th> Contraseña </th> <th> Numero Telefono </th> <th> Especialidad </th> <th> Intereses </th><th> Imagen </th></tr></center>';
	
while($row = mysqli_fetch_array($resultado))
	{
	$ruta = $row['Imagen'];
	echo '<tr> <td>'.$row['Nombre'].'</td><td>'.$row['Apellidos'].'</td><td>'.$row['Email'].'</td><td>'.$row['Contrasena'].'</td><td>'.$row['NumeroTelefono'].'</td><td>'.$row['Especialidad'].'</td><td>'.$row['Interes'].'</td>';
	
	echo '<td>';
	echo '<img src="'.$ruta.'" width="100" height="100">';
	echo'</td></tr>';
	
	}
	
	
	mysqli_close($link);


?>