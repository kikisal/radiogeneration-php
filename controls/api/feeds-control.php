<?php

header('Content-type: application/json');
$this->setHtml(false);

class RequestStatus {
    static const BAD_REQUEST = "bad_request";
};

function exit_json($message, $status) {
    exit (json_encode([
        'status' => $status,
        'message' => $message
    ]));
}