<?php

/**
 * MongoDB Connector
 * @author  Alex Lundgren
 * @copyright Copyright (c) 2005-2015 Alex Lundgren
 * @license http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

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