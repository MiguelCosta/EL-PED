<?php
   session_start();
?>

<!DOCTYPE html>
<html>
   <head>
	  <title>Top Consultas de projetos</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
	  <link rel="stylesheet" type="text/css" href="../css/style.css" />
	  <SCRIPT LANGUAGE="Javascript" SRC="../FusionCharts/FusionCharts.js"></SCRIPT>
   </head>
   <body>
	  <div id="container">
		 <?php
			include '../header.php';
			include '../menus/menu_estatisticas.php';
			include '../menus/leftmenuEstatisticas.php';
			include '../ini.php';
			include '../FusionCharts/Includes/FusionCharts.php';
		 ?>


		 <div id="content">
			<div id="content_top"></div>
			<div id="content_main">
			   <h2>Top Consultas de projetos</h2>
			   <br/>
			   <br/>
			   <div style="text-align: center">
				  <?php
					 if (!$con) {
						echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
					 } else {
						$sql = "SELECT queries FROM ViewNumQueriesProjTotal";
						$result = mysql_query($sql) or die(mysql_error());
						if ($result) {
						   while ($ors = mysql_fetch_array($result))
						   $res = $ors['queries'];
						   mysql_free_result($result);
						}
						echo "<h4>Total de consultas: " . $res . "</h4>";

						$strDataURL = "queries_proj_top_chart.php";
						echo renderChart("../FusionCharts/FCF_Column3D.swf", $strDataURL, "", "TopConsultasProj", 650, 450);

						$sql = "SELECT P.projcode, keyname, title FROM ViewTopQueriesProj AS V, Project AS P WHERE V.projcode=P.projcode"; 
						$result = mysql_query($sql) or die(mysql_error());
						obj_to_table(1, $result);

					 }
				  ?>
			   </div>
			</div>
			<div id="content_bottom"></div>

			<?php
			   include '../menus/footer.php';
			?>

		 </div>
	  </div>
   </body>
</html>
