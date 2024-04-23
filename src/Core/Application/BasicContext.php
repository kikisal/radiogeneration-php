<?php

namespace Core\Application;

class ServiceHolder {

    /**
     * Server global context
     */
    private $_context;

    /**
     * Class to instantiate.
     */
    private $_class;
    /**
     * Holds ref to instance
     */
    private $_instance;

    /**
     * Keeps track of whether this service is initialized
     */
    private $_initialized;

    public function __construct($context, $class) {
        $this->_context     = $context;
        $this->_class       = $class;
        $this->_initialized = false;
    }

    /**
     * Sets service as initialized.
     */
    public function initialized() {
        $this->_initialized = true;
        return $this;
    }

    
    /**
     * Checks service is initialized.
     */
    public function isInitialized() {
        return $this->_initialized;
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
        if (array_key_exists($name, $this->_services)) {
            $service  = $this->_services[$name]; 
            $instance = $service->instance();

            if ($instance->needsInit() && !$service->isInitialized())
                throw new \Exception("Service " . $name . " not initialized yet!");

            return $instance;
        }

        return null;
    }

    public function getServices() {
        return $this->_services;
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