<?php

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