<?php
   include '../ini.php';
   require_once('../pagination/pagination_config.php');

   if ($_POST['page']) {
	  $page = $_POST['page'];
	  $cur_page = $page;
	  $page -= 1;
	  $per_page = 10;
	  $previous_btn = true;
	  $next_btn = true;
	  $first_btn = true;
	  $last_btn = true;
	  $start = $page * $per_page;


	  /* ------------------- Dados -------------------- */
	  $msg = log_page($start, $per_page);

	  /* --------------- Configuracoes ---------------- */
	  $count = log_count();

	  $msg = page_config($msg,$count,$per_page,$cur_page,$first_btn,$previous_btn,$next_btn,$last_btn);

	  echo $msg;
   }
?>

