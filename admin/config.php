<?php
session_start();
define('DB_DRIVER', 'pgsql');
define('DB_HOST', 'localhost');
define('DB_PORT','5432');
define('DB_NAME', 'gimnasio');
define('DB_USER', 'user_gym');
define('DB_PASSWORD', '123');

Class config {
    function getImageSize(){
        return 512000;
    }
    function getImageType(){
        return array('image/jpeg','image/png','image/gif');
    }
    
}