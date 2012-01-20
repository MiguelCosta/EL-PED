<?php
   session_start();
   if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] != 'a'))) {
	  header("Location: ../home.php");
   }
?>

<!DOCTYPE html>
<html>
   <head>
	  <title>Gerir->Submissoes->Remover - RepositórioPED</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
	  <link rel="stylesheet" type="text/css" href="../css/style.css" />
   </head>
   <body>
	  <div id="container">
		 <?php
			require_once '../header.php';
			require_once '../menus/menu_gerirU.php';
			require_once '../menus/leftmenuGerir.php';
			include '../ini.php';
			require_once '../indexing/functions.php';
		 ?>


		 <div id="content">
			<div id="content_top"></div>
			<div id="content_main">
			   <h2>Remover Submissoes</h2>
			   <div id="containt_main_users">
				  <?php
					 if (!$con) {
						echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
					 } else {
						$msg_erro = "";

						// id do projecto que vai ser removido
						$projcode = $_REQUEST["projcode"];

						if ($projcode == null) {
						   $msg_erro .= "Projcode incorreto!<br/>";
						}

						$sql = "SELECT projcode FROM Project WHERE projcode='$projcode'";
						$result = mysql_query($sql);
						$existe = false;
						while ($row = mysql_fetch_array($result)) {
						   $existe = true;
						}

						if ($msg_erro != "") {
						   echo $msg_erro;
						   go_back();
						} else {
						   if ($existe) {
							  $sql = "UPDATE Project SET remove=1 WHERE projcode='$projcode'";
							  mysql_query($sql, $con) or die(mysql_error());
							  echo "Remoção feita com sucesso!";

							  // Insercao no registo de logs
							  log_insert($_SESSION['username'], $_SESSION['name'], agora(), $log_msg["rem_pro"]["act"], $log_msg["rem_pro"]["desc"] . " $projcode");

							  // Atualizacao do indice
							  global $indexPath;
							  updateIndexOld($indexPath, $projcode);
						   }
						}
					 }
				  ?>
			   </div>

			   <br/>
			</div>
			<div id="content_bottom"></div>

			<?php
			   require_once '../menus/footer.php';
			?>
		 </div>
	  </div>
   </body>
</html>
