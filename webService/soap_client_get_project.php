<?php

require_once('./lib/nusoap.php');
/*
  $min = $_REQUEST["minimo"];
  $max = $_REQUEST["maximo"];

  $localizacaoServidor = 'http://localhost/webService/soap_server.php';
  $parameters = array('min'=>$min,'max'=>$max);

  $soapclient = new nusoap_client($localizacaoServidor, false);
  $resultado=$soapclient->call('geraNumAleatorio', $parameters);

  print "[$resultado]";
 */

$projcode = $_REQUEST["projcode"];
$localizacaoServidor = 'http://localhost/PED-Project/webService/soap_server.php';
$parameters = array('projcode'=>$projcode);
//$parameters = array('projcode' => 65);

$soapclient = new nusoap_client($localizacaoServidor, false);
$resultado = $soapclient->call('get_project_kw', $parameters);

if ($resultado != "ERRO") {
    $doc = new DOMDocument();
    $doc->loadXML($resultado);

    $xslt = new XSLTProcessor();
    $XSL = new DOMDocument();
    $XSL->load('../util/pr_1.xsl', LIBXML_NOCDATA);
    $xslt->importStylesheet($XSL);
    echo $xslt->transformToXML($doc);
}

//print "$resultado"
?>
