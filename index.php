<?php 
  define('WWW_ROOT',dirname(__FILE__));
  define('DS',DIRECTORY_SEPARATOR);
 
   ini_set('error_reporting', E_ALL);
  
  $config= WWW_ROOT.'/app/config/main.php';
  
  require_once ($config);
   
  require_once (WWW_ROOT.'/core/KandaFramework.php');