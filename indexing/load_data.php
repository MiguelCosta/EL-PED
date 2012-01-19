<?php
   if(!isset($_SESSION)) session_start();
   require_once '../ini.php';
   require_once '../indexing/functions.php';
   require_once('Zend/Search/Lucene.php');
   require_once('Zend/Paginator.php');
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
	  $index = getIndex($indexPath);

	  $query = (isset($_SESSION['query']))?$_SESSION['query']:"";
	  $msg="";

	  if (strlen($query) > 0) {

		 /** TODO:Tentar armazenar o resultado da procura para reutilizar */
		 try {
			$hits = $index->find($query);
		 }
		 catch (Zend_Search_Lucene_Exception $ex) {
			$hits = array();
		 }

		 $count = count($hits);

		 $paginator = Zend_Paginator::factory($hits);
		 $paginator->setCurrentPagenumber($cur_page);
		 $paginator->setItemCountPerPage($per_page);

		 $msg .= "<h3>Encontrados $count resultados</h3></br>";
		 foreach ($paginator as $hit) {
			$msg .= "<h3>Projeto:<a href=\"../gerirU/gerirS_Show.php?projcode=".$hit->projcode."\">" . $hit->projcode . "</a> -> ".$hit->keyname."</h3>";
			$msg .= "<p>Título: ".($hit->title)."</p>";
			$msg .= "<p>Autor: ".utf8_decode($hit->author)."</p></br>";
		 }

		 /* ------------------- Configuration -------------------- */
		 $msg = page_config($msg,$count,$per_page,$cur_page,$first_btn,$previous_btn,$next_btn,$last_btn);
	  }
	  echo $msg;
   }
?>
