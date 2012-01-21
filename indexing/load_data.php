<?php
   if(!isset($_SESSION)) session_start();
   require_once '../ini.php';
   require_once '../indexing/functions.php';
   require_once('../pagination/pagination_config.php');
   require_once('Zend/Search/Lucene.php');
   require_once('Zend/Paginator.php');
   require_once('Zend/Cache.php');

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


	  /* -------------------------------------------------------------------------------------------------------------------------- */
	  /* --------------------------------------------------- Dados ---------------------------------------------------------------- */
	  /* -------------------------------------------------------------------------------------------------------------------------- */
	  $query = (isset($_SESSION['query']))?$_SESSION['query']:"";
	  $msg="";

	  // Se a query nao contiver nada, nao executa nada
	  if (strlen($query) > 0) {
		 // Definicao dos estagios inicial e final do processo de caching, respetivamente $frontendOptions e $backendOptions
		 $frontendOptions = array(
			'lifetime' => 10, // a cache expirará em lifetime segundos| vitalicia se NULL
			'automatic_serialization' => true // permite a serialização de objetos, arrays, variaveis, etc...
		 );
		 $backendOptions = array('cache_dir' => '../tmp/'); // a cache sera guardada numa pasta tmp
		 // Inicializa a instancia que ira armazenar a informacao
		 $cache = Zend_Cache::factory('Core', 'File', $frontendOptions, $backendOptions);
		 // Atribui-se um id à query para que esta seja identificada univocamente
		 $id = md5('myQuery_' . $query);

		 if(!($hits = $cache->load($id))) { // Se nao existir uma cache com aquele $id executa a query e guarda o resultado em cache
		 try {
			$index = getIndex($indexPath);
			if (isset($_SESSION['type']) && $_SESSION['type']=='a') // Administrador
			$hits = $index->find($query); // aqui serao encontrados todos os projetos publicos e privados
			elseif (isset($_SESSION['type']) && $_SESSION['type']=='p') // Produtor
			$hits = $index->find("+".$query." +(privat:0 (+privat:1 +username:".$_SESSION['username']."))"); // aqui tem que so serao encontrados os projetos publicos (private==0) e o os privados cujo produtor seja o utilizador "logado"
			else // Outros
			$hits = $index->find("+".$query." +privat:0"); // aqui tem que so serao encontrados os publicos (private==0)
		 }
		 catch (Zend_Search_Lucene_Exception $ex) {
			$hits = array();
		 }
		 // Se nenhum resultado foi encontrado, nada é guardado na cache
		 if (count($hits)) {
			// Converte resultado da query para stdClass para que seja permitido fazer caching (solucao encontrada para contornar problema de __PHP_Incomplete_Class aquando da operacao de unserialize())
			foreach ($hits as $i => $hit) {
			   $hits2[$i] = new stdClass();
			   $doc = $hit->getDocument();
			   foreach($doc->getFieldNames() as $field){
				  $hits2[$i]->{$field} = $hit->{$field};
			   }
			}
			// Adiciona o objeto (resultados) à cache
			$cache->save($hits2);
		 }
	  }
	  $count = count($hits);
	  $msg .= "<h3>Encontrados $count resultados para a pesquisa \"$query\".</h3></br>";
	  if($count){ // Se nenhum resultado foi encontrado, nada é imprimido
		 /* Zend_Paginator is a flexible component for paginating collections of data and presenting that data to users. */
		 // Inicaliza instancia 
		 $paginator = Zend_Paginator::factory($hits);
		 // Definine o numero da pagina que se pretende listar
		 $paginator->setCurrentPagenumber($cur_page);
		 // Define o numero de item a mostrar por pagina
		 $paginator->setItemCountPerPage($per_page);

		 foreach ($paginator as $hit) { // percorre os resultados da pagina $cur_page
		 $msg .= "<h3>Projeto:<a href=\"../gerirU/gerirS_Show.php?projcode=".$hit->projcode."\">" . $hit->projcode . "</a> -> ".$hit->keyname."</h3>";
		 $msg .= "<p>Título: ".($hit->title)."</p>";
		 $msg .= "<p>Autor: ".utf8_decode($hit->author)."</p></br>";
	  }
   }

   /* -------------------------------------------------------------------------------------------------------------------------- */
   /* --------------------------------------------------- Configuration -------------------------------------------------------- */
   /* -------------------------------------------------------------------------------------------------------------------------- */
   $msg = page_config($msg,$count,$per_page,$cur_page,$first_btn,$previous_btn,$next_btn,$last_btn);
}
echo $msg;
   }
?>
