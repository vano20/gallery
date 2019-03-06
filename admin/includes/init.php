<?php 



/**
*  absolute path = dir path
**/
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR); //dir separator, win = \, unix = /
defined('SITE_ROOT') ? null : define('SITE_ROOT', 'F:' . DS . 'xampp' . DS . 'htdocs' . DS . 'gallery'); //absolute path of site root
defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes'); //includes file path

//required classes
require_once("includes/functions.php");
require_once("includes/config_db.php"); //database constant
require_once("includes/database.php"); //database connection
require_once("includes/db_object.php"); //database connection
require_once("includes/user.php"); //user pdo
require_once("includes/photo.php"); //photo pdo
require_once("includes/session.php"); //user pdo



?>