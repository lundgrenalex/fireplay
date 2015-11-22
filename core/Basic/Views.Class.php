<?php

class Views {
	
	static function get ($name) {

		use '\';

		$dst = ROOT . '/resources/views/' . str_replace('.', '/', $name) . '.php';
		if (!file_exists($dst)) {
			throw new \Exception('Template ' . $dst . ' not exists', 1);
		}

		include_once $dst;

	}

}