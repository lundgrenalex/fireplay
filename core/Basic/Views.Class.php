<?php

use \Storage\Log as Log;

class Views {
	
	static function get ($name, array $exports = []) {

		$dst = ROOT . '/resources/views/' . str_replace('.', '/', $name) . '.php';
		if (!file_exists($dst)) {
			$message = 'Template ' . $dst . ' not exists';
			Log::error($message);
			throw new \Exception($message, 1);
		}

		extract($exports);
		
		include_once $dst;

	}

}