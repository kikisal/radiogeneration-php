<?php


namespace Core\Application;

use Core\Application\Service;

class ServerService implements Service {

    protected $serverContext;

    public function getContext(): ServerContext {
        return $this->serverContext;
    }

    public function setContext(ServerContext $context): Service {
        $this->serverContext = $context;
        return $this;
    }

}