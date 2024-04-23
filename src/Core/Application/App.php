<?php

namespace Core\Application;

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

        $entryPoint   = $this->serverContext->config("entry-point");

        // get user app
        // which will set of its routes
        // after that execute the router

        // start routing (Executes all of the middleware functions)
        // $router->route();
        
        return true;
    }
}