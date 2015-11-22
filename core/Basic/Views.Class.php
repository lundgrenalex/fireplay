<?php

use \Storage\Log as Log;

class Views {
	
	static function get ($name) {

		$dst = ROOT . '/resources/views/' . str_replace('.', '/', $name) . '.php';
		if (!file_exists($dst)) {
			$message = 'Template ' . $dst . ' not exists';
			Log::error($message);
			throw new \Exception($message, 1);
		}

		include_once $dst;

	}

}