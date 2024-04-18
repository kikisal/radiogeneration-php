<?php
require_once $this->getRootDir() . '/controls/api/feeds-control.php';

use Mocky\MockupEngine;


MockupEngine::create();

//if ($_SERVER['REQUEST_METHOD'] != 'POST')
//    exit_json("Invalid request", RequestStatus::BAD_REQUEST);

// echo mockup_data("");
echo json_encode([
    "test" => 2
]);

