<?php
define("DB_HOST", "185.114.98.6");
define("DB_NAME", "tom_recipes");
define("DB_USER", "bmx227");
define("DB_PASS", "bmx227");

try{
    $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_PERSISTENT, true);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    exit();
}

?>