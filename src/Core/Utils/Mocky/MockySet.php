<?php

namespace Core\Utils\Mocky;

class MockySet {
    private $map;
    public function __construct() {
        $this->map = [];
    }

    public function get($key) {
        if (array_key_exists($key, $this->map))
            return $this->map[$key];
        
        return null;
    }

    public function set($key, $value) {
        $this->map[$key] = $value;
    }
}