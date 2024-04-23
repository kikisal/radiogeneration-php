<?php

namespace Core\Application;

interface Service {
    public function init();
    public function needsInit(): bool;
    public function getContext(): ServerContext;
    public function setContext(ServerContext $context): Service;
    
}