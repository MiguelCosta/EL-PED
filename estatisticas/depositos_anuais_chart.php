<?php

include '../ini.php';

if (!$con) {
    echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
} else {

    //Generate the graph element
    $strXML = "<graph caption='Depositos por ano' xAxisName='Anos' yAxisName='Depositos' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridColor='ff5904' divLineColor='ff5904' divLineAlpha='20' alternateHGridAlpha='5'>";

    $sql = "SELECT year AS grp, SUM(deposits) AS acc FROM ViewNumDepositsDate GROUP BY grp ORDER BY grp";
    $result = mysql_query($sql) or die(mysql_error());

    if ($result) {
        while ($ors = mysql_fetch_array($result)) {
            $strXML .= "<set name='" . $ors['grp'] . "' value='" . $ors['acc'] . "' />";
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