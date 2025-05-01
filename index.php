<?php
error_reporting(E_ALL & -E_NOTICE);
ini_set('display_errors', 'On');
session_start();

// Validate and sanitize page parameter
$allowed_pages = ['home', 'about', 'contact', 'menu', 'order']; // Add your valid pages here
$page = isset($_GET['p']) ? $_GET['p'] : 'home';
$page = in_array($page, $allowed_pages) ? $page : 'home';

require_once "includes/autoloader.php";
require_once "includes/database.php";
require_once "includes/header.php";
require_once "pages/$page.php";
require_once "includes/footer.php";
?>