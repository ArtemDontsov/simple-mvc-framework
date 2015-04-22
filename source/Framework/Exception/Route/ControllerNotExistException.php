<?php namespace Framework\Exception\Route;

use \Exception;

class ControllerNotExistException extends Exception {
    public function __construct($controller) {
        parent::__construct("Controller $controller does not exist");
    }
}
