<?php

/**
 * Security Tools
 * @author  Alex Lundgren
 * @copyright Copyright (c) 2005-2015 Alex Lundgren
 * @license http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

use \Storage\Cache as Cache;

class Security () {
	
	private static $characters = ' !"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|}~';

	static function token () {

		if (!isset($_SESSION['security']['token'])) {
			$string = str_shuffle(self::$characters);
			$_SESSION['security']['token'] = crypt($string, CRYPT_SHA512);
		}

		return $_SESSION['security']['token'];

	}

}