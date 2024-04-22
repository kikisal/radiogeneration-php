<?php


header('Content-type: application/json');

function exit_json($message, $status) {
    exit (json_encode([
        'status' => $status,
        'message' => $message
    ]));
}