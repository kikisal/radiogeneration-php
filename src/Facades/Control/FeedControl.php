<?php

namespace Facades\Control;

use Controller\Feed\FeedControler;

class FeedControl {
    public static function handle($req, $res) {
        $feed = new FeedControler();
        $feed->handle($req, $res);
    }
}