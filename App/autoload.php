<?php

function autoloadClasses($class){
	$class = str_replace("\\" , "/" , __DIR__) . "/" . str_replace("\\" , "/" , $class) . ".php";
	if(file_exists($class)){
		require_once($class);
	}
}
spl_autoload_register("autoloadClasses");



