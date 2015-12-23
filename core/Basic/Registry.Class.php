<?php

/**
 * Registry for sharing global resources
 * @author  Alex Lundgren
 * @copyright Copyright (c) 2005-2015 Alex Lundgren
 * @license http://www.gnu.org/licenses/gpl-3.0.en.html GPL v3
 */

class Registry {

    use Singleton;

    private $container = [];

    public function set ($key, $value, $reload = false) {

        if (array_key_exists($key, $this->container) && !$overload) {
            throw new Exception("Key $key already exists in Registry. Please use reload option.");
        }

        $this->container[$key] = $value; 

    }

    public function get ($key) {

        if (!array_key_exists($key, $this->container)) {
            throw new Exception("Key $key not found in Registry");
        }

        return $this->container[$key];

    }

}