<?php

   include '../ini.php';

   if (!$con) {
	  echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
   } else {

	  //Generate the graph element
	  $strXML = "<graph caption='Depositos por mês' xAxisName='Meses' yAxisName='Depositos' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridColor='ff5904' divLineColor='ff5904' divLineAlpha='20' alternateHGridAlpha='5'>";

	  //$sql = "SELECT month AS grp, SUM(deposits) AS acc FROM ViewNumDepositsDate GROUP BY grp ORDER BY grp";
	  $sql = "SELECT * FROM (SELECT * FROM ViewNumDepositsDate ORDER BY month, year DESC LIMIT 0,12) AS tb ORDER BY year, month";
	  $result = mysql_query($sql) or die(mysql_error());

	  if ($result) {
		 //setlocale(LC_ALL, 'pt_PT');
		 while ($ors = mysql_fetch_array($result)) {
			//$timestamp = mktime(0, 0, 0, $ors['grp'], 1, 2005);
			//$strXML .= "<set name='" . strftime("%B", $timestamp) . "' value='" . $ors['acc'] . "' />";
			$strXML .= "<set name='" . $ors['month'] . "/".$ors['year'] ."' value='" . $ors['deposits'] . "' />";
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
