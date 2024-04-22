<?php

namespace Core\Session {
    class UserSession implements IUserSession {
        private static $_sessionInstance = null;

        private $sessionTable = [];

        public function __construct() {
            $this->initSession();
        }

        public function initSession() {
            session_start();

            $this->sessionTable = $_SESSION;
        }

        public function value(string $key): ?string {
            return array_key_exists($key, $this->sessionTable) ? @$this->sessionTable[$key] : null;
        }

        public function store(string $key, string $value): void {
            $this->sessionTable[$key] = $value;
        }
        public function delete(string $key): bool {
            if (isset($this->sessionTable[$key])) {
                unset($this->sessionTable[$key]);
                return true;
            }

            return false;
        }

        public function has(string $key): bool {
            return isset($this->sessionTable[$key]);
        }

        public static function get(): IUserSession {
            return self::$_sessionInstance ? self::$_sessionInstance : self::$_sessionInstance = new UserSession();
        }
    }
}