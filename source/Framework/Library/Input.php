<?php namespace Framework\Library;

final class Input{

    private static $instance;

    private function __clone(){}

    private function __construct(){}

    public static function getInstance(){
        if(is_null(self::$instance))
            self::$instance = new Input();

        return self::$instance;
    }

    public function post($key, $xss = false){
        if(!isset($_POST[$key]))
            return false;

        $data = $_POST[$key];

        if($xss)
            return htmlspecialchars($data);

        return $data;
    }

    public function getUserAgent($xss = false){
        $data = $_SERVER['HTTP_USER_AGENT'];
        if($xss)
            return htmlspecialchars($data);

        return $data;
    }
}
