<?php

namespace Core\Utils\Mocky;

abstract class Mockable {

    /**
     * ref to data container
     */
    private MockySet $_data;

    public function __construct() {
        $this->_data = new MockySet();
    }

    public function set($key, $value) {
        $this->_data->set($key, $value);
    }

    public abstract function mock();

    public function data() {
        return $this->_data;
    }
}