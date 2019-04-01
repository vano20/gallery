<?php



/**
*  absolute path = dir path
**/
//dir separator, win = \, unix = /
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//absolute path of site root for Win
// defined('SITE_ROOT') ? null : define('SITE_ROOT', 'E:' . DS . 'xampp' . DS . 'htdocs' . DS . 'gallery');

//absolute path of site root
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'var' . DS . 'www' . DS . 'html' . DS . 'gallery');

//includes file path
// defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');
defined('INC_PATH') ? null : define('INC_PATH', __DIR__);

//required classes
require_once(INC_PATH.DS."functions.php");
require_once(INC_PATH.DS."config_db.php"); //database constant
require_once(INC_PATH.DS."database.php"); //database connection
require_once(INC_PATH.DS."db_object.php"); //database connection
require_once(INC_PATH.DS."user.php"); //user pdo
require_once(INC_PATH.DS."photo.php"); //photo pdo
require_once(INC_PATH.DS."session.php"); //user pdo
require_once(INC_PATH.DS."comment.php"); //user pdo



?>
