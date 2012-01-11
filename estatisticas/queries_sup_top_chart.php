<?php

include '../ini.php';

if (!$con) {
    echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
} else {

    //Generate the graph element
    $strXML = "<graph caption='Top Consultas de supervisores' xAxisName='Supervisores' yAxisName='Consultas' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridColor='ff5904' divLineColor='ff5904' divLineAlpha='20' alternateHGridAlpha='5'>";

    $sql = "SELECT V.supcode AS pc, name, queries FROM ViewTopQueriesSup AS V, Supervisor AS S WHERE V.supcode=S.supcode";
    $result = mysql_query($sql) or die(mysql_error());

    if ($result) {
        while ($ors = mysql_fetch_array($result)) {
            $strXML .= "<set name='" . $ors['name'] . "' value='" . $ors['queries'] . "' link='" . urlencode("../gerirU/gerirAS_Show_supervisor.php?supcode=" . $ors['pc']) . "' />";
        }
        mysql_free_result($result);
    }

    //Finally, close <graph> element
    $strXML .= "</graph>";

    //Set Proper output content-type
    header('Content-type: text/xml');

    //Just write out the XML data
    echo $strXML;
}
?>