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
    fwrite($fh, "\t\t\t<keyname>" . $row["keyname"] . "</keyname>\n");
    fwrite($fh, "\t\t\t<title>" . $row["title"] . "</title>\n");
    fwrite($fh, "\t\t\t<subtitle>" . $row["subtitle"] . "</subtitle>\n");
    fwrite($fh, "\t\t\t<bdate>" . $row["bdate"] . "</bdate>\n");
    fwrite($fh, "\t\t\t<edate>" . $row["edate"] . "</edate>\n");
    fwrite($fh, "\t\t\t<subdate>" . $row["subdate"] . "</subdate>\n");
    fwrite($fh, "\t\t\t" . $row["abstract"] . "\n");
    fwrite($fh, "\t\t\t<coursecode>" . $row["coursecode"] . "</coursecode>\n");
    fwrite($fh, "\t\t\t<path>" . $row["path"] . "</path>\n");
    fwrite($fh, "\t\t\t<remove>" . $row["remove"] . "</remove>\n");
    fwrite($fh, "\t\t\t<private>" . $row["private"] . "</private>\n");

    fwrite($fh, "\t\t</pr>\n");
}
fwrite($fh, "\t</prs>\n");



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
  $pr->addChild('projcode', $row["projcode"];
  $pr->addChild('keyname', $row["keyname"]);
  $pr->addChild('title', $row["title"]);
  $pr->addChild('subtitle', $row["subtitle"]);
  $pr->addChild('bdate', $row["bdate"];
  $pr->addChild('edate', $row["edate"];
  $pr->addChild('subdate', $row["subdate"];
  $pr->addChild($row["abstract"]);
  $pr->addChild('coursecode', $row["coursecode"];
  $pr->addChild('path', $row["path"]);
  $pr->addChild('remove', $row["remove"];
  $pr->addChild('private', $row["private"];
  }
  $big_xml->asXML();
 * */

/* Para todos os deliverables */
fwrite($fh, "\t<dels>\n");
$sql = "SELECT * FROM Deliverable";
$res = mysql_query($sql, $con);
while ($row = mysql_fetch_array($res)) {
    fwrite($fh, "\t\t<del>\n");
    fwrite($fh, "\t\t\t<delcode>" . $row["delcode"] . "</delcode>\n");
    fwrite($fh, "\t\t\t<description>" . $row["description"] . "</description>\n");
    fwrite($fh, "\t\t\t<path>" . $row["path"] . "</path>\n");
    fwrite($fh, "\t\t\t<projcode>" . $row["projcode"] . "</projcode>\n");
    fwrite($fh, "\t\t</del>\n");
}
fwrite($fh, "\t</dels>\n");

/* Para todos os Autores */
fwrite($fh, "\t<authors>\n");
$sql = "SELECT * FROM Author";
$res = mysql_query($sql, $con);
while ($row = mysql_fetch_array($res)) {
    fwrite($fh, "\t\t<author>\n");
    fwrite($fh, "\t\t\t<authorcode>" . $row["authorcode"] . "</authorcode>\n");
    fwrite($fh, "\t\t\t<name>" . $row["name"] . "</name>\n");
    fwrite($fh, "\t\t\t<id>" . $row["id"] . "</id>\n");
    fwrite($fh, "\t\t\t<email>" . $row["email"] . "</email>\n");
    fwrite($fh, "\t\t\t<url>" . $row["url"] . "</url>\n");
    fwrite($fh, "\t\t\t<coursecode>" . $row["coursecode"] . "</coursecode>\n");
    fwrite($fh, "\t\t\t<remove>" . $row["remove"] . "</remove>\n");
    fwrite($fh, "\t\t</author>\n");
}
fwrite($fh, "\t</authors>\n");

/* Para todos os Supervisores */
fwrite($fh, "\t<supervisors>\n");
$sql = "SELECT * FROM Supervisor";
$res = mysql_query($sql, $con);
while ($row = mysql_fetch_array($res)) {
    fwrite($fh, "\t\t<supervisor>\n");
    fwrite($fh, "\t\t\t<supcode>" . $row["supcode"] . "</supcode>\n");
    fwrite($fh, "\t\t\t<name>" . $row["name"] . "</name>\n");
    fwrite($fh, "\t\t\t<email>" . $row["email"] . "</email>\n");
    fwrite($fh, "\t\t\t<url>" . $row["url"] . "</url>\n");
    fwrite($fh, "\t\t\t<affil>" . $row["affil"] . "</affil>\n");
    fwrite($fh, "\t\t\t<remove>" . $row["remove"] . "</remove>\n");
    fwrite($fh, "\t\t</supervisor>\n");
}
fwrite($fh, "\t</supervisors>\n");

/* Para todos os Key Words */
fwrite($fh, "\t<kws>\n");
$sql = "SELECT * FROM KeyWord";
$res = mysql_query($sql, $con);
while ($row = mysql_fetch_array($res)) {
    fwrite($fh, "\t\t<kw>\n");
    fwrite($fh, "\t\t\t<kwcode>" . $row["kwcode"] . "</kwcode>\n");
    fwrite($fh, "\t\t\t<keyword>" . $row["keyword"] . "</keyword>\n");
    fwrite($fh, "\t\t</kw>\n");
}
fwrite($fh, "\t</kws>\n");

/* Para todos os Cursos */
fwrite($fh, "\t<courses>\n");
$sql = "SELECT * FROM Course";
$res = mysql_query($sql, $con);
while ($row = mysql_fetch_array($res)) {
    fwrite($fh, "\t\t<course>\n");
    fwrite($fh, "\t\t\t<coursecode>" . $row["coursecode"] . "</coursecode>\n");
    fwrite($fh, "\t\t\t<coursedescription>" . $row["coursedescription"] . "</coursedescription>\n");
    fwrite($fh, "\t\t</course>\n");
}
fwrite($fh, "\t</courses>\n");

/* Para todos os ProjAut */
fwrite($fh, "\t<projauts>\n");
$sql = "SELECT * FROM ProjAut";
$res = mysql_query($sql, $con);
while ($row = mysql_fetch_array($res)) {
    fwrite($fh, "\t\t<projaut>\n");
    fwrite($fh, "\t\t\t<projcode>" . $row["projcode"] . "</projcode>\n");
    fwrite($fh, "\t\t\t<authorcode>" . $row["authorcode"] . "</authorcode>\n");
    fwrite($fh, "\t\t</projaut>\n");
}
fwrite($fh, "\t</projauts>\n");

/* Para todos os ProjSup */
fwrite($fh, "\t<projsups>\n");
$sql = "SELECT * FROM ProjSup";
$res = mysql_query($sql, $con);
while ($row = mysql_fetch_array($res)) {
    fwrite($fh, "\t\t<projsup>\n");
    fwrite($fh, "\t\t\t<projcode>" . $row["projcode"] . "</projcode>\n");
    fwrite($fh, "\t\t\t<supcode>" . $row["supcode"] . "</supcode>\n");
    fwrite($fh, "\t\t</projsup>\n");
}
fwrite($fh, "\t</projsups>\n");

/* Para todos os ProjKW */
fwrite($fh, "\t<projkws>\n");
$sql = "SELECT * FROM ProjKW";
$res = mysql_query($sql, $con);
while ($row = mysql_fetch_array($res)) {
    fwrite($fh, "\t\t<projkw>\n");
    fwrite($fh, "\t\t\t<projcode>" . $row["projcode"] . "</projcode>\n");
    fwrite($fh, "\t\t\t<kwcode>" . $row["kwcode"] . "</kwcode>\n");
    fwrite($fh, "\t\t</projkw>\n");
}
fwrite($fh, "\t</projkws>\n");


fwrite($fh, "</aaa>");
fclose($fh);
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
    <a href="getFile.php?file=<? echo $destino; ?>&tipo=exportar">
        <input type="image" src="../css/images/zip2.png"/><br/>
        <b>Clique para guardar o ficheiro no seu computador.</b>
    </a>
</div>