<?php

require_once('./lib/nusoap.php');

$kw = $_REQUEST["kw"];
$localizacaoServidor = 'http://localhost/PED-Project/webService/soap_server.php';
$parameters = array('kw' => $kw);
//$parameters = array('projcode' => 65);

$soapclient = new nusoap_client($localizacaoServidor, false);
$resultado = $soapclient->call('get_kw', $parameters);

if ($resultado == "ERRO 1001") {
    echo "<div class=\"failure\">Não foi possível receber as Key Words.</div>";
    return;
}
if ($resultado == "ERRO 1002") {
    echo "<div class=\"failure\">Não há resultados disponiveis.</div>";
    return;
}

$doc = new DOMDocument();
$doc->loadXML(utf8_encode($resultado));

$xslt = new XSLTProcessor();
$XSL = new DOMDocument();
$XSL->load('../util/list_webService.xsl', LIBXML_NOCDATA);
$xslt->importStylesheet($XSL);
echo $xslt->transformToXML($doc);

//var_dump($resultado);
//echo "RESULTADO: $resultado";


//print "$resultado"
?>
