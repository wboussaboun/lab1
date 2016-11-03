<?php


function vForm($nombre,$apellido,$email,$contra,$tel){
	$expra="/^([a-zA-Z])+[ ]([a-zA-Z])+$/";
	$exprc="/^[a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9][a-zA-Z0-9]*$/";
	$expr="/^([a-z])+[0-9][0-9][0-9]@ikasle\.ehu\.[e]u?[s]$/";
	$exprt="/^[0-9]{9}$/";
	
	$error = '';
	
	if($nombre == '')
		$error = $error.'<p>Inserte un nombre</p>';
	if($apellido == '' || !preg_match($expra,$apellido))
		$error = $error.'<p>Inserte dos apellido</p>';
	if($email == '' || !preg_match($expr,$email))	
		$error=$error.'<p>Email erroneo</p>';
	if($contra == '' || !preg_match($exprc,$contra))
		$error = $error.'<p>Inserte una contraseña de mas de 6 caracteres</p>';
	if($tel == '' || !preg_match($exprt,$tel))
		$error = $error.'<p>Inserte un numero de 9 digitos</p>';
	
	return $error;
}

function vPreg($pregunta,$difi,$respuesta,$tematica){
	
	$expr="/^[1-5]$/";
	
	$error = '';
	if($pregunta=='')
		$error = $error.'<p>Inserte una pregunta</p>';
	if($respuesta=='')
		$error = $error.'<p>Inserte una respuesta</p>';
	if($tematica=='')
		$error = $error.'<p>Inserte una tematica</p>';
	if(!preg_match($expr,$difi))
		$error = $error.'<p>Inserte una dificultad entre 1 y 5</p>';
	return $error;
}

?>