<?php
   /******** Zend ********/
   //ini_set('include_path',ini_get('include_path').':../includes:');
   /* NOTE: para o Zend funcionar é necessario incluir a biblioteca do zend no include_path do PHP
   * adicionar ao ficheiro httpd.conf: php_value include_path .:opt/lampp/lib/php:/usr/local/lib/php:/usr/local/lib/zend/library
   */

   basename(getcwd()) == 'PED-Project'?require_once ('ini.php'):require_once ('../ini.php');
   require_once('Zend/Search/Lucene.php');

   /** Obtem o indice que se encontra no $indexPath **/
   function getIndex($ixP) {
	  //global $indexPath;
	  if(is_dir($ixP) == 1) {
		 // Abre indice existente
		 $index = Zend_Search_Lucene::open($ixP);
	  }   
	  else {
		 // Cria um novo indice
		 $index = Zend_Search_Lucene::create($ixP);
	  }   
	  return $index;
   } 

   /** Cria um novo indice com todos os projetos da BD  **/
   function loadIndex($ixP) {
	  //if(is_dir($ixP) !== 1) system("rm -rf $ixP");
	  $index = Zend_Search_Lucene::create($ixP);

	  // funcao que recolhe os dados da Base de Dados
	  $documents = GetAllDocuments();

	  // Adiciona cada documento ao indice
	  foreach ($documents as $document) {
		 $index->addDocument($document);
	  }   

	  // Optimiza o indice (Automatic index optimization is performed to keep indexes in a consistent state. Automatic optimization is an iterative process managed by several index options. It merges very small segments into larger ones, then merges these larger segments into even larger segments and so on.)
	  $index->optimize();

	  // Escreve o indice no disco
	  $index->commit();

	  return $index;
   }

   /** Atualiza o indice com um novo documento **/
   function updateIndexNew($ixP, $projcode) {
	  $index = getIndex($ixP);
	  $doc = GetDocument($projcode);
	  if($doc!=null) {
		 $index->addDocument($doc);
		 $index->commit();
	  }
   }

   /** Atualiza um documento do indice 
   * NOTA: The Lucene index file format doesn't support document updating. Documents should be removed and re-added to the index to effectively update them.
   **/
   function updateIndexOld($ixP, $projcode) {
	  $index = DeleteDocumentFromIndex($projcode, $ixP);
	  $doc = GetDocument($projcode);
	  if($doc!=null){
		 $index->addDocument($doc);
		 $index->commit();
	  }
   }

   /** Devolve um documento existente no indice com base num projeto da BD **/
   function DeleteDocumentFromIndex($projcode, $ixP) {
	  $index = getIndex($ixP);
	  // find the document based on the indexed projcode field
	  $term = new Zend_Search_Lucene_Index_Term($projcode, 'projcode');
	  $query = new Zend_Search_Lucene_Search_Query_Term($term);
	  $hits  = $index->find($query);
	  foreach ($hits as $hit)
	  $index->delete($hit->id);
	  return $index;
   }

   /** Devolve um novo documento com base num projeto da BD  **/
   function GetDocument($projcode) {
	  global $con;
	  $doc = null;

	  if (!$con) {
		 echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
	  } else {
		 $sql = "SELECT projcode, keyname, title, subtitle, subdate, private FROM Project WHERE projcode=$projcode and remove=0 ORDER BY subdate";
		 $res = mysql_query($sql, $con);
		 while ($reg = mysql_fetch_array($res)) {
			$doc = createDoc($reg);
		 }
	  }
	  return $doc;
   }

   ///** Devolve os documentos correspondentes a todos os projetos nao removidos e publicos da BD  **/
   function GetAllDocuments(){
	  global $con;
	  $array = array();

	  if (!$con) {
		 echo "<h3>Erro ao ligar ao servidor.</h3><br/>" . mysql_error();
	  } else {
		 $sql = "SELECT projcode, keyname, title, subtitle, subdate, private FROM Project WHERE remove=0 ORDER BY subdate";
		 $res = mysql_query($sql, $con);
		 while ($reg = mysql_fetch_array($res)) {
			$doc = createDoc($reg); 
			array_push($array, $doc);
		 }
		 return $array;
	  }
   }

   /** Cria um novo documento com base num projeto **/
   function createDoc($reg) {
	  global $con;
	  $doc = new Zend_Search_Lucene_Document();

	  $projcode = $reg['projcode'];

	  $doc->addField(Zend_Search_Lucene_Field::Keyword('projcode', $projcode, 'iso-8859-1'));
	  $doc->addField(Zend_Search_Lucene_Field::Keyword('keyname',$reg['keyname'], 'iso-8859-1'));
	  //$doc->addField(Zend_Search_Lucene_Field::UnIndexed('subdate',$reg['subdate'], 'iso-8859-1'));
	  $doc->addField(Zend_Search_Lucene_Field::Keyword('privat',$reg['private'], 'iso-8859-1'));
	  $doc->addField(Zend_Search_Lucene_Field::Text('title',$reg['title'], 'iso-8859-1'));
	  $doc->addField(Zend_Search_Lucene_Field::UnStored('subtitle',$reg['subtitle'], 'iso-8859-1'));

	  $sql = "SELECT A.authorcode, name, id  FROM ProjAut AS PA, Author AS A WHERE PA.projcode = $projcode and PA.authorcode=A.authorcode";
	  $res2 = mysql_query($sql, $con);
	  $ac="";$a="";$ai="";
	  while ($reg2 = mysql_fetch_array($res2)) {
		 $ac .= $reg2['authorcode'].",";
		 $a .= $reg2['name'].",";
		 $ai .= $reg2['id'].",";
	  }

	  $doc->addField(Zend_Search_Lucene_Field::UnStored('authorcode',substr($ac, 0, (strLen($ac) - 1))));
	  $doc->addField(Zend_Search_Lucene_Field::Text('author',substr($a, 0, (strLen($a) - 1)), 'iso-8859-1'));
	  $doc->addField(Zend_Search_Lucene_Field::Text('authorid',substr($ai, 0, (strLen($ai) - 1)), 'iso-8859-1'));

	  $sql = "SELECT keyword FROM ProjKW AS PK, KeyWord AS K WHERE PK.projcode = $projcode and PK.kwcode=K.kwcode";
	  $res3 = mysql_query($sql, $con);
	  $kw="";
	  while ($reg3 = mysql_fetch_array($res3)) {
		 $kw .= $reg3['keyword'].",";
	  }
	  $doc->addField(Zend_Search_Lucene_Field::UnStored('keywords',substr($kw, 0, (strLen($kw) - 1)), 'iso-8859-1'));

	  $sql = "SELECT username FROM Deposits WHERE projcode = $projcode";
	  $res4 = mysql_query($sql, $con);
	  while ($reg4 = mysql_fetch_array($res4)) {
		 $doc->addField(Zend_Search_Lucene_Field::UnStored('username',$reg4['username']));
	  }

	  return $doc;
   }
?>
