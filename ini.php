<?php

   $con = mysql_connect("localhost", "miguel", "miguel");
   mysql_select_db("PED", $con);

   /**
   * Este tipo de ligação é necessário para se coneguir realizar transações
   */
   $link = mysqli_connect("localhost", "miguel", "miguel", "PED");


   /* * ****************
   * MINHAS FUNÇÕES *
   * **************** */

   function go_back() {
	  echo "<span class=\"go_back\"><A HREF=\"javascript:javascript:history.go(-1)\">Voltar</A></span>";
   }

   function log_exists(){
	  if (!file_exists("logs.xml")) {
		 $fh = fopen("logs.xml", 'w') or die("can't open file");
		 fwrite($fh, "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?><logs></logs>");
		 fclose($fh);
	  }
   }

   function log_insert($username, $name, $date, $action, $description) {
	  //log_exists();
	  $logs = simplexml_load_file("logs.xml");

	  $log = $logs->addChild('log');
	  $log->addChild('username', $username);
	  $log->addChild('name', $nme);
	  $log->addChild('date', $date);
	  $log->addChild('action', $action);
	  $log->addChild('description', $description);

	  $logs->asXML("logs.xml");
   }

   function log_list($eu, $limit) {
	  //log_exists();

	  $logs = simplexml_load_file("logs.xml");
	  $str= "{ \"data\" : [";
	  for ($i=0; $i<$eu+$limit and $logs->log[$i]!=null; $i++){
		if ($i>=$eu) {
			 $log = $logs->log[$i];
			 $str=$str."{\"username\" : \"$log->username\", \"name\" : \"$log->name\", \"date\" : \"$log->date\", \"action\" : \"$log->action\", \"description\" : \"$log->description\"},";
		  }
	  }
	  $str=substr($str,0,(strLen($str)-1));
	  return $str;
   }

   function log_count() {
	  //log_exists();
	  return simplexml_load_file("logs.xml")->count();
   }
?>