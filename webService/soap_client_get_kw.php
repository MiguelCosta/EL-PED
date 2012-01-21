<?php

require_once('./lib/nusoap.php');

$kw = $_REQUEST["kw"];
$localizacaoServidor = 'http://localhost/PED-Project/webService/soap_server.php';
$parameters = array('kw' => $kw);
//$parameters = array('projcode' => 65);

$soapclient = new nusoap_client($localizacaoServidor, false);
$resultado = $soapclient->call('get_kw', $parameters);

if ($resultado == "ERRO 1001") {
    echo "<div class=\"failure\">N�o foi poss�vel receber as Key Words.</div>";
    return;
}
if ($resultado == "ERRO 1002") {
    echo "<div class=\"failure\">N�o h� resultados disponiveis.</div>";
    return;
}

var_dump($resultado);
//echo "RESULTADO: $resultado";


//print "$resultado"
?>
