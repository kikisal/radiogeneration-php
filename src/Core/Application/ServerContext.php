<?php

namespace Core\Application;
use Core\Bootstrap\Bootable;

class ServerContext extends BasicContext implements Bootable {
    private static $_instance = null;

    protected App $_app;

    public function __construct() {
        
    }

    public function boot(): bool {
        if (!$this->_app)
            return false;

        return $this->_app->boot();
    }

    
    public function getApp() {
        return $this->_app;
    }

    public function useApp($app) {
        $this->_app = $app;
        $this->_app->attach($this);
        return $this;
    }

    public static function getInstance(): ServerContext {
        if (!self::$_instance)
            self::$_instance = new self();

        return self::$_instance;
    }
}