<?php

namespace Controllers;

use \Storage\Log as Log;
use \Storage\Pages as Pages;

class Homepage {
		
	static function init () {
		$document = \Models\Pages::get('wellcome', 60*60*2);
		Views::get('homepage');
	}

}