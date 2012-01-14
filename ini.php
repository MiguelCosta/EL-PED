<?php

   $con = mysql_connect("localhost", "miguel", "miguel");
   mysql_select_db("PED", $con);

   /**
   * Este tipo de ligação é necessário para se coneguir realizar transações
   */
   $link = mysqli_connect("localhost", "miguel", "miguel", "PED");


   /* * ****************
   * CONSTANTES *
   * **************** */


   // Pacotes de informacao


   // Megaprocessos
   $adm = "Administracao";

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

   // Hash que contem todas as accoes e respectivas descricoes que podem ser escritas no log
   $log_msg = array("ins_uti" => array("act" => "$adm:$ins:$uti", "desc" => "$ins de um $uti"), "lis_uti" => array("act" => "$adm:$lis:$uti", "desc" => "$lis de um $uti"), "alt_uti" => array("act" => "$adm:$alt:$uti", "desc" => "$alt de um $uti"), "rem_uti" => array("act" => "$adm:$rem:$uti", "desc" => "$rem de um $uti"));//TODO:acabar

   // Pacotes de informacao
   //define("SIP", "SIP");
   //define("AIP", "AIP");
   //define("DIP", "DIP");

   // Megaprocessos
   //define("ING", "Ingestao");
   //define("ADM", "Administracao");
   //define("DIS", "Disseminacao");



   /* * ****************
   * MINHAS FUNÇÕES *
   * **************** */

   function go_back() {
	  echo "<span class=\"go_back\"><A HREF=\"javascript:javascript:history.go(-1)\">Voltar</A></span>";
   }

   function agora() {
	 date_default_timezone_set("Europe/Lisbon");
	 return date("Y-m-d\TH:i:s");
   }

   function log_exists($l){
	  if (!file_exists($l)) {
		 $fh = fopen($l, 'w') or die("can't open file");
		 fwrite($fh, "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?><logs></logs>");
		 fclose($fh);
	  }
   }

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

   function log_list($eu, $limit) {
	  log_exists("logs.xml");

	  $logs = simplexml_load_file("logs.xml");
	  $str= "{ \"data\" : [";
	  for ($i=0; $i<$eu+$limit and $logs->log[$i]!=null; $i++){
		 if ($i>=$eu) {
			$log = $logs->log[$i];
			$str=$str."{\"username\" : \"$log->username\", \"name\" : \"$log->name\", \"date\" : \"$log->date\", \"action\" : \"$log->action\", \"description\" : \"$log->description\"},";
		 }
	  }
	  if (log_count() != 0) 
	  $str=substr($str,0,(strLen($str)-1));
	  return $str;
   }

   function log_count() {
	  log_exists("logs.xml");
	  return simplexml_load_file("logs.xml")->count();
   }
?>
