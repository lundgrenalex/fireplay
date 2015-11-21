<?php

// Bootstrap
define('ROOT', __DIR__);
require_once ROOT . '/bootstrap/Autoloader.Class.php';
Autoloader::init();

// Save sessions to Redis Cache
$sessHandler = new \Storage\Sessions();
session_set_save_handler($sessHandler);
session_start();

// Routing section
Router::get('/', function () {
	echo 'Main Page';
});

Router::get('/{id}', function ($id) {
	echo $id;
});

Router::get('/user/{id}/medias/{type}', function ($id, $type) {
	echo $id, ' ', $type;
});

// Init Router
Router::init(function () {
	// Pass broken routes to root path 
	header('Location: /');
});