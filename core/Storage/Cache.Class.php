<?php

namespace Storage;

class Cache {

	private static $storage;

	static function init () {

		if (!self::$storage) {
			self::$storage = new \Redis();
		}

		return self::$storage;

	}

}