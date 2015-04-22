<?php namespace Framework;

use Framework\Exception\Route as Exception;
use \ReflectionClass as ReflectionClass;

final class Route {

    private $controller;
    private $action;
    private $params;

    private $controllerPath;

    private function __clone(){}

    function __construct(){
        $this->controllerPath = 'Application\\Controller\\';
    }

    public function run(){
        $uri = $_SERVER['REQUEST_URI'];
        $this->getRoutes($uri);
        $this->route();
    }

    private function route(){
        if(class_exists($this->getController())){
            $class  = new ReflectionClass($this->getController());
            $parent = $class->getParentClass();

            if($parent->getName() == 'Framework\\Controller'){
                if($class->hasMethod($this->getAction())){
                    $controller = $class->newInstance();
                    $method     = $class->getMethod($this->getAction());

                    $method->invoke($controller);

                }else{
                    throw new Exception\MethodNotExistException($this->getController(), $this->getAction());
                }
            }else{
                throw new Exception\BadControllerException($this->getController());
            }
        }else{
            throw new Exception\ControllerNotExistException($this->getController());
        }
    }

    private function getRoutes($uri){
        $routes = explode('/', trim($uri, '/'));

        $this->controller = !empty($routes[0]) ? ucfirst($routes[0]).'Controller' : 'IndexController';
        $this->action     = !empty($routes[1]) ? $routes[1] : 'index';

        //params: key - value
        if(!empty($routes[2])){
            $keys = $values = array();
            for($i = 2, $cnt = count($routes); $i < $cnt; $i++){
                if($i % 2 == 0){
                    $keys[] = $routes[$i];
                } else {
                    $values[] = $routes[$i];
                }
            }
            $this->params = array_combine($keys, $values);
        }
    }

    private function getParams(){
        return $this->params;
    }

    private function getController(){
        return $this->controllerPath.$this->controller;
    }

    private function getAction(){
        return $this->action;
    }
}