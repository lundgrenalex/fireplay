<?php

class Router {

    private static $methods = [
        'get', 'put', 'post', 'delete', 'head', 'options'
    ];

    private static is_desired_path ($path) {

        // Path type Validation
        if (!is_string($path)) {
            return false;
        }

        // Parse path
        $incoming_path = explode('/', substr($_SERVER['PATH_INFO'], 1));
        $desired_path = explode('/', substr($path, 1));

        // Path Length Validation 
        if (count($incoming_path) != count($desired_path)) {
            return false;
        }

        // Directives Validation
        foreach ($desired_path as $index => $directive) {
            
            $export_vars = [];

            if (!preg_match('/{|}/i', $directive)) {
                $directive = str_replace(['{','}'], '', $directive);
                $export_vars[$directive] = $incoming_path[$index];
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
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if (array_search($method, self::$methods) === false) {
            return false;
        }

        // Path validation
        $export_vars = self::is_desired_path($arguments['0']);
        if ($export_vars === false) {
            return false;
        }

        echo $method, json_encode($export_vars);    
        
    }

}

