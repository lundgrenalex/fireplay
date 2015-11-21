<?php

require_once __DIR__ . '/core/Router.Class.php';

Router::get('/', function () {
	echo 'Main Page';
});

Router::get('/{id}', function ($id) {
	echo $id;
});

// Init Router
Router::init(function () {
	header('Location: /');
});