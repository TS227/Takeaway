<?php
  $page = $_GET['p'];
  if(!$page){
    $page = "home";
  }
  session_start();
  require_once('includes/autoloader.php');
  require_once('includes/database.php');
  require_once('includes/header.php');
  require_once('pages/'.$page.'.php');
  require_once('includes/footer.php');
  error_reporting(E_ALL & -E_NOTICE);
  ini_set('display_errors','On');
  ?>