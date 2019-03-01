<?php 

function __autoload($class) {

	$class = strtolower($class);

	$path = "includes/{$class}.php";

	file_exists($pathsss) ? require_once($path) : die("{$class}.php not found !");
}


?>