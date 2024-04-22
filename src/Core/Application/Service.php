<?php

namespace Core\Application;

interface Service {
    public function getContext(): ServerContext;
    public function setContext(ServerContext $context): Service;
    
}