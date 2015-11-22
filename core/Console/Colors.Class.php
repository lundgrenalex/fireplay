<?php

/**
 * Colorize Cli Output
 * @author  Alex Lundgren
 * @copyright Copyright (c) 2005-2015 Alex Lundgren
 * @license http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

namespace Console;

class Colors {

    private static $colors = [
        'green' => '0;32',
        'red' => '0;31',
        'yellow' => '1;33'
    ];

    static function __callStatic ($color, $string) {
    
        $color = isset(self::$colors[$color])
            ? self::$colors[$color]
            : false;
    
        return ($color !== false)
            ? "\033[".$color."m".$string['0']."\033[0m"
            : $string['0'];
    
    }

}