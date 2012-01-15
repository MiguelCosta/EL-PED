<?php
   session_start();
   if (!isset($_SESSION['username']) || !$_SESSION['username'] || ((isset($_SESSION['username']) && isset($_SESSION['type']) && $_SESSION['type'] != 'a'))) {
	  header("Location: ../home.php");
   }
?>

<!DOCTYPE html>
<html>
   <head>
	  <title>Logs - RepositórioPED</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
	  <link rel="stylesheet" type="text/css" href="../css/style.css" />
   </head>
   <body>
	  <div id="container">
		 <?php
			include '../header.php';
			include '../menus/menu_logs.php';
			include '../menus/leftmenuLogs.php';
		 ?>


		 <div id="content">
			<div id="content_top"></div>
			<div id="content_main">
			   <h2>Logs</h2>
			   <br/>
			   <br/>
			   <div id="containt_main_users">
				  <?php
					include '../ini.php';
					log_reverse();
					 require_once('apaging.htm');
				  ?>  
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
