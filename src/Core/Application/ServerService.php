<?php


namespace Core\Application;

use Core\Application\Service;

class ServerService implements Service {

    private $serverContext;

    public function init() {
        throw new \Exception("Method not defined");
    }

    public function needsInit(): bool {
        return false;
    }

    public function getContext(): ServerContext {
        return $this->serverContext;
    }

    public function setContext(ServerContext $context): Service {
        $this->serverContext = $context;
        return $this;
    }

}