<?php

namespace Core\Application;

class ServiceHolder {

    private $_context;

    /**
     * class to instantiate.
     */
    private $_class;
    /**
     * holds ref to instance
     */
    private $_instance;

    public function __construct($context, $class) {
        $this->_context = $context;
        $this->_class   = $class;
    }

    private function createInstance() {
        $this->_instance = new $this->_class;
        $this->_instance->setContext($this->_context);
        return $this->_instance;
    }

    public function instance() {
        return is_null($this->_instance) ? $this->createInstance() : $this->_instance;
    }
};
class BasicContext implements ServiceProvider {


    protected $_services;

    public static $serviceInitialInstance = null;

    public function __construct() {
        $this->_services = [];
    }

    public function getService($name): ?Service {
        if (array_key_exists($name, $this->_services))
            return $this->_services[$name]->instance();

        return null;
    }

    public function register($name, $class): ServiceProvider {
        $this->_services[$name] = $this->createService($this, $class);
        return $this;
    }

    public function registerAll($services): ServerContext {
        foreach ($services as $name => $class)
            $this->register($name, $class);

        return $this;
    }


    private function createService($context, $class) {
        if (!is_subclass_of($class, Service::class))
            throw new \InvalidArgumentException("$class is not a Service.");

        return new ServiceHolder($context, $class);
    }

}