<?php

namespace Storage;

class Cache extends \Redis {

	private static $storage;

	static function init () {

		if (!self::$storage) {
			self::$storage = new self();
			Log::debug(serialize(self::$storage));
		}

		return self::$storage;

	}

}