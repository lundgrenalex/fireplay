<?php

require_once __DIR__ . '/core/Router.Class.php';

Router::get('/', 'action');
Router::get('/{id}', 'action');
Router::get('/{id}/medias', 'action');
Router::init();