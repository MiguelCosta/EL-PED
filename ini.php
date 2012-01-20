<?php
   if (!isset($_SESSION)) session_start();
   require_once('Zend/Paginator.php');

   $con = mysql_connect("localhost", "miguel", "miguel");
   mysql_select_db("PED", $con);

   /**
   * Este tipo de ligação é necessário para se coneguir realizar transações
   */
   $link = mysqli_connect("localhost", "miguel", "miguel", "PED");

   // variavel que indica o caminho onde os indices do Zend_Search_Lucene estao
   basename(getcwd()) == 'PED-Project'?$indexPath = 'data/docindex':$indexPath='../data/docindex';

   /* * ****************
   * CONSTANTES *
   * **************** */
   // Listagem
   $num_proj = 10;
   $num_sup = 5;


   // Megaprocessos
   $adm = "Administracao";
   $dis = "Disseminacao";
   $ing = "Ingestao";

   // Interface de Administracao
   $ins = "Insercao";
   $alt = "Alteracao";
   $rem = "Remocao";
   $lis = "Listagem";
   $exp = "Exportacao";

   // Dados
   $uti = "Utilizador";
   $pro = "Projeto";
   $aut = "Autor";
   $sup = "Supervisor";
   $sip = "SIP";

   // Hash que contem todas as accoes e respectivas descricoes que podem ser escritas no log
   $log_msg = array("lis_uti" => array("act" => "$adm:$lis:$uti", "desc" => "Tarefa de $adm: $lis de $uti"."es"), "ins_uti" => array("act" => "$adm:$ins:$uti", "desc" => "Tarefa de $adm: $ins do $uti"), "alt_uti" => array("act" => "$adm:$alt:$uti", "desc" => "Tarefa de $adm: $alt do $uti"), "rem_uti" => array("act" => "$adm:$rem:$uti", "desc" => "Tarefa de $adm: $rem do $uti"), "lis_as" => array("act" => "$adm:$lis:$aut$sup", "desc" => "Tarefa de $adm: $lis de $aut"."es e $sup"."es"), "ins_aut" => array("act" => "$adm:$ins:$aut", "desc" => "Tarefa de $adm: $ins do $aut"), "alt_aut" => array("act" => "$adm:$alt:$aut", "desc" => "Tarefa de $adm: $alt do $aut"), "rem_aut" => array("act" => "$adm:$rem:$aut", "desc" => "Tarefa de $adm: $rem do $aut"), "ins_sup" => array("act" => "$adm:$ins:$sup", "desc" => "Tarefa de $adm: $ins do $sup"), "alt_sup" => array("act" => "$adm:$alt:$sup", "desc" => "Tarefa de $adm: $alt do $sup"), "rem_sup" => array("act" => "$adm:$rem:$sup", "desc" => "Tarefa de $adm: $rem do $sup"), "lis_aut" => array("act" => "$adm:$lis:$aut", "desc" => "Tarefa de $adm: $lis do $aut"), "lis_sup" => array("act" => "$adm:$lis:$sup", "desc" => "Tarefa de $adm: $lis do $sup"), "lis_pros" => array("act" => "$adm:$lis:$pro"."s", "desc" => "Tarefa de $adm: $lis de $pro"."s"), "lis_pro" => array("act" => "$adm:$lis:$pro", "desc" => "Tarefa de $adm: $lis do $pro"), "lis_dis_as" => array("act" => "$dis:$lis:$aut$sup", "desc" => "Tarefa de $dis: $lis de $aut"."es e $sup"."es"), "lis_dis_aut" => array("act" => "$dis:$lis:$aut", "desc" => "Tarefa de $dis: $lis do $aut"), "lis_dis_sup" => array("act" => "$dis:$lis:$sup", "desc" => "Tarefa de $dis: $lis do $sup"), "lis_dis_pros" => array("act" => "$dis:$lis:$pro"."s", "desc" => "Tarefa de $dis: $lis de $pro"."s"), "lis_dis_pro" => array("act" => "$dis:$lis:$pro", "desc" => "Tarefa de $dis: $lis do $pro"),"lis_dis_uti" => array("act" => "$dis:$lis:$uti", "desc" => "Tarefa de $dis: $lis de $uti"."es"), "login" => array("act" => "Login", "desc" => "Login no sistema pelo $uti"), "ing_sip" => array("act" => "$ing:$sip", "desc" => "Tarefa de $ing de um $sip no sistema pelo $uti"), "dis_exp" => array("act" => "$dis:$exp", "desc" => "Tarefa de $dis: $exp do projeto"), "rem_pro" => array("act" => "$adm:$rem:$pro", "desc" => "Tarefa de $adm: $rem do $pro"));


   /* * ****************
   * MINHAS FUNÇÕES *
   * **************** */

   function go_back() {
	  echo "<span class=\"go_back\"><A HREF=\"javascript:javascript:history.go(-1)\">Voltar</A></span>";
   }

   // Funcao que devolve a hora atual
   function agora() {
	  date_default_timezone_set("Europe/Lisbon");
	  return date("Y-m-d\TH:i:s");
   }

   // Ordena os logs por ordem decrescente de insercao
   function log_reverse() {
	  $doc = new DOMDocument();       // DOM xml
	  $doc->load('logs.xml');

	  $xslt = new XSLTProcessor();
	  $XSL = new DOMDocument();
	  $XSL->load('logs_sort.xsl', LIBXML_NOCDATA);
	  $xslt->importStylesheet($XSL);

	  $fh = fopen("logs_sorted.xml", 'w') or die("can't open file");
	  fwrite($fh, $xslt->transformToXML($doc));
	  fclose($fh);
   }

   // verifica se o ficheiro de logs existe no sistema de ficheiros
   function log_exists($l) {
	  if (!file_exists($l)) {
		 $fh = fopen($l, 'w') or die("can't open file");
		 fwrite($fh, "<?xml version=\"1.0\" encoding=\"UTF-8\"?><logs></logs>");
		 fclose($fh);
	  }
   }

   // insere no final do ficheiro de logs
   function log_insert($username, $name, $date, $action, $description) {
	  log_exists("../logs/logs.xml");

	  $logs = simplexml_load_file("../logs/logs.xml");
	  $log = $logs->addChild('log');
	  $log->addChild('username', utf8_decode($username)); //TODO:caracteres estranhos sao subsituidos por '?'
	  $log->addChild('name', utf8_decode($name));
	  $log->addChild('date', utf8_decode($date));
	  $log->addChild('action', utf8_decode($action));
	  $log->addChild('description', utf8_decode($description));

	  $logs->asXML("../logs/logs.xml");
   }

   /** Retorna os logs correspondentes a uma página **/
   function log_page($start, $per_page) {
	  $log_file = "../logs/logs_sorted.xml";
	  log_exists($log_file);

	  $logs = simplexml_load_file($log_file);
	  $str="<table class=\"user\"><tr class=\"user\"><th class=\"user\">Username</th><th class=\"user\">Nome</th><th class=\"user\">Data</th><th class=\"user\">Acao</th><th class=\"user\">Descricao</th></tr>";
		 for ($i = 0; $i < $start + $per_page and $logs->log[$i] != null; $i++) {
			if ($i >= $start) {
			   $log = $logs->log[$i];
			   $str .= "<tr class=\"user\"><td class=\"user\">" . $log->username . " </td><td class=\"user\">" . utf8_decode($log->name) .  " </td><td class=\"user\">" . $log->date . " </td><td class=\"user\">" . $log->action . "</td><td class=\"user\">" . $log->description . "</td></tr>";
			}
		 }
		 $str .= "</table>";
	  return $str;
   }

   // lista $limit logs comecando no nodo numero $eu
   function log_list($eu, $limit) {
	  log_exists("logs_sorted.xml");

	  $logs = simplexml_load_file("logs_sorted.xml");
	  $str = "{ \"data\" : [";
	  for ($i = 0; $i < $eu + $limit and $logs->log[$i] != null; $i++) {
		 if ($i >= $eu) {
			$log = $logs->log[$i];
			$str = $str . "{\"username\" : \"$log->username\", \"name\" : \"$log->name\", \"date\" : \"$log->date\", \"action\" : \"$log->action\", \"description\" : \"$log->description\"},";
		 }
	  }
	  if (log_count() != 0)
	  $str = substr($str, 0, (strLen($str) - 1));
	  return $str;
   }

   // conta o numero de nodos
   function log_count() {
	  $log_file = "../logs/logs_sorted.xml";
	  log_exists($log_file);

	  return simplexml_load_file($log_file)->count();
   }

   // valdiação de um xml

   function libxml_display_error($error) {
	  $return = "<br/>\n";
	  switch ($error->level) {
		 case LIBXML_ERR_WARNING:
		 $return .= "<b>Warning $error->code</b>: ";
		 break;
		 case LIBXML_ERR_ERROR:
		 $return .= "<b>Error $error->code</b>: ";
		 break;
		 case LIBXML_ERR_FATAL:
		 $return .= "<b>Fatal Error $error->code</b>: ";
		 break;
	  }
	  $return .= trim($error->message);
	  if ($error->file) {
		 $return .= " in <b>$error->file</b>";
	  }
	  $return .= " on line <b>$error->line</b>\n";

	  return $return;
   }

   function libxml_display_errors() {
	  $errors = libxml_get_errors();
	  foreach ($errors as $error) {
		 print libxml_display_error($error);
	  }
	  libxml_clear_errors();
   }

   function rrmdir($dir) {
	  if (is_dir($dir)) {
		 $objects = scandir($dir);
		 foreach ($objects as $object) {
			if ($object != "." && $object != "..") {
			   if (filetype($dir . "/" . $object) == "dir")
			   rrmdir($dir . "/" . $object); else
			   unlink($dir . "/" . $object);
			}
		 }
		 reset($objects);
		 rmdir($dir);
	  }
   }

   /** 
   * Passar um objeto para a linha da tabela de listagem
   * @param type $titulo
   * @param type $res 
   */
   function obj_to_table($type, $res) {
	  switch ($type) {
		 case '1':
		 $titulo = "Projetos"; 
		 $head = "<tr><th class=\"user\">Codigo</th><th class=\"user\">Keyname</th><th class=\"user\">Title</th></tr>";
		 $data = "";
		 while ($reg = mysql_fetch_array($res)) {
			$data .= "<tr>";
			   $data .= "<td class=\"user\"><a href=\"../gerirU/gerirS_Show.php?projcode=".$reg["projcode"]."\">" . $reg["projcode"]  . "</a></td>";
			   $data .= "<td class=\"user\">" . $reg["keyname"] . "</td>";
			   $data .= "<td class=\"user\">" . $reg["title"] . "</td>";
			   $data .= "</tr>";
		 }   
		 break;
		 case '2':
		 $titulo = "Cursos"; 
		 $head = "<tr><th class=\"user\">Codigo</th><th class=\"user\">Curso</th></tr>";
		 $data = "";
		 while ($reg = mysql_fetch_array($res)) {
			$data .= "<tr>";
			   $data .= "<td class=\"user\">" . $reg["coursecode"] . "</td>";
			   $data .= "<td class=\"user\">" . $reg["coursedescription"] . "</td>";
			   $data .= "</tr>";
		 }   
		 break;
		 case '3':
		 $titulo = "Autores"; 
		 $head = "<tr><th class=\"user\">ID</th><th class=\"user\">Name</th><th class=\"user\">Email</th></tr>";
		 $data = "";
		 while ($reg = mysql_fetch_array($res)) {
			$data .= "<tr>";
			   $data .= "<td class=\"user\"><a href=\"../gerirU/gerirAS_Show_author.php?authorcode=".$reg["authorcode"]."\">" . $reg["id"]  . "</a></td>";
			   $data .= "<td class=\"user\">" . $reg["name"] . "</td>";
			   $data .= "<td class=\"user\">" . $reg["email"] . "</td>";
			   $data .= "</tr>";
		 }
		 break;
		 case '4':
		 $titulo = "Supervisores"; 
		 $head = "<tr><th class=\"user\">Codigo</th><th class=\"user\">Name</th><th class=\"user\">Email</th></tr>";
		 $data = "";
		 while ($reg = mysql_fetch_array($res)) {
			$data .= "<tr>";
			   $data .= "<td class=\"user\"><a href=\"../gerirU/gerirAS_Show_supervisor.php?supcode=".$reg["supcode"]."&page_p=1\">" . $reg["supcode"]  . "</a></td>";
			   $data .= "<td class=\"user\">" . $reg["name"] . "</td>";
			   $data .= "<td class=\"user\">" . $reg["email"] . "</td>";
			   $data .= "</tr>";
		 }
		 break;
		 default: break;
	  }
	  echo "<h3 class=\"user\">" . $titulo . "</h3>";
	  echo "<div id=\"containt_main_users_column_label\">";
		 echo "<table class=\"user\">";
			echo $head;
			echo $data;
			echo "</table>";
		 echo "</div>";
   }
?>
