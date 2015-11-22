<?php

/**
 * Cache Connector [Redis] through phpredis
 * @author  Alex Lundgren
 * @copyright Copyright (c) 2005-2015 Alex Lundgren
 * @license http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace Storage;

class Cache {

	private static $storage;

	static function init () {

		if (!self::$storage) {
			self::$storage = new \Redis();
			self::$storage->connect('127.0.0.1');
		}

		return self::$storage;

	}

}