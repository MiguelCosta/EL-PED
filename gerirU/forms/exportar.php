<?php
require_once '../ini.php';

if (!is_dir("../uploads/export/")) {
    mkdir("../uploads/export/", 0777, true);
}

/* * *************************************** Versão errada ! **************************************** */
/*                 mas só esta funciona, a que devia ser não funciona e não percebo porquê            */
$local_big_xml = "../uploads/bd/megapr.xml";
$fh = fopen($local_big_xml, 'w') or die("can't open file");
fwrite($fh, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<aaa>\n");
/* Para todos os projetos */
fwrite($fh, "\t<prs>\n");
$sql = "SELECT * FROM Project";
$res = mysql_query($sql, $con);
while ($row = mysql_fetch_array($res)) {
    fwrite($fh, "\t\t<pr>\n");
    fwrite($fh, "\t\t\t<projcode>" . $row["projcode"] . "</projcode>\n");
    fwrite($fh, "\t\t\t<keyname>" . utf8_decode($row["keyname"]) . "</keyname>\n");
    fwrite($fh, "\t\t\t<title>" . utf8_decode($row["title"]) . "</title>\n");
    fwrite($fh, "\t\t\t<subtitle>" . utf8_decode($row["subtitle"]) . "</subtitle>\n");
    fwrite($fh, "\t\t\t<bdate>" . $row["bdate"] . "</bdate>\n");
    fwrite($fh, "\t\t\t<edate>" . $row["edate"] . "</edate>\n");
    fwrite($fh, "\t\t\t<subdate>" . $row["subdate"] . "</subdate>\n");
    fwrite($fh, "\t\t\t" . utf8_decode($row["abstract"]) . "\n");
    fwrite($fh, "\t\t\t<coursecode>" . $row["coursecode"] . "</coursecode>\n");
    fwrite($fh, "\t\t\t<path>" . utf8_decode($row["path"]) . "</path>\n");
    fwrite($fh, "\t\t\t<remove>" . $row["remove"] . "</remove>\n");
    fwrite($fh, "\t\t\t<private>" . $row["private"] . "</private>\n");

    fwrite($fh, "\t\t</pr>\n");
}
fwrite($fh, "\t</prs>\n");
fwrite($fh, "</aaa>");
fclose($fh);


/* * *************************************** como devia ser ! **************************************** */
/*
  $local_big_xml2 = "../uploads/bd/megapr2.xml";
  $fh = fopen($local_big_xml2, 'w') or die("can't open file");
  fwrite($fh, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<aaa></aaa>\n");
  fclose($fh);
  $big_xml = simplexml_load_file($local_big_xml2) or die ("nao conseguiu abrir o xml");
  $prs = $big_xml->addChild('prs');

  $sql = "SELECT * FROM Project";
  $res = mysql_query($sql, $con);
  while ($row = mysql_fetch_array($res)) {
  $pr = $prs->addChild('pr');
  $pr->addChild('projcode', $row["projcode"]);
  $pr->addChild('keyname', utf8_decode($row["keyname"]));
  $pr->addChild('title', utf8_decode($row["title"]));
  $pr->addChild('subtitle', utf8_decode($row["subtitle"]));
  $pr->addChild('bdate', $row["bdate"]);
  $pr->addChild('edate', $row["edate"]);
  $pr->addChild('subdate', $row["subdate"]);
  $pr->addChild(utf8_decode($row["abstract"]));
  $pr->addChild('coursecode', $row["coursecode"]);
  $pr->addChild('path', utf8_decode($row["path"]));
  $pr->addChild('remove', $row["remove"]);
  $pr->addChild('private', $row["private"]);
  }
  $big_xml->asXML();
 * */

$origem = "../uploads/bd/";
$destino = "../uploads/export/export.zip";
Zip($origem, $destino);
?>

<!--
<div id="download">
    <a href="<? echo $destino; ?>">
        <input type="image" src="../css/images/zip2.png"/><br/>
        <b>Clique para guardar o ficheiro no seu computador.</b>
    </a>
</div>
-->
<div id="download">
    <a href="getFile.php?file=<? echo $destino; ?>">
        <input type="image" src="../css/images/zip2.png"/><br/>
        <b>Clique para guardar o ficheiro no seu computador.</b>
    </a>
</div>