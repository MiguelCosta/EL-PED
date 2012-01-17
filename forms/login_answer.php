<?php

   session_start();

   require_once '../ini.php';
   $username = $_REQUEST["username"];
   $password = $_REQUEST["password"];

   $sql = "SELECT username, name, password, type FROM Users WHERE username='$username'";
   $query = mysql_query($sql, $con) or die(mysql_error());

   $numRows = mysql_num_rows($query);

   if ($numRows != 0) {
	  while ($row = mysql_fetch_assoc($query)) {
		 $dbusername = $row['username'];
		 $dbname = $row['name'];
		 $dbpassword = $row['password'];
		 $dbtype = $row['type'];
	  }

	  if ($username == $dbpassword && $password == $dbpassword) {
		 $_SESSION['username'] = $dbusername;
		 $_SESSION['name'] = $dbname;
		 $_SESSION['type'] = $dbtype;

		 // Atualiza os acessos na BD
		 $sql = "INSERT INTO Access(username, datahora) VALUES ('$dbusername', NOW())";
		 mysql_query($sql) or die('Erro:' . mysql_error());

		 // Insercao no registo de logs
		 log_insert($_SESSION['username'], $_SESSION['name'], agora(), $log_msg["login"]["act"], $log_msg["login"]["desc"]." $dbusername");
	  }
	  else
	  echo "<script type=\"text/javascript\">alert(\"Password incorrecta!\");</script>";
   }
   else {
	  echo "<script type=\"text/javascript\">alert(\"Esse utilizador não existe!\");</script>";
	  // @TODO: nao sei se isto teria outra forma de ser feito
   }
   header("Location: ../home.php");
?>
