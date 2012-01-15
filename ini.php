<?php

$con = mysql_connect("localhost", "miguel", "miguel");
mysql_select_db("PED", $con);

/**
 * Este tipo de ligação é necessário para se coneguir realizar transações
 */
$link = mysqli_connect("localhost", "miguel", "miguel", "PED");


/* * ****************
 * CONSTANTES *
 * **************** */
// Listagem
$num_proj = 10;
$num_sup = 5;


// Pacotes de informacao
// Megaprocessos
$adm = "Administracao";
$dis = "Disseminacao";

// Interface de Administracao
$ins = "Insercao";
$alt = "Alteracao";
$rem = "Remocao";
$lis = "Listagem";
$exp = "Exportacao";

// Dados
$uti = "Utilizador";
$pro = "Projeto";
$aut = "Autor";
$sup = "Supervisor";

// Hash que contem todas as accoes e respectivas descricoes que podem ser escritas no log
$log_msg = array("lis_uti" => array("act" => "$adm:$lis:$uti", "desc" => "Tarefa de $adm: $lis de $uti"."es"), "ins_uti" => array("act" => "$adm:$ins:$uti", "desc" => "Tarefa de $adm: $ins do $uti"), "alt_uti" => array("act" => "$adm:$alt:$uti", "desc" => "Tarefa de $adm: $alt do $uti"), "rem_uti" => array("act" => "$adm:$rem:$uti", "desc" => "Tarefa de $adm: $rem do $uti"), "lis_as" => array("act" => "$adm:$lis:$aut$sup", "desc" => "Tarefa de $adm: $lis de $aut"."es e $sup"."es"), "ins_aut" => array("act" => "$adm:$ins:$aut", "desc" => "Tarefa de $adm: $ins do $aut"), "ins_sup" => array("act" => "$adm:$ins:$sup", "desc" => "Tarefa de $adm: $ins do $sup"), "lis_aut" => array("act" => "$adm:$lis:$aut", "desc" => "Tarefa de $adm: $lis do $aut"), "lis_sup" => array("act" => "$adm:$lis:$sup", "desc" => "Tarefa de $adm: $lis do $sup"), "lis_pros" => array("act" => "$adm:$lis:$pro"."s", "desc" => "Tarefa de $adm: $lis de $pro"."s"), "lis_pro" => array("act" => "$adm:$lis:$pro", "desc" => "Tarefa de $adm: $lis do $pro"), "lis_dis_as" => array("act" => "$dis:$lis:$aut$sup", "desc" => "Tarefa de $dis: $lis de $aut"."es e $sup"."es"), "lis_dis_aut" => array("act" => "$dis:$lis:$aut", "desc" => "Tarefa de $dis: $lis do $aut"), "lis_dis_sup" => array("act" => "$dis:$lis:$sup", "desc" => "Tarefa de $dis: $lis do $sup"), "lis_dis_pros" => array("act" => "$dis:$lis:$pro"."s", "desc" => "Tarefa de $dis: $lis de $pro"."s"), "lis_dis_pro" => array("act" => "$dis:$lis:$pro", "desc" => "Tarefa de $dis: $lis do $pro"),"lis_dis_uti" => array("act" => "$dis:$lis:$uti", "desc" => "Tarefa de $dis: $lis de $uti"."es"), "login" => array("act" => "Login", "desc" => "Login no sistema pelo $uti")); //TODO:acabar


/* * ****************
 * MINHAS FUNÇÕES *
 * **************** */

function go_back() {
    echo "<span class=\"go_back\"><A HREF=\"javascript:javascript:history.go(-1)\">Voltar</A></span>";
}

function agora() {
    date_default_timezone_set("Europe/Lisbon");
    return date("Y-m-d\TH:i:s");
}

function log_exists($l) {
    if (!file_exists($l)) {
        $fh = fopen($l, 'w') or die("can't open file");
        fwrite($fh, "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?><logs></logs>");
        fclose($fh);
    }
}

function log_insert($username, $name, $date, $action, $description) {
    log_exists("../logs/logs.xml");

    $logs = simplexml_load_file("../logs/logs.xml");
    $log = $logs->addChild('log');
    $log->addChild('username', utf8_decode($username)); //TODO:caracteres estranhos sao subsituidos por '?'
    $log->addChild('name', utf8_decode($name));
    $log->addChild('date', utf8_decode($date));
    $log->addChild('action', utf8_decode($action));
    $log->addChild('description', utf8_decode($description));

    $logs->asXML("../logs/logs.xml");
}

function log_list($eu, $limit) {
    log_exists("logs.xml");

    $logs = simplexml_load_file("logs.xml");
    $str = "{ \"data\" : [";
    for ($i = 0; $i < $eu + $limit and $logs->log[$i] != null; $i++) {
        if ($i >= $eu) {
            $log = $logs->log[$i];
            $str = $str . "{\"username\" : \"$log->username\", \"name\" : \"$log->name\", \"date\" : \"$log->date\", \"action\" : \"$log->action\", \"description\" : \"$log->description\"},";
        }
    }
    if (log_count() != 0)
        $str = substr($str, 0, (strLen($str) - 1));
    return $str;
}

function log_count() {
    log_exists("logs.xml");
    return simplexml_load_file("logs.xml")->count();
}

// valdiação de um xml

function libxml_display_error($error) {
    $return = "<br/>\n";
    switch ($error->level) {
        case LIBXML_ERR_WARNING:
            $return .= "<b>Warning $error->code</b>: ";
            break;
        case LIBXML_ERR_ERROR:
            $return .= "<b>Error $error->code</b>: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "<b>Fatal Error $error->code</b>: ";
            break;
    }
    $return .= trim($error->message);
    if ($error->file) {
        $return .= " in <b>$error->file</b>";
    }
    $return .= " on line <b>$error->line</b>\n";

    return $return;
}

function libxml_display_errors() {
    $errors = libxml_get_errors();
    foreach ($errors as $error) {
        print libxml_display_error($error);
    }
    libxml_clear_errors();
}

function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    rrmdir($dir . "/" . $object); else
                    unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

?>
