<?php

use Weeki\Http\Router;
use Weeki\Http\Request;
use Weeki\Http\Response;
use Weeki\Http\RequestRenderer;

use Session\SessionMiddleware;

Router::use(
    function (Request $req) {
        RequestRenderer::config()->set("views-path", "@/views/");
        RequestRenderer::config()->set("controllers-path", "@/Controller/");
    }, 
    SessionMiddleware::use()
);

Router::get("/*", function(Request $req, Response $res) {
    return $res->render($req->uri());
});

Router::post("/api/*", function(Request $req, Response $res) {

});