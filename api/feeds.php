<?php
require_once $this->getRootDir() . '/controls/api/feeds-control.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST')
    exit_json("Invalid request", RequestStatus::BAD_REQUEST);


echo json_encode([
    "test" => 2
]);

