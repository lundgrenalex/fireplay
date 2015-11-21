<?php

class Router {

    private static $methods = [
        'get', 'put', 'post', 'delete', 'head', 'options'
    ];

    static function __callStatic ($method, $arguments) {
    
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $path = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
        
        if (array_search($method, self::$methods) === false) {
            return false;
        }
        
        echo $method, json_encode($arguments);    
        
    }

}

