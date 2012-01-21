<?php
   require_once('Zend/Cache.php');
   require_once('../ini.php');

   session_start();
   session_destroy();

   // Definicao do estagio final do processo de caching, $backendOptions
   $backendOptions = array('cache_dir' => '../tmp/'); // a cache sera guardada numa pasta tmp
   // Inicializa a instancia cache
   $cache = Zend_Cache::factory('Core', 'File', array(), $backendOptions);

   // Limpa todos os registos de cache
   $cache->clean(Zend_Cache::CLEANING_MODE_ALL);

   header("Location: ../home.php");
?>
