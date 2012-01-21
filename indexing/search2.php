<!DOCTYPE html>
<html>
   <head>
	  <title>Resultados da Procura - RepositórioPED</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	  <link rel="stylesheet" type="text/css" href="../css/style.css" />
   </head>
   <body>
	  <div id="container">
		 <?php
			require_once '../header.php';
			require_once '../menus/menu_search.php';
			//require_once '../menus/leftmenuLogs.php';
		 ?>

		 <div id="content_no_left">
			<div id="content_top"></div>
			<div id="content_main">
			   <h2>Resultados da Procura</h2>
			   <br/>
			   <br/>
			   <?php
				  if(!isset($_SESSION)) session_start();
				  if(!isset($_SESSION['type'])) $_SESSION['type']='u';
				  $_SESSION['query'] = isset($_REQUEST['query']) ? trim($_REQUEST['query']) : ''; 

				  require_once 'pagination.php';
			   ?>

			</div>
			<div id="content_bottom"></div>

			<?php
			   include '../menus/footer.php';
			?>
		 </div>
	  </div>
   </body>
</html>
