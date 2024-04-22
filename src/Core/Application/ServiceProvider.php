<?php

namespace Core\Application;

interface ServiceProvider {
    public function register($name, $class): ServiceProvider;
    public function getService($name): ?Service;

}