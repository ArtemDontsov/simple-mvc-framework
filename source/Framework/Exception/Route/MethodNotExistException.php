<?php namespace Framework\Exception\Route;

use \Exception;

class MethodNotExistException extends Exception {
    public function __construct($controller, $method) {
        parent::__construct("Method $method in controller $controller does not exist");
    }
}