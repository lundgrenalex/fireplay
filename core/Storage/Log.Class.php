<?php

namespace Storage;

class Log {
	
	static $dst;

	static function __callStatic ($name, $arguments) {
		$information = date("G:i:s - M j - T Y").' : '.$name.' : '.$arguments['0'] . "\n";
		error_log($information, 3, self::$dst);
	}

	private function __construct () {}
	private function __clone () {}

}