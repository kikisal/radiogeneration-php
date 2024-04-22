<?php

namespace Controller\Feed;

use Core\Http\RequestStatus;
use Core\Session\UserSession;
use Core\Utils\Mocky\Mocky;

use Session\SessionKeys;

class FeedControler {
    private $session;

    private $feedsMock;

    public function __construct() {
        $this->session     = UserSession::instance();
        $this->sessionTime = $this->session->value("session_timestamp");
        
        if(empty($this->sessionTime))
            $this->session->store(SessionKeys::SESSION_TIMESTAMP, time());

        $this->feedsMock = Mocky::create(FeedMockup::class);
    }

    public function handle($req, $res) {
        if ($req->method() != 'POST')
            $res->exitJson("Invalid request", RequestStatus::BAD_REQUEST);

        $res->setHeader("Content-type", "application/json");
    }
}
