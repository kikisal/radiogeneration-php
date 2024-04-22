<?php


header('Content-type: application/json');

use Core\Session\UserSession;
use Session\SessionKeys;

$session = UserSession::instance();

$sessionTime = $session->value("session_timestamp");

if(empty($sessionTime))
    $session->store(SessionKeys::SESSION_TIMESTAMP, time());


function exit_json($message, $status) {
    exit (json_encode([
        'status' => $status,
        'message' => $message
    ]));
}