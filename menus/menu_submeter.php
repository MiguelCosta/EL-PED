<div id="menu">
   <ul>
	  <li class="menuitem"><a href="../home.php">Início</a></li>
	  <?php
		 if (!isset($_SESSION))
		 session_start();

		 if (isset($_SESSION['username']) && $_SESSION['username'] && $_SESSION['type'] != 'c') {
			echo "<li class=\"menuitem\"><a href=\"submeter.php\">Submeter</a></li>";
		 }
		 echo "<li class=\"menuitem\"><a href=\"../gerirU/gerir.php\">Repositório</a></li>";
		 echo "<li class=\"menuitem\"><a href=\"../estatisticas/estatisticas.php\">Estatísticas</a></li>";
		 if (isset($_SESSION['username']) && $_SESSION['username'] && $_SESSION['type'] == 'a') {
			echo "<li class=\"menuitem\"><a href=\"../logs/logs.php\">Logs</a></li>";
		 }
	  ?>
          <li class="menuitem"><a href="../webService/webService.php">WebService</a></li>
	  <li class="menuitem"><a href="../acerca.php">Acerca</a></li>
	  <?php require_once('../indexing/search.php'); ?>
   </ul>
</div>
