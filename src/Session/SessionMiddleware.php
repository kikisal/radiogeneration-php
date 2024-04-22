<?php

namespace Session {

    use Core\Session\UserSession;
    
    class SessionMiddleware {
        
        public static function use(): callable {
            return function() {
                $session     = UserSession::get();

                $sessionTime = $session->value("session_timestamp");

                if(empty($sessionTime))
                    $session->store(SessionKeys::SESSION_TIMESTAMP, time());

                return true;
            };
        }
    }
}