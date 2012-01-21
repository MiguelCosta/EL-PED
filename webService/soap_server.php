<?php

require_once('./lib/nusoap.php');

$s = new soap_server;
$s->register('get_project');
$s->register('get_project_kw');

function get_project($projcode) {
    $con = mysql_connect("localhost", "miguel", "miguel");
    mysql_select_db("PED", $con);

    // seleciona o path do projeto
    $sql = "SELECT path FROM Project WHERE projcode='$projcode'";
    $res = mysql_query($sql, $con);
    $path = "";
    while ($row = mysql_fetch_array($res)) {
        $path = $row['path'];
    }
    if ($path == null || $path == "") {
        return "ERRO";
    }

    // faz load do pr.xml para uma string
    $local = "../uploads/$path/pr.xml";
    $xml = file_get_contents($local);
    return $xml;
}
function get_project_kw($projcode) {
    $con = mysql_connect("localhost", "miguel", "miguel");
    mysql_select_db("PED", $con);

    // seleciona o path do projeto
    $sql = "SELECT path FROM Project WHERE projcode='$projcode'";
    $res = mysql_query($sql, $con);
    $path = "";
    while ($row = mysql_fetch_array($res)) {
        $path = $row['path'];
    }
    if ($path == null || $path == "") {
        return "ERRO";
    }

    // faz load do pr.xml para uma string
    $local = "../uploads/$path/pr.xml";
    $xml = file_get_contents($local);
    return $xml;
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$s->service($HTTP_RAW_POST_DATA);
?>
