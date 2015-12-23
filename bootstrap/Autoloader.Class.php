<?php

class Autoloader {
	
	static function init () {
		spl_autoload_register('Autoloader::load');
	}

	private static function load () {

        $paths = [
            glob(ROOT . '/core/*/*.Class.php')
        ];

        foreach ($paths as $path)
            foreach ($path as $file)
                if (file_exists($file)) 
                	require_once($file);		

	}

}