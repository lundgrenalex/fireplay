<?php

class Router {

    private static $methods = [
        'get', 'put', 'post', 'delete', 'head', 'options'
    ];

    private static $routes = [];

    private static function is_desired_path ($path) {

        // Path type Validation
        if (!is_string($path)) {
            return false;
        }

        // Parse path
        $incoming_path = explode('/', substr(parse_url(@$_SERVER['REQUEST_URI'], PHP_URL_PATH), 1));
        $desired_path = explode('/', substr($path, 1));

        // Path Length Validation 
        if (count($incoming_path) != count($desired_path)) {
            return false;
        }

        // Directives Validation
        $export_vars = [];

        foreach ($desired_path as $index => $directive) {

            if (preg_match('/{|}/i', $directive)) {
                $export_vars[] = $incoming_path[$index];
                continue;
            }

            if ($directive != $incoming_path[$index]) {
                return false;
            }

        }

        return $export_vars;

    }

    static function __callStatic ($method, $arguments) {

        // Request type validation
        $method = strtolower(@$_SERVER['REQUEST_METHOD']);
        if (array_search($method, self::$methods) === false) {
            return false;
        }

        self::$routes[] = [
            'method' => $method,
            'path' => $arguments['0'],
            'action' => $arguments['1']
        ];

        
    }

    static function init () {

        foreach (self::$routes as $route) {
            $export_vars = self::is_desired_path($route['path']);
            if ($export_vars === false) continue;
            call_user_func_array($route['action'], $export_vars);
            return true;
        }

        throw new Exception('this route not registred :(');

    }

    private function __construct () {}
    private function __clone () {} 

}

