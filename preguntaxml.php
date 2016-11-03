<?php
//añade las preguntas al xml
function addPregunta($pregunta,$respuesta,$dificultad,$tematica){
	
	$xml=simplexml_load_file('preguntas.xml');

	if(!$xml){
		
		die ('Error');
		
	}
	$preguntaxml = $xml->addChild('assessmentItem');
	$preguntaxml->addAttribute('complexity',$dificultad);
	$preguntaxml->addAttribute('subject',$tematica);
	$enun= $preguntaxml ->addChild('itemBody');
	$enun->addChild('p',$pregunta);
	$respuestaxml = $preguntaxml->addChild('correctResponse');
	$respuestaxml->addChild('value',$respuesta);
	return $xml->asXML('preguntas.xml');
	
}




?>