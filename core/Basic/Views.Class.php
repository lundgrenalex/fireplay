<?php

/**
 * Standard views loader with export varibles
 * @author 	Alex Lundgren
 * @copyright Copyright (c) 2005-2015 Alex Lundgren
 * @license http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

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