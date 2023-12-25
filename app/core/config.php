<?php

// echo "<pre>";
// print_r($_SERVER);

/**
 * app info
 */
define('APP_NAME','Udemy App');
define('APP_DESC','Free and Paid Tutorials');

/**
 * database config
 */

 if($_SERVER['SERVER_NAME']=="localhost")
 {
    // database config for local server
    define('DBHOST','localhost');
    define('DBNAME','udemy_db');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');
    
 }
 else{
    // database config for live server.
    define('DBHOST','localhost');
    define('DBNAME','udemy_db');
    define('DBUSER','root');
    define('DBPASS','');
    define('DBDRIVER','mysql');
 }