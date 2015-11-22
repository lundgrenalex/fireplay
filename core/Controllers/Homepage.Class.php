<?php

namespace Controllers;

use \Storage\Log as Log;
use \Storage\Pages as Pages;
use \Views;

class Homepage {

	static function init () {
		
		$exports = [
			'document' => \Models\Pages::get('wellcome', 60*60*2);
		];

		Views::get('homepage', $exports);
		
	}

}