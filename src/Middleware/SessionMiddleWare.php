<?php
use Core\Routing\Middleware;
use Core\Session\UserSession;
use Session\SessionKeys;

class SessionMiddleware extends Middleware {
    private $session;

    private $feedsMock;

    public function handle($request, $response) {
        $this->session     = UserSession::instance();
        $this->sessionTime = $this->session->value("session_timestamp");
        
        if(empty($this->sessionTime))
            $this->session->store(SessionKeys::SESSION_TIMESTAMP, time());
    }
}