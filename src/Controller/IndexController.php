<?php

namespace Controller {
    use Weeki\Http\Controllers\Controller;
    class IndexController extends Controller {
        public function register() {
            $this->renderer()->attachController($this, "index");
        }

        public function get() {

        }

        public function post() {
        
        }
    }
}