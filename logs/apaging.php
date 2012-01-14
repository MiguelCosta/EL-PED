<?

include '../ini.php';

$endrecord = $_GET['endrecord']; // To take care global variable if OFF

if (strlen($endrecord) > 0 and !is_numeric($endrecord)) {
    echo "Data Error";
    exit;
}

$limit = 4; // numero de registos por pagina
if ($endrecord < $limit) {
    $endrecord = 0;
} // se o $endrecord for menor que o limite significa que já nao existem mais registos depois desta pagina.
switch ($_GET['direction']) {
    case "fw":
        $eu = $endrecord;
        break;

    case "bk":
        $eu = $endrecord - 2 * $limit;
        break;

    default:
        echo "Data Error";
        exit;
        break;
}

///// redefinicao da variavel $endrecord //////
if ($eu < 0) {
    $eu = 0;
}
$endrecord = $eu + $limit;

///// dados //////
$str = log_list($eu, $limit);

///// definicao da variavel $end, que diz se é a ultima pagina /////
$nume = log_count();
if (($endrecord) < $nume) {
    $end = "yes";
} else {
    $end = "no";
}

///// definicao da variavel $startrecord /////
if (($endrecord) > $limit) {
    $startrecord = "yes";
} else {
    $startrecord = "no";
}

// este codigo serve apenas para saber o output das coisas temporariamente
//$fh = fopen("log.txt", 'w') or die("can't open file");
//fwrite($fh, "eu:$eu\nlimit:$limit\nendrecord:$endrecord\nstartrecord:$startrecord\nend:$end\nnume:$nume\n");
//fclose($fh);
///// valores auxiliares /////
$str = $str . "],\"value\" : [{\"endrecord\" : $endrecord,\"limit\" : $limit,\"end\" : \"$end\",\"startrecord\" : \"$startrecord\"}]}";
echo $str;
?>
