<?php

// Bootstrap
define('ROOT', __DIR__.'/..');
require_once ROOT . '/bootstrap/Autoloader.Class.php';
Autoloader::init();

// Init Logging
\Storage\Log::$dst = ROOT . '/logs/application.log';

// Save sessions to Redis Cache
$sessHandler = new \Storage\Sessions();
session_set_save_handler($sessHandler);
session_start();

// Routing section
// As Controller
Router::get('/', '\Controllers\Homepage::init');

// As callback Function
Router::post('/{id}', function ($id) {
	return Response::json(['userid' => $id]);
});

// Set default route & init Router
Router::init(function () {
	// Pass broken routes to root path 
	\Storage\Log::error('Route not found');
	header('Location: /');
});