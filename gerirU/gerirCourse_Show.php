<?php
   session_start();
   if (!isset($_SESSION['username'])) {
	  $_SESSION['type'] = 'u'; // Unknown
   }
?>

<!DOCTYPE html>

<html>
   <head>
	  <title>Gerir->Cursos</title>
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
			   <h2>Detalhes do Curso <?php echo $_REQUEST['id']; ?></h2>
			   <br/>
			   <br/>
			   <div id="containt_main_users">
				  <?php
					 if (!$con) {
						echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
					 } else {
						$coursecode = $_REQUEST['id'];

						echo "falta listar todas as pessaos de cada curso! e colocar algumas estatiscas ou assim";
						echo "<br/>";
						echo "ID: $coursecode";
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
