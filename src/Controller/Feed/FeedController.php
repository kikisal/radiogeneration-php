<?php

namespace Controller\Feed;

use Core\Http\RequestStatus;
use Core\Session\UserSession;
use Core\Utils\Mocky\Mocky;

use Session\SessionKeys;

class FeedControler {
    private $session;

    private $feedsMock;


    public function handle($req, $res) {

        
        if ($req->method() != 'POST')
            $res->exitJson("Invalid request", RequestStatus::BAD_REQUEST);

        $this->feedsMock = Mocky::create(FeedMockup::class);

        $res->setHeader("Content-type", "application/json");
    }
}
