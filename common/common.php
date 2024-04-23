<?php
/// This file is usually genereted automatically by our system, do not touch \\\

use Core\Application\ServerContext;
use Core\Facades\App;


$services = require __DIR__ . "/services.php";
$config   = require __DIR__ . "/config.php";

ServerContext::getInstance()
    ->setConfig($config)
    ->useApp(App::newInstance())
    ->registerAll($services)
    ->boot();