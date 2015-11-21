<?php

require_once __DIR__ . '/core/Router.Class.php';

Router::get('/', function () {
	echo 'Main Page';
});

Router::get('/{id}', function ($id) {
	echo $id;
});

Router::get('/user/{id}/medias/{type}', function ($id, $type) {
	echo $id, $type;
});

// Init Router
Router::init(function () {
	// Pass broken routes to root path 
	header('Location: /');
});