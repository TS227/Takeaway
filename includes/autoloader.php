<?php
    function autoload($class){
        if(file_exists(__DIR__ . '/../classes/' .strtolower($class).'.class.php')){
            require_once(__DIR__ . '/../classes/' .strtolower($class).'.class.php');
        }
    }
    spl_autoload_register('autoload');
?>