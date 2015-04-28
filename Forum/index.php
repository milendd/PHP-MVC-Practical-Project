<?php

define('DX_ROOT_DIR', dirname(__FILE__) . '/');
define('DX_ROOT_PATH', basename(dirname(__FILE__)) . '/');

$request = $_SERVER['REQUEST_URI'];
$requestHome = '/' . DX_ROOT_PATH;

$controller = 'home';
$method = 'index';
$param = array();

if (!empty($request)){
	if (strpos($request, $requestHome) === 0){
		$request = substr($request, strlen($requestHome));
		
		$components = explode('/', $request, 3);
		
		if (count($components) > 1){
			list($controller, $method) = $components;
			
			if (isset($components[2])){
				$param = $components[2];
			}
		}
	}
}

var_dump($controller);
var_dump($method);
var_dump($param);