<?php

/**
 * Standard views loader with export varibles, support caching
 * @author 	Alex Lundgren
 * @copyright Copyright (c) 2005-2015 Alex Lundgren
 * @license http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

use \Storage\Log as Log;
use \Storage\Cache as Cache;

class Views {

	static $ttl = 120;

	static function get ($dst, $exports = []) {
		
		$template_name = $dst;
		$cache_name = 'teplates::'.$template_name;
		$dst = ROOT.'resources/views/'.str_replace('.','/',$dst).'.php';

		if (!file_exists($dst)) {
			Log::error('Template '.$dst.' not found');
			return false;	
		}

		$template = Cache::init()->get($cache_name);
		if (empty($template)) {
			Log::info('Template '.$template_name.' cached');
			$template = file_get_contents($dst);
			Cache::init()->set($cache_name, $template);
			Cache::init()->expireAt($cache_name, time()+self::$ttl);
		} else {
			Log::info('Template '.$template_name.' get from cache');
		}

		extract($exports);
		eval("?> $template");

	}

}
