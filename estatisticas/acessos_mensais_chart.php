<?php

include '../ini.php';

if (!$con) {
    echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
} else {

    //Generate the graph element
    $strXML = "<graph caption='Acessos por mês' xAxisName='Meses' yAxisName='Acessos' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridColor='ff5904' divLineColor='ff5904' divLineAlpha='20' alternateHGridAlpha='5'>";

	//$sql = "SELECT month AS grp, SUM(accesses) AS acc FROM ViewNumAccessData GROUP BY grp ORDER BY grp";
	$sql = "SELECT * FROM (SELECT * FROM ViewNumAccessData ORDER BY month, year DESC LIMIT 0,12) AS tb ORDER BY year, month";
    $result = mysql_query($sql) or die(mysql_error());

    if ($result) {
	   //setlocale(LC_ALL, 'pt_PT');
        while ($ors = mysql_fetch_array($result)) {
		   //$timestamp = mktime(0, 0, 0, $ors['month'], 1, 2005);
			//$strXML .= "<set name='" . strftime("%b", $timestamp) . "/".$ors['year'] ."' value='" . $ors['accesses'] . "' />";
            $strXML .= "<set name='" . $ors['month'] . "/".$ors['year'] ."' value='" . $ors['accesses'] . "' />";
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
