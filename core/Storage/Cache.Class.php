<?php

namespace Storage;

class Cache {

	private static $storage;

	static function init () {

		if (!self::$storage) {
			$cache = new \Redis();
			self::$storage = $cache->connect('127.0.0.1');
		}

		return self::$storage;

	}

}