<?php

// Bootstrap
define('ROOT', __DIR__.'/../');
require_once ROOT . '/bootstrap/Autoloader.Class.php';
Autoloader::init();

// Init Logging
\Storage\Log::$dst = ROOT . '/logs/jobs.log';
