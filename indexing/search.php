<?php
   $dir = "indexing/";
   if (basename(getcwd()) != 'PED-Project') $dir = "../indexing/";
?>

<div id="login">
   <form method="POST" action="<?= $dir ?>search2.php">
	  <input type="text" name="query" value="<?php if(isset($_POST['query'])) echo $_POST['query']; ?>"/>
	  <input type="submit" value="Search" />
   </form>
</div>
