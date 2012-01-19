<!DOCTYPE html>
<html>
   <head>
	  <title>HOME - Reposit�rioPED</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
	  <link rel="stylesheet" type="text/css" href="css/style.css" />
   </head>
   <body>
	  <div id="container">
		 <?php
			require_once 'header.php';
			require_once 'menus/menu.php';
			require_once 'menus/leftmenuHome.php';
			//ini_set('include_path',ini_get('include_path').':.');
		 ?>


		 <div id="content">
			<div id="content_top"></div>
			<div id="content_main">
			   <h2>Reposit�rio para Submiss�o de Trabalhos</h2>
			   <br/>
			   <br/>
			   <h3>Finalidade deste Reposit�rio</h3>
			   <?php
				  require_once 'indexing/functions.php';
				  require_once 'ini.php';
				  var_dump(loadIndex($indexPath));
			   ?>
			   <p>Dizer alguma coisa sobre o que � pretendido com este reposit�rio.</p>
			   <br/>
			   <h3>Utilidade</h3>
			   <p>Dizer porque � �til.</p>
			   <br/>
			   <h3>Notas</h3>
			   <p>Algumas notas</p>
			   <br/>
			</div>
			<div id="content_bottom"></div>

			<?php
			   include 'menus/footer.php';
			?>
		 </div>
	  </div>
   </body>
</html>
