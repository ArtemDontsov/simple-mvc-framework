<?php namespace Framework\Library;

final class Session{

    private static $instance;

    private function __clone() { }

    private function __construct(){
        session_start();
    }

    public static function getInstance(){
        if(is_null(self::$instance))
            self::$instance = new Session();

        return self::$instance;
    }

    public function get($key){
        if (isset($_SESSION[$key]))
            return $_SESSION[$key];
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function remove($key){
        unset($_SESSION[$key]);
    }

    public function removeAll(){
        session_destroy();
    }
}
