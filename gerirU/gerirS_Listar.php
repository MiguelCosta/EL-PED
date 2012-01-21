<?php
   session_start();
   if (!isset($_SESSION['username'])) {
	  $_SESSION['type'] = 'u'; // Unknown
   }
?>

<!DOCTYPE html>

<html>
   <head>
	  <title>Gerir->Submissoes->Listar - RepositórioPED</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	  <link rel="stylesheet" type="text/css" href="../css/style.css" />
   </head>
   <body>
	  <div id="container">
		 <?php
			require_once '../header.php';
			require_once '../menus/menu_gerirU.php';
			require_once '../menus/leftmenuGerir.php';
			include '../ini.php';
		 ?>


		 <div id="content">
			<div id="content_top"></div>
			<div id="content_main">
			   <h2>Lista de Submissões</h2>
			   <div id="containt_main_users">
				  <?php
					 if (!$con) {
						echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
					 } else {
						require_once('pagination.php');

						// Insercao no registo de logs
						$username = isset($_SESSION['username']) ? $_SESSION['username'] : "Unknown";
						$name = isset($_SESSION['name']) ? $_SESSION['name'] : "Unknown";
						if ($_SESSION['type'] == 'a')
						log_insert($username, $name, agora(), $log_msg["lis_pros"]["act"], $log_msg["lis_pros"]["desc"]);
						else if ($_SESSION['type'] == 'c' || $_SESSION['type'] == 'u')
						log_insert($username, $name, agora(), $log_msg["lis_dis_pros"]["act"], $log_msg["lis_dis_pros"]["desc"]);
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
