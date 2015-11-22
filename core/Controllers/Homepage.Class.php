<?php

namespace Controllers;

use \Storage\Log as Log;
use \Storage\Pages as Pages;

class Homepage {
		
	static function init () {
		echo \Models\Pages::get('wellcome', 60*60*2);
	}

}