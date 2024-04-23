<?php

namespace Core\Application;
use Core\Bootstrap\Bootable;
use Core\Config\ConfigManager;



class ServerContext extends BasicContext implements Bootable {
    private static $_instance = null;

    protected App $_app;

    protected $projectConfig;


    public function boot(): bool {
        if (!$this->_app)
            return false;
        
        $this->initServices();

        return $this->_app->boot();
    }

    private function initServices() {
        foreach ($this->getServices() as $service) {
            $instance = $service->instance();
            if (!is_null($instance) && $instance->needsInit())
                $instance->init();

            $service->initialized();

        }

        return $this;
    }

    public function config($key) {
        return ((object)$this->getService("config"))->value($key, null);
    }
    
    public function getApp() {
        return $this->_app;
    }

    public function useApp($app) {
        $this->_app = $app;
        $this->_app->attach($this);
        return $this;
    }

    public function setConfig($projectConfig) {
        $this->projectConfig = $projectConfig;
        return $this;
    }

    public function getConfig() {
        return $this->projectConfig;
    }

    public static function getInstance(): ServerContext {
        if (!self::$_instance)
            self::$_instance = new self();

        return self::$_instance;
    }
}