<?php

   /**
   * Passar uma submissão para a linha da tabela de listagem
   * @param type $titulo
   * @param type $res 
   */
   function submission_to_table($titulo, $res) {
	  $msg = "<h3 class=\"user\">" . utf8_decode($titulo) . "</h3>";
	  $msg .= "<div id=\"containt_main_users_column_label\">";
		 $msg .= "<table class=\"user\">";
			$msg .= "<tr><th class=\"user\">Code</th><th class=\"user\">Keyname</th><th class=\"user\">Title</th><th class=\"user\">Submission Date</th><th class=\"user\">Authors</th><th class=\"user\">Supervisors</th></tr>";

			while ($reg = mysql_fetch_array($res)) {
			   $id = $reg["projcode"];
			   $msg .= "<td class=\"user\"><a href=\"gerirS_Show.php?projcode=$id\">" . $id . "</a></td>";
			   $msg .= "<td class=\"user\">" . $reg["keyname"] . "</td>";
			   $msg .= "<td class=\"user\">" . $reg["title"] . "</td>";
			   $msg .= "<td class=\"user\">" . $reg["subdate"] . "</td>";

			   $sql = "SELECT authorcode, name FROM Author WHERE authorcode IN (SELECT authorcode FROM ProjAut WHERE projcode='$id')";
			   $result = mysql_query($sql);
			   $autores = "";
			   $msg .= "<ul>";
				  while ($rows = mysql_fetch_array($result)) {
					 $autores .= "<li><a href=\"gerirAS_Show_author.php?authorcode=" . $rows['authorcode'] . "\" >";
						$autores .= $rows['name'];
						$autores .= "</a></li>";
				  }
				  $msg .= "<td class=\"user\">" . $autores . "</td>";
				  $msg .= "</ul>";

			   $sql = "SELECT supcode, name FROM Supervisor WHERE supcode IN (SELECT supcode FROM ProjSup WHERE projcode='$id')";
			   $result = mysql_query($sql);
			   $supervisores = "";
			   $msg .= "<ul>";
				  while ($rows = mysql_fetch_array($result)) {
					 $supervisores .= "<li><a href=\"gerirAS_Show_supervisor.php?supcode=" . $rows['supcode'] . "&page_p=1\" >";
						$supervisores .= $rows['name'];
						$supervisores .= "</a></li>";
				  }
				  $msg .= "<td class=\"user\">" . $supervisores . "</td>";
				  $msg .= "<ul>";

					 $msg .= "</tr>";
			   }
			   $msg .= "</table>";
			$msg .= "</div>";
		 return utf8_encode($msg);
	  }
   ?>

