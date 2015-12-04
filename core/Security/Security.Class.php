<?php

/**
 * Security Tools
 * @author  Alex Lundgren
 * @copyright Copyright (c) 2005-2015 Alex Lundgren
 * @license http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

use \Storage\Cache as Cache;

class Security {
	
	private static $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

	static function token () {

		if (!isset($_SESSION['security']['token'])) {
			$string = str_shuffle(self::$characters);
			$_SESSION['security']['token'] = sha1($string);
		}

		return $_SESSION['security']['token'];

	}

}
