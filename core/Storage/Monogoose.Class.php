<?php

namespace Storage;

class Monogoose {
	
	private static $storage;

	static function init () {

		if (!self::$storage) {
			self::$storage = new \MongoClient("mongodb://mongodb:27017/");
		}

		return self::$storage;

	}

}