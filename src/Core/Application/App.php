<?php

namespace Core\Application;
use Core\Bootstrap\Bootable;

class App implements ServerApp {

    /**
     * 
     * Server context object
     */
    private ServerContext $serverContext;

    /**
     * 
     * Router Object
     */
    private $router;

    public function attach(ServerContext $context): ServerApp {
        $this->serverContext = $context;
        return $this;
    }

    public function boot(): bool {
        if (!$this->serverContext)
            return false;

        // inject dependencies
        $this->router = $this->serverContext->getService("router");

        
        var_dump($this->router);
        
        return true;
    }
}