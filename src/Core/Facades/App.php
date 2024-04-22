<?php

namespace Core\Facades;

class App {
    public static function newInstance() {
        return new \Core\Application\App();
    }
}