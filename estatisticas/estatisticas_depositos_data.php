<?php
   session_start();
?>

<!DOCTYPE html>
<html>
   <head>
	  <title>Depósitos por data</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
	  <link rel="stylesheet" type="text/css" href="../css/style.css" />
	  <SCRIPT LANGUAGE="Javascript" SRC="../FusionCharts/FusionCharts.js"></SCRIPT>
   </head>
   <script type="text/javascript">

	  function autoForm()
	  {
			NameChanger();
	  }

	  window.onload = autoForm;

	  function radioCheck(){ 
			var i 
			for (i=0;i<document.tipos.tipo.length;i++){ 
				  if (document.tipos.tipo[i].checked){
						var c = document.tipos.tipo[i].value;
						break; 
				  }
			} 
			return c;
	  } 

	  function NameChanger()
	  {
			if(document.tipos.ano.checked == true) {
				  var a = document.getElementById('ano_graph');
				  a.style.visibility = "visible";

				  var div_a = document.getElementById('ano_graph_d')
				  div_a.style.zIndex="2";

				  var s = document.getElementById('mes_graph');
				  s.style.visibility = "hidden";

				  var div_s = document.getElementById('mes_graph_d')
				  div_s.style.zIndex="1";

			}
			if(document.tipos.mes.checked == true) {
				  //window.alert("supervisor");
				  var a = document.getElementById('ano_graph');
				  a.style.visibility = "hidden";
				  var div_a = document.getElementById('ano_graph_d')
				  div_a.style.zIndex="1";

				  var s = document.getElementById('mes_graph');
				  s.style.visibility = "visible";

				  var div_s = document.getElementById('mes_graph_d')
				  div_s.style.zIndex="2";
			}
			movieplay();
			return true;
	  }
   </script>

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
			   <h2>Depósitos por data</h2>
			   <br/>
			   <br/>
			   <div style="text-align: center">
				  <?php
					 if (!$con) {
						echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
					 } else {
					 ?>
					 <form id="formInsertAS_Type" name="tipos" method="post">
						<input id="ano" type="radio" name="tipo" value="ano" CHECKED onclick="NameChanger()"/> Ano
						<input id="mes" type="radio" name="tipo" value="mes" onclick="NameChanger()"/> Mes
					 </form>     


					 <?php
						$sql = "SELECT numProjsTotal FROM ViewNumDepositsTotal";
						$result = mysql_query($sql) or die(mysql_error());

						if ($result) {
						   while ($ors = mysql_fetch_array($result))
						   $acc = $ors['numProjsTotal'];
						   mysql_free_result($result);
						}
						echo "<h4>Total de depósitos: " . $acc . "</h4>";
					 ?>

					 <div id="data_graph">
						<div id="ano_graph_d">
						   <form id="ano_graph" name="ano_graph">
							  <?php
								 $strDataURL = "depositos_anuais_chart.php";
								 echo renderChart("../FusionCharts/FCF_Line.swf", $strDataURL, "", "DepositosAnuais", 650, 450);
							  ?>
						   </form>
						</div>
						<div id="mes_graph_d">
						   <form id="mes_grph" name="mes_graph">
							  <?php
								 $strDataURL = "depositos_mensais_chart.php";
								 echo renderChart("../FusionCharts/FCF_Line.swf", $strDataURL, "", "DepositosMensais", 650, 450);
							  ?>
						</form>                                                                                                                                                  </div>
					 </div>             
					 <?php
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
