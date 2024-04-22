<?php

use Core\Application\ServerContext;
use Core\Facades\App;

$services = require __DIR__ . "/services.php";

ServerContext::getInstance()
    ->useApp(App::newInstance())
    ->registerAll($services)
    ->boot();