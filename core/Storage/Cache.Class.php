<?php

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