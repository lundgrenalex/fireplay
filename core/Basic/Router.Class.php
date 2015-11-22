<?php

/**
 * Simple and Fast Router with REST influence
 * @author  Alex Lundgren
 * @copyright Copyright (c) 2005-2015 Alex Lundgren
 * @license http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

class Router {

    // Register Request Types
    private static $methods = [
        'get', 'put', 'post', 'delete', 'head', 'options'
    ];

    // Define Container for Routes
    private static $routes = [];

    // Path Handler
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

    static function init ($default_route_callback) {

        foreach (self::$routes as $route) {
            $export_vars = self::is_desired_path($route['path']);
            if ($export_vars === false) continue;
            call_user_func_array($route['action'], $export_vars);
            return true;
        }

        if (is_callable($default_route_callback)) {
            return call_user_func($default_route_callback);
        }

        header("HTTP/1.0 404 Not Found");
        echo 'Route not found';

    }

    private function __construct () {}
    private function __clone () {} 

}

