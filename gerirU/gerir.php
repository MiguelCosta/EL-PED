<?php
   session_start();
   if (!isset($_SESSION['username'])) {
	  $_SESSION['type'] = 'u'; // Unknown
   }
?>

<!DOCTYPE html>
<html>
   <head>
	  <title>RepositórioPED</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
	  <link rel="stylesheet" type="text/css" href="../css/style.css" />
   </head>
   <body>
	  <div id="container">
		 <?php
			include '../header.php';
			include '../menus/menu_gerirU.php';
			include '../menus/leftmenuGerir.php';
		 ?>


		 <div id="content">
			<div id="content_top"></div>
			<div id="content_main">
			   <h2>Repositório</h2>
			   <br/>
			   <br/>
                           <p>Nesta categoria, as opções existentes variam dependendo do tipo de utilizador que é.</p>
                           <p>No entanto, todos tem acesso à listagem dos projectos, por isso consulte
                           todos os projectos que lhe parecem interessantes.</p>
			   <br/>
                           <div style="width: 100%; text-align: center;">
                           <img src="../css/images/box.png"/>
                           </div>
			   <br/>
			</div>
			<div id="content_bottom"></div>

			<?php
			   include '../menus/footer.php';
			?>
		 </div>
	  </div>
   </body>
</html>
