<?php namespace Framework;


final class Application{

    protected static $application;
    protected $route;

    private function __construct(){
        $this->initConfigs();

        $this->route = new Route();

    }

    private function __clone() { }

    public static function getInstance(){
        if(!is_object(self::$application))
            self::$application = new Application();

        return self::$application;
    }

    public function run(){
        $this->route->run();
    }

    private function initConfigs(){
        //init autoload
        include_once $this->path = realpath(__DIR__.'/../').'/Application/Config/Autoload.php';
    }

}