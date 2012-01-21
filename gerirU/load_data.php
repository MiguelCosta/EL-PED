<?php
   if(!isset($_SESSION)) session_start();
   require_once '../ini.php';
   require_once('gerir_functions.php');
   require_once('../pagination/pagination_config.php');

   if ($_POST['page']) {
	  $page = $_POST['page'];
	  $cur_page = $page;
	  $page -= 1;
	  $per_page = 15;
	  $previous_btn = true;
	  $next_btn = true;
	  $first_btn = true;
	  $last_btn = true;
	  $start = $page * $per_page;


	  /* -------------------------------------------------------------------------------------------------------------------------- */
	  /* ---------------------------------------------------------- Data ---------------------------------------------------------- */
	  /* -------------------------------------------------------------------------------------------------------------------------- */
	  if ($_SESSION['type'] == 'a') {
		 // se for administrador pode ver tudo
		 $sql = "SELECT * FROM Project ORDER BY subdate DESC";
		 $sql_count = "SELECT COUNT(1) AS count FROM Project";
	  } elseif ($_SESSION['type'] == 'p') {
		 // se for produtor, pode ver os seus projetos (mesmo que privados) e os publicos
		 $sql = "SELECT * FROM Project WHERE (remove=0 AND private=0) OR projcode IN (SELECT projcode FROM Deposits WHERE username='" . $_SESSION['username'] . "') GROUP BY projcode ORDER BY subdate DESC";
		 $sql_count = "SELECT COUNT(1) AS count FROM Project WHERE (remove=0 AND private=0) OR projcode IN (SELECT projcode FROM Deposits WHERE username='" . $_SESSION['username'] . "') GROUP BY projcode";
	  } else {
		 $sql = "SELECT * FROM Project WHERE remove=0 AND private=0 ORDER BY subdate DESC";
		 $sql_count = "SELECT COUNT(1) AS count FROM Project WHERE remove=0 AND private=0";
	  }

	  $sql .= " LIMIT $start, $per_page";
	  $res = mysql_query($sql, $con);
	  $msg = submission_to_table("Submissões", $res);

	  $result_pag_num = mysql_query($sql_count, $con) or die('MySql Error' . mysql_error());
	  $row = mysql_fetch_array($result_pag_num);
	  $count = $row['count'];

	  /* -------------------------------------------------------------------------------------------------------------------------- */
	  /* --------------------------------------------------- Configuration -------------------------------------------------------- */
	  /* -------------------------------------------------------------------------------------------------------------------------- */
	  $msg = page_config($msg,$count,$per_page,$cur_page,$first_btn,$previous_btn,$next_btn,$last_btn);
	  echo $msg;
   }

?>
