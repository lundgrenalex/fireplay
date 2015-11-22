<?php

namespace Models;

use \Storage\Cache as Cache;

class Pages {

	private static $parser;

	static function get ($name, $ttl) {

		// Init Mardown Parser
		if (!self::$parser) {
			self::$parser = new \Markdown();
		}

		// Get document from Cache
		$document = Cache::init()->get('Pages::'.$name);
		if (empty($document)) {
			// Load document from Storage
			$document = file_get_contents(ROOT.'/resources/pages/'.$name.'.md');
			// and push it to Cache with expire date & set expire
			Cache::init()->set('Pages::'.$name, $document);
			Cache::init()->expireAt('Pages::'.$name, time() + $ttl);
		}

		// Translate markdown to html
		return self::$parser->text($document);

	}

}