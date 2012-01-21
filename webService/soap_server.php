<?php

require_once('./lib/nusoap.php');

$s = new soap_server;
$s->register('get_project');
$s->register('get_kw');

function get_project($projcode) {
    $con = mysql_connect("localhost", "miguel", "miguel");
    mysql_select_db("PED", $con);

    // seleciona o path do projeto
    $sql = "SELECT path, remove, private FROM Project WHERE projcode='$projcode'";
    $res = mysql_query($sql, $con);
    $path = "";
    $remove = 0;
    $private = 0;
    while ($row = mysql_fetch_array($res)) {
        $path = $row['path'];
        $remove = $row['remove'];
        $private = $row['private'];
    }

    if ($path == null || $path == "") {
        // se não tem path
        return "ERRO 1001";
    }
    if ($remove == 1) {
        // se já foi removido o projeto
        return "ERRO 1002";
    }
    if ($private == 1) {
        // se é privado o projeto
        return "ERRO 1003";
    }

    $local = "../uploads/$path/pr.xml";
    if (!is_file($local)) {
        // se não existir o um ficheiro
        return "ERRO 1004";
    }

    // faz load do pr.xml para uma string
    $xml = file_get_contents($local);
    return $xml;
}

function get_kw($kw) {
    $con = mysql_connect("localhost", "miguel", "miguel");
    mysql_select_db("PED", $con);

    // colocas as kw num array
    $array = explode(";", $kw);
    if (count($array) == 0) {
        // não tem kw
        return "ERRO 1001";
    }

    $sql = "SELECT * FROM Project WHERE projcode IN(
                  SELECT projcode FROM ProjKW WHERE kwcode IN (
                     (SELECT kwcode FROM KeyWord WHERE ";


    $flag = 0;
    foreach ($array as $value) {
        if ($flag == 0) {
            $v = strtoupper($value);
            $sql .= " keyword='$v' ";
            $flag = 1;
        } else {
            $v = strtoupper($value);
            $sql .= " OR keyword='$v'";
        }
    }

    $sql .= "))) AND remove=0 AND private= 0 ORDER BY subdate";



    $res = mysql_query($sql, $con);
    $count_pr = mysql_num_rows($res);


    if ($count_pr == 0) {
        // não há resultado
        //return "ERRO 1002";
    }
    $resultado = "<prs>";
    while ($row = mysql_fetch_array($res)) {
        $resultado .= "<pr>";
        $resultado .= "<projcode>" . $row['projcode'] . "</projcode>";
        $resultado .= "<keyname>" . $row['keyname'] . "</keyname>";
        $resultado .= "<title>" . $row['title'] . "</title>";
        $resultado .= "<subdate>" . $row['subdate'] . "</subdate>";

        $id = $row['projcode'];
        $sql = "SELECT name FROM Author WHERE authorcode IN (
                    SELECT authorcode FROM ProjAut WHERE projcode='$id'
                )";
        $res2 = mysql_query($sql, $con);
        $resultado .= "<workteam>";
        while ($row2 = mysql_fetch_array($res2)) {
            $resultado .= "<author>" . $row2['name'] . "</author>";
        }
        $resultado .= "</workteam>";

        $sql = "SELECT name FROM Supervisor WHERE supcode IN (
                    SELECT supcode FROM ProjSup WHERE projcode='$id'
                )";
        $res2 = mysql_query($sql, $con);
        $resultado .= "<supervisors>";
        while ($row2 = mysql_fetch_array($res2)) {
            $resultado .= "<supervisor>" . $row2['name'] . "</supervisor>";
        }
        $resultado .= "</supervisors>";


        $resultado .= "</pr>";
    }
    $resultado .= "</prs>";
    return $resultado;
}

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$s->service($HTTP_RAW_POST_DATA);
?>
