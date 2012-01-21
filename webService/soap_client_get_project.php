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
$parameters = array('projcode' => $projcode);
//$parameters = array('projcode' => 65);

$soapclient = new nusoap_client($localizacaoServidor, false);
$resultado = $soapclient->call('get_project', $parameters);

if ($resultado == "ERRO 1001") {
    echo "<div class=\"failure\">Não foi possível encontrar o ficheiro correspondente ao projeto.</div>";
    return;
}
if ($resultado == "ERRO 1002") {
    echo "<div class=\"failure\">O Projecto já foi removido.</div>";
    return;
}
if ($resultado == "ERRO 1003") {
    echo "<div class=\"failure\">O projecto é privado.</div>";
    return;
}
if ($resultado == "ERRO 1004") {
    echo "<div class=\"failure\">O ficheiro correspondente ao projecto não existe.</div>";
    return;
}

$doc = new DOMDocument();
$doc->loadXML($resultado);

$xslt = new XSLTProcessor();
$XSL = new DOMDocument();
$XSL->load('../util/pr_1.xsl', LIBXML_NOCDATA);
$xslt->importStylesheet($XSL);
echo $xslt->transformToXML($doc);


//print "$resultado"
?>
