<?php


namespace Core\Application;
use Core\Bootstrap\Bootable;

interface ServerApp extends Bootable {
    public function attach(ServerContext $context): ServerApp;
}